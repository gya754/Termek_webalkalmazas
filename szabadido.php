<?php

$config = json_decode(file_get_contents('config.json'), true);
$storageType = $config['storage_type'] ?? '';


if ($storageType === 'webstore') {
    $products = ["Bicikli", "Horgászbot", "Roller"];
    $darabszam = ["4", "3", "10"];
    $utolso_modositas = ["2024.12.04.", "2024.11.30.", "2025.01.08."];
} elseif ($storageType === 'physical') {
    $products = ["Fizikai: Bicikli", "Fizikai: Horgászbot", "Fizikai: Roller"];
    $darabszam = ["20", "6", "14"];
    $utolso_modositas = ["2024.12.04.", "2024.11.30.", "2025.01.08."];
} else {
    echo "Érvénytelen storage_type érték!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Termékek webalkalmazás</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1 class="title">Szabadidő listája </h1>
<table border='1' cellpadding='5' cellspacing='0'>
    <thead>
        <tr>
            <th>Termék neve</th>
            <th>Termék darabszáma</th>
            <th>Utolsó módosítás dátuma</th>
            <th>Részletek</th>
        </tr>
    </thead>
    <tbody>
        <?php
      
        for ($i = 0; $i < max(count($products), count($darabszam), count($utolso_modositas)); $i++) {
            echo "<tr>";
            echo "<td>" . ($products[$i] ?? '-') . "</td>";
            echo "<td>" . ($darabszam[$i] ?? '-') . "</td>";
            echo "<td>" . ($utolso_modositas[$i] ?? '-') . "</td>";

            
            if (!empty($products[$i])) {
                $productName = urlencode($products[$i]);
                echo "<td><a href='szabadido_reszlet.php?name={$productName}'>Részletek</a></td>";
            } else {
                echo "<td>-</td>";
            }

            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
