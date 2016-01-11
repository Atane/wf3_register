<?php 

$imageDir = 'images/';

// Récupération de tous les fichiers dans /images
$images = glob($imageDir.'*');


if (isset($_FILES['user_picture']['tmp_name'])) {
	$uploadFileName = $_FILES['user_picture']['name'];
	$uploadFileTmpName = $_FILES['user_picture']['tmp_name'];
	$uploadFileType = $_FILES['user_picture']['type'];
	$uploadFileSize = $_FILES['user_picture']['size'];

	// checker le type de fichier d'image
	if (!strstr($uploadFileType, 'jpg') && !strstr($uploadFileType, 'jpeg') && !strstr($uploadFileType, 'png')) {
		echo "Une image au bon format n'est pas comme la tienne";
	}
	elseif ($uploadFileSize > 10000000) {
	
		echo "Deçu ?";
	
	}
	elseif (move_uploaded_file($uploadFileTmpName, $imageDir.time().$uploadFileName)) {
		echo "Votre image à bien étais uploadé";
	
	}
	else {
		echo "Erreur votre image n'a pas été uploadé correctement";
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
</head>
<body>
	<h5>Envoyer une image</h5>
	<form method="POST" action="#" enctype="multipart/form">
		<input type="file" name="user_picture">
		<input type="submit" name="acton" value="Envoyer">

	</form>

	<!-- Faire un foreach sur $images et afficher les images avec <img src=.. -->

	<?php foreach ($images as $image): ?>
		<img src="<?php echo $image; ?>">

	<?php endforeach ?>
	
</body>
</html>