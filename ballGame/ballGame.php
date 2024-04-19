<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ballenspel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $numberOfBalls = random_int(1, 10); 
        $sizeHole = random_int(20, 40);  
        $maxSizeBalls = random_int(1, 2*$sizeHole); 
        $arrayBalls = array(); 
        $numberFittingBalls = 0; 
        $maxNumberOfGuesses = 3; 

        for($i = 1; $i <= $numberOfBalls; $i++) {
            $arrayBalls[$i] = random_int(1, $maxSizeBalls);
        }
        $arrayBalls[0] = $sizeHole + 10; 

        foreach ($arrayBalls as $sizeOfBall) {
            if ($sizeOfBall < $sizeHole) {
                $numberFittingBalls ++;  
            }
        }

        echo "<p>Welkom bij ons spelletje</p>";
        echo "<p>In het spel zijn $numberOfBalls ballen aanwezig.<br>";
        echo "Het gat is $sizeHole groot.<br>";
        echo "Hoeveel ballen passen er doorheen?</p>";

        for ($i = 1; $i <= $maxNumberOfGuesses; $i++) {
            $userAnswer = random_int(0, $numberOfBalls);
            if ($userAnswer !== $numberFittingBalls) {
                if ($i === $maxNumberOfGuesses) {
                    echo "<p id=fout>Helaas, dit was je laatste poging.<br>";
                    echo "Het waren $numberFittingBalls passende ballen.</p>";
                } else {
                    echo "<p id=fout>Jouw antwoord was $userAnswer.<br>";
                    echo "Helaas, je hebt fout geraden!!</p>";
                }
            } else {
                echo "<p id=goed>Jouw antwoord was $userAnswer.<br>";
                echo "Gefeliciteerd, je hebt goed geraden!!</p>";
                break; 
            }
        }
    ?>
</body>
</html>