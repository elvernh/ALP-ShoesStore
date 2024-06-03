<?php
function bukaKoneksiDB(){
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "Library2";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("Error connection DB");
    return $conn;
}
function tutupKoneksiDB($conn){
    mysqli_close($conn);
}

function loginRegister(){
    $conn = bukaKoneksiDB();

    tutupKoneksiDB($conn);
    // $username = $_POST["username"];
}
?>