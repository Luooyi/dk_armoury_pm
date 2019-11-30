<?php
    function OpenCon()
     {
     $dbhost = "db4free.net:3306";
     $dbuser = "gearfried12";
     $dbpass = "popo12345678";
     $db = "dk_armoury_pm";
     $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

     return $conn;
     }

    function CloseCon($conn)
     {
     $conn -> close();
     }

    ?>
