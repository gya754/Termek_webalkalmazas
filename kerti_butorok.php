<?php

$config = json_decode(file_get_contents('config.json'), true);
$storageType = $config['storage_type'] ?? '';


if ($storageType === 'webstore') {
    $termeknev = ["Hinta", "Kerti asztal", "Kerti garnitúra szett"];
    $darabszam = ["4", "3", "10"];
    $utolso_modositas = ["2024.12.04.", "2024.11.30.", "2025.01.08."];
} elseif ($storageType === 'physical') {
    $termeknev = ["Fizikai: Hinta", "Fizikai: Kerti asztal", "Fizikai: Kerti garnitúra szett"];
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
<h1 class="title">Kerti bútorok listája </h1>
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
       
        for ($i = 0; $i < max(count($termeknev), count($darabszam), count($utolso_modositas)); $i++) {
            echo "<tr>";
            echo "<td>" . ($termeknev[$i] ?? '-') . "</td>";
            echo "<td>" . ($darabszam[$i] ?? '-') . "</td>";
            echo "<td>" . ($utolso_modositas[$i] ?? '-') . "</td>";

            
            if (!empty($termeknev[$i])) {
                
                $productName = urlencode($termeknev[$i]); 
                echo "<td><a href='kerti_butorok_reszlet.php?name={$productName}'>Részletek</a></td>";
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
