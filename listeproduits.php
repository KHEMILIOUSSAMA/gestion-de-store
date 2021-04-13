

<?php


 $user='root';
    $password='';
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=store', $user, $password);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

if (isset($_GET['id'])) {
    $stmt = $dbh->prepare('delete  FROM produit where id = :id');
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute(); 
  echo 'etudiant numéro : '. $_GET['id'].  ' Supprimer avec succes !';  
}

$sth = $dbh->query('SELECT * FROM produit ORDER BY produit');
$rows = $sth->fetchAll();
if(isset($_POST['submit']))
{
    $stmt = $dbh->prepare(' UPDATE listeproduits SET produit = :produit , DESCRIPTION = :description WHERE ID = :id ');
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->bindParam(':produit', $_POST['produit']);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->execute(); 

    echo '<div class="alert alert-success" role="alert">produit '.$_POST['produit'].' est modifié avec succes !</div>';

}



?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des produits</title>
    <link rel="stylesheet" type="text/css" href="theme/style.css">
    <link rel="stylesheet" type="text/css" href="theme/bootstrap.css">
</head>

<body class="pagelisteproduit">
    <div class="header">
        <div class="container">

       <div class="titre"> liste des produits</div> 
         </div>
    </div> 
    <div class="container"> 
<h1>Liste des produits</h1>
<img src="theme/img/produit.png">
<a href="produit.php" class="btn btn-primary">  Ajouter un produit </a>
<table id="customers">

    <thead>
        <tr>
            <th >ID</th>
            <th >PRODUIT</th>
            <th >CATEGORIE</th>
            <th >PRIX</th>
            <th >DESCRIPTION</th>
            <th >ACTION</th>
           
        </tr>
    </thead>
    <tbody>
       <?php foreach  ($rows as $row) {
            print '<tr><td>'.$row['ID'] . "</td>";
            print  '<td>'.$row['PRODUIT'] . "</td>";
            print  '<td>'.$row['CATEGORIE'] . "</td>";
            print '<td>'.$row['PRIX'] . "</td>";
            print  '<td>'.$row['DESCRIPTION'] . "</td>";
            print  '<td> <a href="listeproduits.php?id='.$row['ID'] .'"> Supprimer </a>
            <a href="editproduits.php?id='.$row['ID'].'"> modifier </a>
            <a href="ficheproduits.php?id='.$row['ID'].'"> fiche </a>
            </td>';
            echo '</tr>';
        }
        ?>
      
    </tbody>

</table>
</div>

<div class="footer">
  <div class="container">
  <h1 class="footerh1">copyright 2021 </h1>
  </div>
</div>

</body>
</html>