<?php

	try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=ecom;charset=utf8', 'root', 'rootroot');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
	$ref=$_GET['ref'];
	$reponse = $bdd->query("SELECT * from produit where Reference='$ref' ");
    $ed = $reponse->fetch();


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>authentification</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <style type="text/css">
      body{
        background-image: url(l.jpg);
        background-size: cover;
        color: white;
        background-repeat: no-repeat;
        background-position: center; 
        background-attachment: fixed;
      }
      form{
        background: rgba(45, 45, 125, 0.58);
        color: white;
        padding: 40px;
        margin-top: 180px;
        padding-bottom: 60px;
        box-shadow: 10px 10px 5px rgba(6, 1, 1, 0.43)
      }
      h1{
        text-align: center;
      }
      .btn{
        width: 100%;
        border-radius: 0px;
        
      }
      .form-control{
        border-radius: 0px;
        background-color: rgba(23, 3, 3, 0.48);
        color: white;
        border-radius:1px solid #291212
      }
      .col-sm-10{
        float:right;
      }
      .control-label col-sm-2{
       float:left;
      }
      .form-group {
        margin-top:8px;
      }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
  </head>
  <body>
    

      <div class="container" >
        <div class="row" >
         <div class="container" style="width:24cm;">
            <form action="modifier_produit.php" method="POST">
			<h1> modification : </h1>
            <div class="form-group">
      <label class="control-label col-sm-2"  for="type" style="margin-top:4px;">type produit:</label>
      <div class="col-sm-10">
        <input type="text" style="width:6cm;margin-top:4px;" class="form-control" name="type" value="<?php echo($ed['type']) ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ref" style="margin-top:14px;">Reference :</label>
      <div class="col-sm-10">
        <input type="text" style="width:6cm;margin-top:4px;" class="form-control" name="ref" value="<?php echo($ed['Reference']) ?>" />
      </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
    <label class="control-label col-sm-2" style="margin-top:9px;" for="Desgn">designation:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" style="width:6cm;margin-top:4px;" name="Desgn" value="<?php echo($ed['Designation']) ?>" />
      </div>
    </div>
    <div class="form-group" style="margin-top:2px;">
      <label class="control-label col-sm-2" for="prx_N" style="margin-top:16px;">  prix Normal: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="prx_N" style="width:6cm;margin-top:4px;" value="<?php echo($ed['prixNormal']) ?>" />
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="prx_P" style="margin-top:16px;"> prix Promo:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="prx_P" style="width:6cm;margin-top:4px;" value="<?php echo($ed['prixPromo']) ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="photo" style="margin-top:14px;"> photo :</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" name="photo" style="width:6cm;margin-top:4px;" value="<?php echo($ed['photo']) ?>" />
      </div>
    </div>
			  <br>
			  
              <br>
              
              <input type="submit" style="margin-top:4cm;width:12cm;margin-left:3cm;" class="btn btn-primary btn-block" style="color:blue;font-weight:bold;font-size:30px;" value="modifier" />
            </form>
          </div>
        </div>
      </div>


  </body>
</html>