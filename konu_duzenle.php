<?php 
    include("includes/connection.php");
    include("includes/function.php");
    include("includes/header.php");

    if (isset($_POST["submit"]))
    {
        $konu_id = $_GET["k"];
        $menu_ad = $_POST["menu_ad"];
        $pozisyon = $_POST["pozisyon"];
        $goster = $_POST["goster"];

        $sorgu = "UPDATE konular SET
        menu_ad = '$menu_ad',
        pozisyon = '$pozisyon',
        goster = '$goster'
        WHERE konu_id = '$konu_id'";

        $result = mysqli_query($connection, $sorgu);
        if (mysqli_affected_rows($connection)==1)
            $mesaj = "Konu başarılı bir şekilde değiştirilmiştir.";
        else
            $mesaj = "Güncelleştirme işlemi başarısız oldu!!";
    }
    bul();
?>
<div id="main">
    <table id="structure">
        <tr>
            <td id="navigation">
                <?php echo navigation($gelen_konu, $gelen_sayfa); ?>
                <br>
            </td>
            <td id="page">
                <h2>Konu Düzenle : <?php echo $konu["menu_ad"];?></h2>
                <a href="konu_sil.php?k=<?php echo $konu["konu_id"]; ?>" onclick="return confirm('Emin misin?')"> Konuyu Sil </a>
                <?php 
                    if (!empty($mesaj))
                    {
                        echo "<p class =\"message\">";
                        echo $mesaj."</p>";
                    }
                ?>
                <form action="konu_duzenle.php?k=<?php echo $konu["konu_id"]; ?>" method="post">
                    <p>
                        Konu Adı:
                        <input type="text" name="menu_ad" value="<?php echo $konu["menu_ad"]; ?>" id="menu_ad">
                    </p>
                    <p>
                        Pozisyon:
                        <select name="pozisyon">
                            <?php
                                $k = konulariGetir();
                                $konu_say = mysqli_num_rows($k);
                                for ($i=1; $i <= $konu_say+1; $i++)
                                {
                                    if ($i==$konu["pozisyon"])
                                        echo "<option selected value=\"".$i."\">".$i."</option>";
                                    else
                                        echo "<option value=\"".$i."\">".$i."</option>";
                                }
                            ?>
                        </select>
                    </p>
                    <p>
                        Görünürlük:
                        <input type="radio" name="goster" value="0" <?php if ($konu["goster"] == 0) echo "checked"; ?> > Hayır
                        <input type="radio" name="goster" value="1" <?php if ($konu["goster"] == 1) echo "checked"; ?> > Evet
                    </p>
                    <input type="submit" name ="submit" value="Değiştir">
                </form>
                <br>
                <a href="icerik.php"> Vazgeç </a>
            </td>
        </tr>
    </table>
</div>
<?php 
    include("includes/footer.php");
    include("includes/close_connection.php");
?>
