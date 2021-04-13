<?php


if (isset($_POST['submit'])){

    $user='root';
    $password='';
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=store', $user, $password);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    $stmt = $dbh->prepare("
         INSERT INTO produit (PRODUIT, CATEGORIE, PRIX, DESCRIPTION) VALUES (:produit, :categorie, :prix, :description)");
     $produit=$_POST['produit'];
     $categorie=$_POST['categorie'];
     $prix= $_POST['prix'];
     $description=$_POST['description'];
    $stmt->bindParam(':produit', $produit);
    $stmt->bindParam(':categorie', $categorie);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':description', $description);

    $stmt->execute();


echo '<div class="alert alert-success" role="alert">produit : '.$produit.'  ajouté avec succes !</div>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Projet</title>
    <link rel="stylesheet" type="text/css" href="theme/style.css">
    <link rel="stylesheet" type="text/css" href="theme/bootstrap.css">

</head>
<body>
  <div class="footer">
    <div class="container">
      <h1>Ce formulaire pour  ajouter  un produit !</h1>
    </div>
  </div>
  <div class="container">
      
    <form action="" method="post">
      <div class="input-group">
      <label for="produit">nom du produit* :</label>
      <input id="produit" class="form-control" type="text" name="produit" placeholder="le nom  de votre produit" required>
    </div>
     <div class="form-group">
      
      <label for="categorie">le categorie de produit* :</label>
      <input id="categorie"class="form-control"  type="text" name="categorie" placeholder="préciser le categorie de votre produit" required>
      </div>
      <br>
      <div class="form-group">
      <label for="prix">le prix* :</label>
      <input id="prix" class="form-control" type="float" name="prix" placeholder="prix" required>
       </div>
      <br>
        <div class="form-group">
      <label for="description">une description :</label>
      <input id="description" class="form-control"  type="text" name="description" placeholder="ajouter une description de votre produit">
      </div>
      <br>

      <input type="submit" class="btn btn-default dropdown-toggle" name="submit" value="Enregistrer">
    <a href="listeproduits.php" id="principaltitle">  liste des produits </a>
    </form>
    <p>Les champs en (*) sont obligatoires ! </p>

</div>
<div class="footer">
  <div class="container">
  <h1 >copyright c </h1>
</div>

</body>
</html>
