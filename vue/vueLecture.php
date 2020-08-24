<?php 

class VueLecture{

	function lireSujet($leSujet, $Reponses){
		header("Content-type: text/html; charset=utf-8");
		?>
		<html>
			<head>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="vue/style.css" /></head>
			<body>
				<div class ="sujet">
						<h1><?php echo $leSujet['titre']; ?></h1>
						</br>
						<p><?php echo "Auteur : ".$leSujet['auteur']." le : "."la date création peut être ?"; ?></p>
						</br>
						<p><?php echo $leSujet['message']; ?></p>
				</div>
				<br/>
				<?php
				foreach ($Reponses as $rep){
				?>
					<div class ="reponse">
						</br>
						<p><?php echo "Auteur : ".$rep['auteur']." le : ".$rep['date_reponse']; ?></p>
						</br>
						<p><?php echo $rep['message']; ?></p>
					</div>
				<?php
				}
				?>
				<a href="index.php?repondre=true&id=<?php echo $leSujet['id'];?>">Insérer une réponse</a>
			</body>
		</html>
		<?php
	}

}
?>