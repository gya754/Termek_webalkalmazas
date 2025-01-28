<?php

$config = json_decode(file_get_contents('config.json'), true);
$storageType = $config['storage_type'] ?? '';


$productName = $_GET['name'] ?? null;

if (!$productName) {
    echo "Hiba: Nem található termék név!";
    exit;
}


if ($storageType === 'webstore') {
    $adatok = [
        "Hinta" => ["darabszam"=>"5", "leiras" => "Hinta leírása", "ar" => "200.000 Ft"],
        "Kerti asztal" => ["darabszam"=>"5","leiras" => "Kerti asztal leírása", "ar" => "50.000 Ft"],
        "Kerti garnitúra szett" => ["darabszam"=>"20","leiras" => "Kerti garnitúra szett leírása", "ar" => "255.000 Ft"],
    ];
} elseif ($storageType === 'physical') {
    $adatok = [
        "Fizikai: Hinta" => ["leiras" => "Fizikai Hinta leírása", "ar" => "180.000 Ft"],
        "Fizikai: Kerti asztal" => ["leiras" => "Fizikai Kerti asztal leírása", "ar" => "30.000 Ft"],
        "Fizikai: Kerti garnitúra szett" => ["leiras" => "Fizikai Kerti garnitúra szett leírása", "ar" => "240.000 Ft"],
    ];
} else {
    echo "Hiba!";
    exit;
}


if (isset($adatok[$productName])) {
    $t_adatok = $adatok[$productName];
} else {
    echo "Hiba: A megadott termék nem található!";
    exit;
}
echo "<h1>" . htmlspecialchars($productName) . "</h1>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<thead>
		<tr>
			<th>Termék neve</th>
			<th>Termék darabszáma</th>
			<th>Leírás</th>
			<th>Ár</th>
		</tr>
	  </thead>";
echo "<tbody>";	  
echo "<tr>";

echo "<td>" . htmlspecialchars($productName) . "</td>";
echo "<td>" . htmlspecialchars($t_adatok['darabszam']) . "</td>";
echo "<td>" . htmlspecialchars($t_adatok['leiras']) . "</td>";
echo "<td>" . htmlspecialchars($t_adatok['ar']) . "</td>";


echo "</tbody></table>";
?>