<?php
	if(isset($_POST['imie']) and isset($_POST['nazwisko']))
	{
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$adres = $_POST['adres'];
		
		$db = mysqli_connect("localhost","root","","wedkowanie");
		$zapytanie = ("INSERT INTO karty_wedkarskie (imie,nazwisko,adres) VALUES ('$imie','$nazwisko','$adres');");
		$wynik = mysqli_query($db,$zapytanie);
		
		mysqli_close($db);
	}
?>