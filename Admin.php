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
     
$reponse = $bdd->query('SELECT * FROM produit');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="color:black;font-weight:bold;font-size:15px;">
<ul class="pager">
  <li class="previous" style="float:right;margin-right:2cm;"><a href="index.php?logout">Deconnecter</a></li>
</ul>
<div class="container">
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">type</th>
        <th scope="col">Reference</th>
        <th scope="col">Designation</th>
		 <th scope="col">prixNormal</th>
        <th scope="col">prixPromo</th>
        <th scope="col">photo</th>
        <th scope="col">supprimer</th>
        <th scope="col">modifier</th>
        
		
      </tr>
    </thead>
    <tbody>
      
     <?php while ($es = $reponse->fetch()) {  ?>
	<tr>  <th  scope="row">   <?php echo $es['type'] ?> </th>
		<td>   <?php echo $es['Reference']  ?> </td>
				<td>   <?php echo $es['Designation']  ?> </td>
				<td>   <?php echo $es['prixNormal']  ?> </td>
                <td>   <?php echo $es['prixPromo']  ?> </td>
                <td>   <img src="images/<?php echo $es['type'] ?>/<?php echo $es['photo']?>" alt="photo"></td>
				<td>  <a  href="supprimer_produit.php?ref=<?php echo $es['Reference'] ?>" title="supprimer produit"> <img width="25cm" height="25cm" src="img10.png" />  </a> </td>
				<td>  <a  href="modifier_produitt.php?ref=<?php echo $es['Reference'] ?>" title="modifier produit"> <img width="25cm" height="25cm" src="img11.png" />  </a> </td>
				
				
	  <?php }  ?>
    </tbody>
  </table>
</div>
<div style="size:10cm">

<div class="container" style="float:left;width:21cm;">
  <h2>Gestion</h2>
  <form class="form-horizontal" action="ajouter_produit.php" method="POST">
  <div class="form-group">
      <label class="control-label col-sm-2" for="email">type produit:</label>
      <div class="col-sm-10">
        <input type="text" style="width:6cm;" class="form-control" name="type" placeholder="ref produit" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Reference produit:</label>
      <div class="col-sm-10">
        <input type="text" style="width:6cm;" class="form-control" name="ref" placeholder="nom produit" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Designation :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" style="width:6cm;" name="desgn" placeholder="prix unitaire " />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Prix Normal:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="prx_N" style="width:6cm;" placeholder="qte stockee" />
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"> Prix promo:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="prix_P" style="width:6cm;" placeholder="indisponible " />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Photo</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" name="photo" style="width:6cm;"  />
      </div>
    </div>
	</div>
	<div style="float:right;">  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <table> <tr>   <input type="submit" class="btn btn-secondary btn-lg" style="width:4cm;margin-right:10cm;margin-top:-8cm;color:blue;" value="ajouter">  </form> </tr> 
		<tr>  <form action="actualiser_produit.php" method="POST"></tr>
		
       </tr> <input type="submit" class="btn btn-primary btn-lg" style="width:4cm;margin-right:10cm;margin-top:-6cm;" value=" actualiser"/></form></tr></table>
      </div>
    </div>
	 </div>


</div>

</body>
</html>