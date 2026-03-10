<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
</head>
<body>
<form method="POST">
<h3>Wpisz godzine: <input type="time" name="godz"><br></h3>
<h3>Wpisz dzień, pn-pt (1-5): <input type="number" name="dzien" min="1" max="5"><br></h3>

<input type="submit" value="SPRAWDZ">
</form>

<?php
if (isset($_POST["godz"]) && isset($_POST["dzien"])){

$dni = [
    1 => "Poniedziałek",
    2 => "Wtorek",
    3 => "Środa",
    4 => "Czwartek",
    5 => "Piątek",
  
];
$godzina = $_POST["godz"];

$dzien = $_POST["dzien"];
$nauczyciele = [
	1 => "Anna Spicha",
	2 => "Adriana Żur",
	3 => "Karolina Kowalcze",
	4 => "Krzysztof Wojdyła",
	5 => "Małgorzata Nawara",
	6 => "Edward Sularz",
	7 => "Sabina Folwarska",
	8 => "Anna Plezia",
	9 => "Mateusz Zajac",
	10 => "Danuta Radoń",
	11 => "Sylwia Jabłońska",
	12 => "Kinga Wicher",
	13 => "Joanna Macioł",
	14 => "Sylwia Mirek",
	15 => "Barbara Luberda",
	16 => "Małgorzata Gargas"
	];

function znajdzNauczyciela($godzina, $dostepniNauczyciele, $nauczyciele)
	{
	$czas = strtotime($godzina);
	foreach ($dostepniNauczyciele as $numerNauczyciela => $przedzial)	
	{
		$start = strtotime($przedzial["start"]);
		$end = strtotime($przedzial["end"]);
		
		if ($czas >= $start && $czas <= $end)
		{
		$lista[] = $nauczyciele[$numerNauczyciela]; 
		
		
		}	
	}
	  if (empty($lista)) {
        return ["Brak nauczyciela"];
    }
	return $lista;
	}

	if ($dzien == 1)
	{
		$dostepniNauczyciele = [
		"2" => [
			"start" => "9:40",
			"end" => "12:30"
			],
		"3" => [
			"start" => "7:45",
			"end" => "11:30"
			],
		"4" => [
			"start" => "7:45",
			"end" => "9:40"
			],
		"6" => [
			"start" => "9:40",
			"end" => "12:30"
			],
		"7" => [
			"start" => "7:45",
			"end" => "13:25"
			],
		"8" => [
			"start" => "7:45",
			"end" => "14:15"
			],
		"9" => [
			"start" => "8:00",
			"end" => "14:15"
			],
		"13" => [
			"start" => "10:35",
			"end" => "12:30"
			],
		"14" => [
			"start" => "7:00",
			"end" => "12:30"
			],
		"15" => [
			"start" => "8:45",
			"end" => "12:30"
			],
		"16" => [
			"start" => "7:45",
			"end" => "11:30"
			]
		
		];
		
	}	
	
	if ($dzien == 2)
	{
		$dostepniNauczyciele = [
		"2" => [
			"start" => "7:45",
			"end" => "14:45"
			],
		"3" => [
			"start" => "7:45",
			"end" => "11:45"
			],
		"4" => [
			"start" => "9:40",
			"end" => "14:20"
			],
		"5" => [
			"start" => "7:45",
			"end" => "15:05"
			],
			
		"7" => [
			"start" => "10:35",
			"end" => "13:30"
			],
		"8" => [
			"start" => "7:45",
			"end" => "12:40"
			],
		"9" => [
			"start" => "8:00",
			"end" => "13:30"
			],
		"11" => [
			"start" => "12:30",
			"end" => "15:05"
			],
		"14" => [
			"start" => "7:00",
			"end" => "12:30"
			],
		"15" => [
			"start" => "08:45",
			"end" => "12:40"
			],
		"16" => [
			"start" => "7:45",
			"end" => "13:25"
			]
		
		];
		
	}	
	$wynik = znajdzNauczyciela($godzina, $dostepniNauczyciele, $nauczyciele);
		echo "<h2><span style='color:orange;'>$dni[$dzien] o godzinie: <u>$godzina </u></span></h2>";
		echo "<h4><u><span style='color:red;'>Dostępni nauczyciel:</span></u></h4> <b>" . implode(" <br><br> " , $wynik)."</b>";
}	
?>
</body>
</html>
