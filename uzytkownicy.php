<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Portal społecznościowy</title>
		<link rel="stylesheet" href="styl5.css">
	</head>
	<body>
		<div class="baner1">
			<h2>Nasze osiedle</h2>
		</div>
		<div class="baner2">
			<?php
				$db=mysqli_connect('localhost','root','','portal');
				$zapytanie=('SELECT COUNT(id) FROM dane;');
				$wynik=mysqli_query($db,$zapytanie);
				
				while($rekord=mysqli_fetch_array($wynik))
				{
					$id = $rekord[0];
					echo "<h5>Liczba użytkowników portalu: $id</h5>";
				}
				
				mysqli_close($db);
			?>
		</div>
		<div class="lewy">
			<h3>Logowanie</h3>
			<form action="uzytkownicy.php" method="POST">
				<p>Login:</p><input type="text" name="login">
				<p>Hasło:</p><input type="password" name="haslo"><br>
				<input type="submit" value="Zaloguj">
			</form>
		</div>
		<div class="prawy">
		<h3>Wizytówka</h3>
			<div class="wizytowka">
			<?php
				if(isset($_POST['login']) && isset($_POST['haslo']))
				{
					$login = $_POST['login'];
					$db=mysqli_connect('localhost','root','','portal');
					$zapytanie=("SELECT haslo FROM uzytkownicy WHERE login='$login';");
					$wynik=mysqli_query($db,$zapytanie);
					if(mysqli_num_rows($wynik)==0)
					{
						echo "Login nie istnieje";
					}
					else
					{
						$haslo = $_POST['haslo'];
						$haslo = sha1($haslo);
						$login = $_POST['login'];
						if(mysqli_num_rows($wynik)==1)
						{
							while($rekord = mysqli_fetch_array($wynik))
							{
								if($haslo==$rekord['haslo'])
								{
									echo "hasło nieprawidłowe";
								}
								else
								{
									$zapytanie2=("SELECT uzytkownicy.login,dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy INNER JOIN dane ON dane.id = uzytkownicy.id WHERE uzytkownicy.login = '$login';");
									$wynik2=mysqli_query($db,$zapytanie2);
									
									while($rekord2=mysqli_fetch_array($wynik2))
									{
										$login = $rekord2[0];
										$rok_urodz = $rekord2[1];
										$przyjaciol = $rekord2[2];
										$hobby = $rekord2[3];
										$zdjecie = $rekord2[4];
										
										$roki = 2022-$rok_urodz;
										
										echo "<img src='$zdjecie' alt='osoba'>";
										echo "<h4>$login ($roki)</h4>";
										echo "<p>hobby: $hobby</p>";
										echo "<h1><img src='icon-on.png'>$przyjaciol</h1>";
										echo "<button><a href='dane.html'>Wiecej informacji</a></button>";
									}
								}
							}
					}
				}
				}
				mysqli_close($db);
			?>
			</div>
		</div>
		<footer>
			Stronę wykonał: Bohdan Kuzyan
		</footer>
	</body>
</html>