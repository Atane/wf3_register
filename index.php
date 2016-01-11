<?php 

if (isset($_POST['action'])) {
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	
	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";

// 1 Faire un echo de la taille de l'image
$taille = "La taille de la photo est de " . $_FILES['photo']['size'];
// echo $taille . "<br>";

// 2 Faire un echo du type d'image
$type = "Le type de la photo est " . $_FILES['photo']['type'];
// echo $type;

// 4 Checker l'extension du type de fichier 
$uploadFileType = $_FILES['photo']['type'];
$uploadFileSize = $_FILES['photo']['size'];
if (!strstr($uploadFileType, 'jpg') && !strstr($uploadFileType, 'jpeg') && !strstr($uploadFileType, 'png')) {
	echo "Une image au bon format n'est pas comme la tienne";
}
elseif ($uploadFileSize > 10000000) {
	echo "Deçu ?";
}
	// 3 Déplacer l'image uploadé
elseif (move_uploaded_file($_FILES['photo']['tmp_name'], './uploads/' . $_FILES['photo']['name'])) {
	echo "Votre image à bien étais uploadé";

} else {
	echo "Erreur votre image n'a pas été uploadé correctement";
}



}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	

	<title>Signin Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	
  </head>

  <body>

  	<div class="container">

  		<form action="#" method="POST" enctype="multipart/form-data">
  			<div class="form-group">
  			<label for="nom">Nom</label>
  				<input type="text" class="form-control" id="nom" name="nom" placeholder="Votre Nom">
  			</div>
  			<div class="form-group">
  				<label for="prenom">Prénom</label>
  				<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre Prénom">
  			</div>
  			<div class="form-group">
  				<label for="exampleInputFile">File input</label>
  				<input type="file" name="photo" id="exampleInputFile">
  				<p class="help-block">Pas de truc hardcore et de plus de 10ko.</p>
  			</div>
  			<div class="checkbox">
  				<label>
  					<input type="checkbox" class="checkbox-inline"> Check me out
  				</label>
  			</div>
  			<button type="submit" name="action" class="btn btn-danger">Submit</button>
  		</form>

  	</div> <!-- /container -->


  </body>
  </html>
