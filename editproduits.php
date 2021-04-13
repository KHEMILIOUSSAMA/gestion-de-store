<?php
    $user='root';
    $password='';
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=store', $user, $password);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

if(isset($_POST['submit']))
{
	$stmt = $dbh->prepare(' UPDATE produit SET PRODUIT = :produit ,CATEGORIE= :categorie ,DESCRIPTION = :description , prix= :prix   WHERE ID = :id ');
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->bindParam(':produit', $_POST['produit']);
    $stmt->bindParam(':categorie', $_POST['categorie']);
    $stmt->bindParam(':prix', $_POST['prix']);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->execute(); 

   echo '<div class="alert alert-success" role="alert">produit : '.$_POST['produit'].'  modifié avec succes !</div>';

}

if (isset($_GET['id'])) {
    $stmt = $dbh->prepare(' select * FROM produit WHERE ID = :id ');
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute(); 
   $rows = $stmt->fetch();
}else{
  header('Location: listeproduits.php');
}



?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="theme/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="theme/style.css">
</head>
<body>
  <div class="fluid-container">
    <div  class="container">
   <h1> store modification des produits</h1>
  </div>
  </div>
 <div class="container">
  <div class="jumbotron">
    <h1>modifier un produit</h1>      
    <p>Ce formulaire pour modifier un produit ! </p>
      
<form action="" method="post">
  <div class="input-group">
  <label for="produit">nom du produit* :</label>
  <input id="produit" class="form-control" type="text" name="produit" placeholder="le nom  de votre produit" required value="<?php echo $rows['PRODUIT']?>">
  </div>
  <br>
  <div class="input-group">
  <label for="categorie">le categorie de produit* :</label>
  <input id="categorie" class="form-control" type="text" name="categorie" placeholder="préciser le categorie de votre produit" required value="<?php echo $rows['CATEGORIE']?>">
  </div>
   <br>
   
   <div class="input-group">
  <label for="prix">le prix* :</label>
  <input id="prix" class="form-control" type="float" name="prix" placeholder="prix" required 
  value="<?php echo $rows['PRIX']?>">
   </div>  
   <br>
 
   <div class="input-group">
  <label for="description">une description :</label>
  <input id="description" class="form-control" type="text" name="description" placeholder="ajouter une description de votre produit" value ="<?php echo $rows['DESCRIPTION']?>">
   </div> 
  <br>


  <input type="submit" name="submit" value="Enregistrer">

</form>
<a href="produit.php">  Ajouter un produit </a>
 <br>
<a href="listeproduits.php">  liste produits </a>
<p>Les champs en (*) sont obligatoires ! </p>
</div> 
</div>
</body>
</html>

