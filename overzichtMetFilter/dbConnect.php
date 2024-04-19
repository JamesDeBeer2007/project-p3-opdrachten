<?php
    try {
        $dbconn = new PDO("mysql:host=localhost; dbname=projectp3jmek",  // sql:host=localhost;  dbname= naam van database
        "root", ""); // maakt leege gebruiker aan van je database
    }
    catch(PDOException $error) {
        die("womp womp idiot: ". $error->getMessage()); // text: error message
    }
?>
