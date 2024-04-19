<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kroegen uit Plaats</title>
</head>

<body>

    <form action="#" method="post">
        <label for="placeName">Leverancier naam:</label>
        <input type="text" name="placeName">
        <input type="submit" value="Selecteren" name="selectCityName">
    </form>

    <?php
        require_once("dbConnect.php");
        // Neem selectiecriterim over uit het formulier
        if (isset($_POST["selectCityName"]))
        {

            $selector = "%" . $_POST["placeName"] . "%";
        }
        else

        { //Of vul het selectiecriterium met wildcards
            $selector = "%%";
        };

        // Met selector de gegevens in de tabel kroeg selecteren 
        $qrySelectBars = $dbconn->prepare("SELECT products.productId, products.categoryId, products.productName, products.weightKg, products.priceEuro, products.gender, suppliers.company 
        FROM products 
        INNER JOIN suppliers 
        ON products.supplierId = suppliers.supplierId 
        WHERE suppliers.company 
        LIKE :selector");
        $qrySelectBars->bindValue("selector", $selector);
        $qrySelectBars->execute();
        $selectedBars = $qrySelectBars->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table>
            <thead>
                <th>productId</th>
                <th>categoryId</th>
                <th>productName</th>
                <th>weightKg</th>
                <th>priceEuro</th>
                <th>gender</th>
                <th>company</th>

            </thead>
            <tbody>
        <?php
        foreach ($selectedBars as $barData)
        {
            echo "<tr>";
            echo "<td>". $barData["productId"] ."</td>";
            echo "<td>". $barData["categoryId"] ."</td>";
            echo "<td>". $barData["productName"] ."</td>";
            echo "<td>". $barData["weightKg"] ."</td>";
            echo "<td>". $barData["priceEuro"] ."</td>";
            echo "<td>". $barData["gender"] ."</td>";
            echo "<td>". $barData["company"] ."</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
    </table>

</body>
</html>