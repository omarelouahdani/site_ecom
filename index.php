<?php
 require_once  "produits.php";
 require_once "session.php";
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

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
    .col-md-4 {
    
       width: 8.5cm;
       height : 10cm;



    }
    .txt {

     text-align: center;
     color : gray;
     font-size: 18px;
     font-weight: bold;

    }
    .dcm {

        text-align: center;
     color : black;
     font-size: 14px;
     font-weight: bold;

    }
    .row {
      margin-left:4cm;
      margin-top:3cm;
      height: 3cm;
    }
    .form-inline {

      margin-left: 1cm;
      margin-top : 1cm;

    }
    h2 {
  display: block;
  font-size: 1.5em;
  margin-top: 0.83em;
  margin-bottom: 0.83em;
  margin-left: 0;
  margin-right: 0;
  font-weight: bold;
}
    
    
    </style>
  </head>
  
  <body>

  <form class="form-inline" action="session.php" method="POST">
  <hr style="color: gray;">
  <h2 >Connecter</h2>
  <div class="form-group mb-2">
    <label for="nm" class="sr-only">Username</label>
    <input type="text"  class="form-control" name="nm" placeholder="username">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="pw" class="sr-only">Password</label>
    <input type="password" class="form-control" name="pw" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Login</button>
  <hr style="color: gray;">
</form>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Produit</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php" <?php $reponse =$bdd->query('SELECt * FROM produit ');?>>ALL</a></li>
      <li> <a href="?type=chemise" class="btn btn-secondary <?= (isset($type) && $type == "chemise") ? "active" : "" ?>">
                    chemise
                </a> </li>
                <li>  <a href="?type=veston" class="btn btn-secondary <?= (isset($type) && $type == "veston") ? "active" : "" ?>"> veston </a></li>
                <li>  <a href="?type=blouson" class="btn btn-secondary <?= (isset($type) && $type == "blouson") ? "active" : "" ?>">
                    blouson
                </a></li>
    </ul>
  </div>
</nav>


  <div class="row" >
  <?php while ($es = $reponse->fetch()) {  ?>
    
        
        <div class="col-md-4">
          <div class="thumbnail">
            <a href="">
               <img src="images/<?php echo $es['type'] ?>/<?php echo $es['photo']?>" alt="photo" style="width:60%">
               <div class="caption">
                <p class="txt"><?php echo $es['Designation']  ?></p>

                    <p class="dcm" >    <?php echo $es['prixPromo']  ?>
                         <span style="text-decoration: line-through;">  <?php echo $es['prixNormal']  ?>  </span>
                    </p>
                    <a href="session.php?ref=<?= $es['Reference'] ?>" class="btn btn-primary">buy</a>
               </div>
            </a>
           </div>
        </div>
        <?php }  ?>
        
  </div>
  
  <div class="container" >
           
                         
                         
                        <?php require_once "panier.php"; ?>
                     
  </div>
  </body>
</html>