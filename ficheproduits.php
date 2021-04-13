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
    $stmt = $dbh->prepare(' select * FROM produit WHERE ID = :id ');
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute(); 
   $rows = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="theme/bootstrap.css">
<link rel="stylesheet" type="text/css" href="theme/style.css">
</head>

<body>
<div class="header">
	
	<div class="container">
		<img src="theme/img/logo.png" alt="Italian Trulli" class="logoimg">
	</div>
	
</div>




<div class="container">
	<div class="row">
  <div class="col-md-5">
  	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>	
  <div class="col-md-7">
  	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>	

  
</div>
	<h1> détails du produit </h1>
	<div class="row">
		<div class="col-md-6">
			<ul class="list-group">
			  <li class="list-group-item">produit :
			   <?php echo $rows['PRODUIT'] ?></li>

			  <li class="list-group-item">categorie :
			     <?php echo $rows['CATEGORIE']?></li>
			  <li class="list-group-item">prix :
			<?php echo $rows['PRIX']?></li>
			  <li class="list-group-item">Description :
			<?php echo $rows['PRIX']?></li>

			</ul>
		</div>
		<div class="col-md-6">
			<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		</div>
	</div>

</div>
</body>

</html>
