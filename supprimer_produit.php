<?php

	$bdd = mysql_connect("localhost","root","rootroot") or die (mysql_error());
	mysql_select_db("ecom",$bdd) or die (mysql_error());
    $ref=$_GET['ref'];
    echo $ref;
	
    $req= "DELETE from produit where Reference = '$ref' ";
mysql_query($req) or die(mysql_error());
header("location:Admin.php");
require_once("Admin.php");
?>