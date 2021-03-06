<?php
session_start();
require_once("../php/function.php");
require_once("../php/classBase.php");
require_once("../php/classLog.php");
$db=new Baza();
$db->connect();
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="jscript/jquery-3.5.0.js"></script>
    <script src="jscript/jscriptFunctions.js"></script>
    <link href="css/icons/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Logovi | BakariTech</title>
</head>
<body>

    <!-- header where is logo, search, viber, whatsup-->
        <?php
            include("_header.php");
        ?>
    <!-- end of header where is logo, search, viber, whatsup-->

    <!-- navigation of categories and navigation for login-->
        <?php
            include("_navigation.php");
        ?>
          
    <!-- end of navigation of categories-->

<div class="container" id="logs">
    <div class="col-md-6" style="padding-top: 80px;">
    <form action="?logovi" method="post" >
        <select class="custom-select" name="logovi" id="logovi">
            <option value="0">--Izaberite log fajl--</option>
            <option value="korisnici.txt">Korisnici</option>
            <option value="kupovine.txt">Kupovine</option>
            <option value="logovanja.txt">Logovanja</option>
            <option value="proizvodi.txt">Proizvodi</option>
            <option value="komentari.txt">Komentari</option>
            <option value="korpa.txt">Korpa</option>
            <option value="odobravanja.txt">Odobravanja</option>
        </select><br><br>
        <button class="btn btn-dark">Prika??i</button>
    </form>
        <br><br>
    </div>
    <?php
    if(isset($_POST['logovi']) and $_POST['logovi']!="")
    {
        $imeFajla="../logs/".$_POST['logovi'];
        if(file_exists($imeFajla))
        {
            $prikaz=file_get_contents($imeFajla);
            $prikaz=str_replace("\r\n", "<br>", $prikaz);
    ?>
            <div class="container">
                <p><?= $prikaz ?></p>
            </div> 
    <?php
    }
        else echo "Ne postoji datoteka koju ste izabrali";
    }
    ?>
</div>



    <!--footer-->
        <?php
            include("_footer.php");
        ?>
	<!--end footer-->


          
</body>
</html>