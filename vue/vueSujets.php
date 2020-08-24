<?php 

class VueSujets{

	function afficheSujets($allSujets){
		header("Content-type: text/html; charset=utf-8");
		?>
		<html>
			<head>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="vue/style.css" /></head>
			<body>
				<a href="index.php?creer=true">Insérer un sujet</a>
				<br/>
				<br/>
				<?php
				foreach ($allSujets as $sujet){
				?>
					<div class ="sujet">
						<a href="index.php?id_sujet=<?php echo $sujet['id']; ?>"><?php echo $sujet['titre']; ?></a>
						</br>
						<p><?php echo "Auteur : ".$sujet['auteur']; ?></p>
						</br>
						<p><?php echo "Date : ".$sujet['date_derniere_reponse']; ?></p>
					</div>
				<?php
				}
				?>
			</body>
		</html>
	<?php
	}

}
?>