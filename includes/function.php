<?php
    function sorguDoğrula($sonuc)
    {
        if(!$sonuc)
        {
            die("Veritabanı Sorgu Hatası: ".mysqli_connect_error());
        }
    }

    function konulariGetir()
    {
        global $connection;
        $sorgu = "SELECT * FROM konular";
        $result = mysqli_query($connection, $sorgu);
        sorguDoğrula($result);
        return $result;
    }

    function public_konulariGetir()
    {
        global $connection;
        $sorgu = "SELECT * FROM konular WHERE goster = 1";
        $result = mysqli_query($connection, $sorgu);
        sorguDoğrula($result);
        return $result;
    }

    function sayfalariGetir($konu_id)
    {
        global $connection;
        $sorgu = "SELECT * FROM sayfalar WHERE konu_id=".$konu_id;
        $result = mysqli_query($connection, $sorgu);
        sorguDoğrula($result);
        return $result;
    }

    function konuGetir($konu_id)
    {
        global $connection;
        $sorgu = "SELECT * FROM konular WHERE konu_id =".$konu_id;
        $result = mysqli_query($connection, $sorgu);
        sorguDoğrula($result);
        if ($konu=mysqli_fetch_array($result))
            return $konu;
        else
            return NULL;
    }
    

    function sayfaGetir($sayfa_id)
    {
        global $connection;
        $sorgu = "SELECT * FROM sayfalar WHERE sayfa_id =".$sayfa_id;
        $result = mysqli_query($connection, $sorgu);
        sorguDoğrula($result);
        if ($sayfa=mysqli_fetch_array($result))
            return $sayfa;
        else
            return NULL;
    }

    function bul()
    {
        global $konu, $sayfa, $gelen_konu, $gelen_sayfa;
        
        if (isset($_GET["konu"]))
        {
            $gelen_konu = $_GET["konu"];
            $konu = konuGetir($gelen_konu);
            $gelen_sayfa = 0;
            $sayfa = NULL;
        }
        elseif (isset($_GET["sayfa"]))
        {
            $gelen_konu = 0;
            $konu = NULL;
            $gelen_sayfa = $_GET["sayfa"];
            $sayfa = sayfaGetir($gelen_sayfa);
        }
        else
        {
            $gelen_konu = 0;
            $gelen_sayfa = 0;
            $konu = NULL;
            $sayfa = NULL;
        }
    }

    function navigation($gelen_konu, $gelen_sayfa)
    {
        $output = "<ul class=\"subject\">";
        $result = konulariGetir();
        while($row = mysqli_fetch_array($result))
        {
            $output .= "<li";
            if ($gelen_konu == $row["konu_id"])
                $output .= " class=\"selected\" ";
            $output .= "><a href=\"konu_duzenle.php?konu=".$row["konu_id"]."\">".$row["menu_ad"]."</a></li>";

            $result1 = sayfalariGetir($row["konu_id"]);
            $output.= "<ul class =\"pages\">";
            while($row1 = mysqli_fetch_array($result1))
            {
                $output.= "<li";
                if ($gelen_sayfa == $row1["sayfa_id"])
                    $output.= " class=\"selected\" ";
                $output.= "><a href=\"icerik.php?sayfa=".$row1["sayfa_id"]."\">".$row1["menu_ad"]."</a></li>";
            }
            $output.= "</ul>"; 
        }
        $output.= "</ul>";
        return $output;
    }

    function public_navigation($gelen_konu, $gelen_sayfa)
    {
        $output = "<ul class=\"subject\">";
        $result = public_konulariGetir();
        while($row = mysqli_fetch_array($result))
        {
            $output .= "<li";
            if ($gelen_konu == $row["konu_id"])
                $output .= " class=\"selected\" ";
            $output .= "><a href=\"index.php?konu=".$row["konu_id"]."\">".$row["menu_ad"]."</a></li>";

            $result1 = sayfalariGetir($row["konu_id"]);
            $output.= "<ul class =\"pages\">";
            while($row1 = mysqli_fetch_array($result1))
            {
                $output.= "<li";
                if ($gelen_sayfa == $row1["sayfa_id"])
                    $output.= " class=\"selected\" ";
                $output.= "><a href=\"index.php?sayfa=".$row1["sayfa_id"]."\">".$row1["menu_ad"]."</a></li>";
            }
            $output.= "</ul>"; 
        }
        $output.= "</ul>";
        return $output;
    }
?>