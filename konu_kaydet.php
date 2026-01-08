<?php
    include("includes/connection.php");
    include("includes/function.php");

    $error = array();

    if (!isset($_POST["menu_ad"]) || empty($_POST["pozisyon"]))
    {
        $error[]= 'menu_ad';
    } 

    if (empty($error))
    {
        header("Location:konu_ekle.php");
        exit;
    }

    $menu_ad = $_POST["menu_ad"];
    $pozisyon = $_POST["pozisyon"];
    $goster = $_POST["goster"];

    $sorgu = "INSERT INTO konular (menu_ad, pozisyon, goster) VALUES ('$menu_ad','$pozisyon','$goster')";
    $result = mysqli_query($connection, $sorgu);
    
    if ($result)
    {
        header("Location: icerik.php");
    }
    else
    {
        echo "Bir hata oluştu : " . mysqli_connect_error();
    }
    include("includes/close_connection.php");
?>