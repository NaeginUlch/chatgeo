<?php

	//////////////////////////////////////////////////////////////////////////////////////
	// Upload fichier

		$msg = "";
		if (isset($_FILES["file"]["name"])) {
			$allowedExts = array("txt", "jpg", "png", "pdf", "doc", "docx", "xls", "xlsx", "ppt", "pptx", "ods", "tex");
			$initialFilename = $_FILES["file"]["name"];
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			if (in_array($extension, $allowedExts)) {
				if ( $_FILES["file"]["size"] < 20 * 1024 * 1024 ) {
					if ($_FILES["file"]["error"] > 0) {
						$msg = "Impossible d'envoyer le fichier (" . $_FILES["file"]["error"] . ").";
					} else {
						do {
							// Generate random filename
							$length = 20;
							$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
							$randomFilename = '';
							for ($i = 0; $i < $length; $i++) {
								$randomFilename .= $characters[rand(0, strlen($characters) - 1)];
							}
						} while (file_exists("up/{$randomFilename}.{$extension}"));

						move_uploaded_file($_FILES["file"]["tmp_name"], "up/{$randomFilename}.{$extension}");
					}
				} else {
					$msg = "La taille du fichier doit être inférieure à 20 Mo.";
				}
			} else {
				$msg = "L'extension '.{$extension}' n'est pas autorisée. Les seules extensions autorisées sont 'txt', 'jpg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'ods', 'tex'.";
			}
		}
?>



<form action="files.php" method="post" enctype="multipart/form-data">
	<h3>1 - Fichier</h3>
	<input type="file" id="file" name="file"><br>
	<h3>2 - Déposer</h3>
	<input type="submit" value="Envoyer">
</form>
