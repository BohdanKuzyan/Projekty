<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Wycieczki i urlopy</title>
		<link rel="stylesheet" href="styl3.css">
	</head>
	<body>
		<div class="baner">
			<h1>BIURO PODRÓŻY</h1>
		</div>
		<div class="lewy">
			<h2>KONTAKT</h2>
			<a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
			<p>telefon 555666777</p>
		</div>
		<div class="srodek">
			<h2>GALERIA</h2>
			<?php
				$db=mysqli_connect('localhost','root','','egzamin3');
				$zapytanie2=("SELECT nazwaPliku,podpis FROM zdjecia ORDER BY podpis ASC;");
				$wynik=mysqli_query($db,$zapytanie2);
				
				while($rekord=mysqli_fetch_array($wynik))
				{
					$nazwaPliku = $rekord[0];
					$podpis = $rekord[1];
					
					echo "<img src='$nazwaPliku' alt='$podpis'>";
				}
				
			mysqli_close($db);
			?>
		</div>
		<div class="prawy">
			<h2>PROMOCJE</h2>
			<table>
				<tr>
					<td>Jesień</td>
					<td>Grupa 4+</td>
					<td>Grupa 10+</td>
				</tr>
				<tr>
					<td>5%</td>
					<td>10%</td>
					<td>15%</td>
				</tr>
			</table>
		</div>
		<div class="dane">
			<h2>LISTA WYCIECZEK</h2>
			<?php
				$db=mysqli_connect('localhost','root','','egzamin3');
				$zapytanie = ("SELECT id,dataWyjazdu,cel,cena FROM wycieczki WHERE dostepna = 1;");
				$wynik = mysqli_query($db,$zapytanie);
				
				while($rekord = mysqli_fetch_array($wynik))
				{
					$id = $rekord[0];
					$dataWyjazdu = $rekord[1];
					$cel = $rekord[2];
					$cena = $rekord[3];
					
					echo "<p>$id.$dataWyjazdu,$cel,cena: $cena</p>";
				}
				
				mysqli_close($db);
			?>
		</div>
		<footer>
			<p>Stronę wykonał: Bohdan Kuzyan</p>
		</footer>
	</body>
</html>