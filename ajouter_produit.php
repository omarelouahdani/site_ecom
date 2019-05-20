<?php

	$bdd = mysql_connect("localhost","root","rootroot") or die (mysql_error());
	mysql_select_db("ecom",$bdd) or die (mysql_error());
	$type=$_POST['type'];
	$ref=$_POST['ref'];
    $desgn=$_POST['desgn'];
    $prx_N=$_POST['prx_N'];
    
	$prix_P=$_POST['prix_P'];
    $photo=$_POST['photo'];
    
	
    $req=" INSERT into produit (type, Reference ,Designation,prixNormal,prixPromo,photo) values ('$type','$ref','$desgn','$prx_N','$prix_P' ,'$photo')";
mysql_query($req) or die(mysql_error());
header("location:Admin.php");
?>
