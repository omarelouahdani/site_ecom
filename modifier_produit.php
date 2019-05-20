<?php

	$bdd = mysql_connect("localhost","root","rootroot") or die (mysql_error());
	mysql_select_db("ecom",$bdd) or die (mysql_error());
	$type=$_POST['type'];
	$ref=$_POST['ref'];
	$Desgn=$_POST['Desgn'];
	$prx_N=$_POST['prx_N'];
	$prx_P=$_POST['prx_P'];
	$photo=$_POST['photo'];
	echo $photo;
	
    $req="UPDATE  produit set type='$type',Designation='$Desgn',prixNormal='$prx_N',prixPromo='$prx_P',photo='$photo'  where Reference='$ref' ";
mysql_query($req) or die(mysql_error());
header("location:Admin.php");
?>
