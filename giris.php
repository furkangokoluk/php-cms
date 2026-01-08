<?php 
    include("includes/connection.php");
    include("includes/function.php");
    include("includes/header.php");
    bul();

    if (isset($_POST["submit"]))
    {
        $kullanici_ad = trim($_POST["kullanici_ad"]);
        $sifre = trim($_POST["sifre"]);
        $sorgu = "SELECT * FROM kullanici WHERE kullanici_ad = '$kullanici_ad' AND sifre = 'sifre'";
        $result = mysqli_query($connection, $sorgu);
        if (mysqli_num_rows($result) == 1)
        {
            header("Location:yonetim.php");
        }
        else
        {
            echo "Başarısız Giriş Tekrar Deneyiniz!..";
        }
    }
?>
<div id="main">
    <table id="structure">
        <tr>
            <td id="navigation">
                <br>
                <a href="konu_ekle.php"> + Yeni Konu Ekle </a><br><br>
                <a href="sayfa_ekle.php"> + Yeni Sayfa Ekle </a>
            </td>
            <td id="page">
                <form action="login.php" id="form1" name="form1" method="post"><br>
                    <table width="284">
                        <tr>
                            <td width="124">Kullanıdı Adı</td>
                            <td width="144">
                                <input type="text" name="kullanici_ad" id="kullanici_adi">
                            </td>
                        </tr>
                        <tr>
                            <td>Kullanıcı Şifresi</td>
                            <td>
                                <input type="password" name="sifre" id="sifre">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" id="submit" value="Kaydet">
                            </td>
                        </tr>
                        
                    </table>
                </form>
            </td>
        </tr>