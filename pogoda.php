<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Prognoza pogody Wrocław</title>
		<link rel="stylesheet" href="styl2.css">
	</head>
	<body>
		<div class="lewybaner">
			<img src="logo.png" alt="meteo">
		</div>
		<div class="srodekbaner">
			<h1>Prognoza dla Wrocławia</h1>
		</div>
		<div class="prawybaner">
			<p>maj,2019</p>
		</div>
		<div class="glowny">
			<table>
				<tr>
					<th>DATA</th>
					<th>TEMPERATURA W NOCY</th>
					<th>TEMPERATURA W DZIEŃ</th>
					<th>OPADY[mm/h]</th>
					<th>CIŚNIENIE[hPa]</th>
				</tr>
				<?php
					
					$db = mysqli_connect('localhost','root','','prognoza');
					$zapytanie = ('SELECT * FROM pogoda WHERE miasta_id = 1 ORDER BY data_prognozy ASC;');
					$wynik=mysqli_query($db,$zapytanie);
					
					while($rekord = mysqli_fetch_array ($wynik))
					{
						$id = $rekord[0];
						$miasta_id = $rekord[1];
						$data_prognozy = $rekord[2];
						$temperatura_noc = $rekord[3];
						$temperatura_dzien = $rekord[4];
						$opady = $rekord[5];
						$cisnienie = $rekord[6];
						
						echo "<tr><td>$data_prognozy</td><td>$temperatura_noc</td><td>$temperatura_dzien</td><td>$opady</td><td>$cisnienie</td></tr>";
						
					}
					echo "</table>"
					
					mysqli_close($db);
				?>
		</div>
		<div class="lewy">
			<img src="obraz.jpg" alt="Polska, Wrocław">
		</div>
		<div class="prawy">
			<a href="kwerendy.txt">Pobierz kwerendy</a>
		</div>
		<footer>
			<p>Stronę wykonał: Bohdan Kuzyan</p>
		</footer>
	</body>
</html>