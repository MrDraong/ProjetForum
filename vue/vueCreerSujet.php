<?php 

class VueCreerSujet{

	function afficheCreationSujet(){
		header("Content-type: text/html; charset=utf-8");
		?>
		<html>
			<head>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="vue/style.css" /></head>
			<body>
			<div class="formulaire">
				<form method="post" action="index.php">
					<p>Entrer votre pseudo :</p> <input type="text" name="pseudo"/>
					</br>
					<p>Titre du sujet</p> <input type="text" name="titre"/>
					</br>
					<label>Votre message :</label>
					</br>
					<textarea name="message" rows="5" cols="33"></textarea>
					</br>
					</br>
					<input type="submit" name="soumettreSujet" value="envoyer"/>
				</form>
			</div>
			</body>
		</html>
		<?php
	}

}
?>