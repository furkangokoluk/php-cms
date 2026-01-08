<?php 
    include("includes/connection.php");
    include("includes/function.php");
    include("includes/header.php");
    bul();
?>
<div id="main">
    <table id="structure">
        <tr>
            <td id="navigation">
                <?php echo navigation($gelen_konu, $gelen_sayfa); ?>
            </td>
            <td id="page">
                <h2>Konu Ekle</h2>
                <form action="konu_kaydet.php" method="post">
                    <p>
                        Konu Adı:
                        <input type="text" name="menu_ad" value="" id="menu_ad">
                    </p>
                    <p>
                        Pozisyon:
                        <select name="pozisyon">
                            <?php
                                $k = konulariGetir();
                                $konu_say = mysqli_num_rows($k);
                                for ($i=1; $i <= $konu_say+1; $i++)
                                {
                                    echo "<option value=\"".$i."\">".$i."</option>";
                                }
                            ?>
                        </select>
                    </p>
                    <p>
                        Görünürlük:
                        <input type="radio" name="goster" value="0"> Hayır
                        <input type="radio" name="goster" value="1"> Evet
                    </p>
                    <input type="submit" value="Konu Ekle">
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
