<?php

session_start();

$pdo = new PDO("mysql:host=localhost;dbname=ecom", "root", "rootroot");
$sql = "SELECT * FROM produit WHERE Reference = :ref";
$stm = $pdo->prepare($sql);


$paniers = [];
$total = 0;

if(isset($_GET['logout']))
{
 unset($_SESSION['user']);
 unset($_SESSION['panier']);
}

if (isset($_POST['nm']) && isset($_POST['pw'])) {
    if (empty($_POST['nm']) || empty($_POST['pw'])) {
        header("Location: index.php?message=your password or user not valide");
    }

    $user = $_POST['nm'];
    $pass =$_POST['pw'];
    $sqllogin = "SELECT * FROM users WHERE Email = :user AND password = :pass";
    $stmlogin = $pdo->prepare($sqllogin);
    $stmlogin->execute(array(":user" => $user, ":pass" => $pass));
    $data = $stmlogin->fetch(PDO::FETCH_ASSOC);
    if ($data == false) {
        header("Location:index.php?message=your password or user not valide");
    } else {
        $_SESSION['user'] = 1;
       
        header("Location:Admin.php");
    }
}

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
} else {
    if ($_SESSION['user'] == 1)
        $isAdmin = true;
}

if (!isset($_SESSION['panier']) && $_SESSION['user'] == 0) {
    $_SESSION['panier'] = [];
}

if (isset($_GET['ref'])) {
    $ref = $_GET['ref'];
    $isNotFound = true;
    foreach ($_SESSION['panier'] as $k => $p) {
        if ($p["reference"] == $ref) {
            $_SESSION['panier'][$k]["quantite"] = $p["quantite"] + 1;
            $isNotFound = false;
            break;
        }
    }
    if ($isNotFound)
        $_SESSION['panier'][] = ["reference" => $ref, "quantite" => 1];
    header("Location: index.php#panier");
}

foreach ($_SESSION['panier'] as $k => $p) {
    $stm->execute(array(":ref" => $p["reference"]));
    $panier = $stm->fetch(PDO::FETCH_ASSOC);
    $panier['quantite'] = $p["quantite"];
    $paniers[] = $panier;
    $total +=  $panier['prixNormal'] * $p["quantite"];
}
