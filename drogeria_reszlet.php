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
        "Tisztítószer" => ["darabszam"=>"5", "leiras" => "Tisztítószer leírása", "ar" => "1.000 Ft"],
        "Kozmetikum" => ["darabszam"=>"5","leiras" => "Kozmetikum leírása", "ar" => "5.000 Ft"],
        "Öblítő" => ["darabszam"=>"20","leiras" => "Öblítő leírása", "ar" => "1.500 Ft"],
    ];
} elseif ($storageType === 'physical') {
    $adatok = [
        "Fizikai: Tisztítószer" => ["leiras" => "Fizikai Tisztítószer leírása", "ar" => "1.100 Ft"],
        "Fizikai: Kozmetikum" => ["leiras" => "Fizikai Kozmetikum leírása", "ar" => "4.900 Ft"],
        "Fizikai: Öblítő" => ["leiras" => "Fizikai Öblítő leírása", "ar" => "1.600 Ft"],
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