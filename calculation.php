<?php
    $total_price = 0;
    if( isset($_POST["soup"])) $total_price = $total_price + 80;
    if( isset($_POST["onthon"])) $total_price = $total_price + 10;
    if( isset($_POST["pakura"])) $total_price = $total_price + 10;
    if( isset($_POST["rice"])) $total_price = $total_price + 20;
    if( isset($_POST["nan"])) $total_price = $total_price + 20;
    if( isset($_POST["nodols"])) $total_price = $total_price + 60;
    if( isset($_POST["beef"])) $total_price = $total_price + 150;
    if( isset($_POST["chicken"])) $total_price = $total_price + 100;
    if( isset($_POST["mutton"])) $total_price = $total_price + 120;
    if( isset($_POST["yogart"])) $total_price = $total_price + 20;
    if( isset($_POST["sweet"])) $total_price = $total_price + 20;
    if( isset($_POST["drinks"])) $total_price = $total_price + 20;
    
    echo "Your total price is ".$total_price."<br>";
     
?>