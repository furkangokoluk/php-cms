<?php
    include("includes/connection.php");
    include("includes/function.php");

    $id = $_GET["k"];
    $sorgu = "DELETE FROM konular WHERE konu_id=".$id;
    $result = mysqli_query($connection, $sorgu);
    if (mysqli_affected_rows($connection)==1)
    {
        header("Location:icerik.php");
    }
    else
    {
        echo "Silme işleminde hata oluştu!.." . mysqli_connect_error();
    }

    include("includes/close_connection.php");
?>