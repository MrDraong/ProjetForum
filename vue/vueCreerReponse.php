<?php 

class VueCreerReponse{

	function afficheCreationReponse(){
		header("Content-type: text/html; charset=utf-8");
		?>
		<html>
			<head>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="vue/style.css" /></head>
			<body>
				<div class ="sujet">
						<p><?php echo "YAKA KREER LE FORMULAIRE REPONSE :)"; ?></p>
				</div>
				<br/>
			</body>
		</html>
		<?php
	}

}
?>