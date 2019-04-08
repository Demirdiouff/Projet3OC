<?php

$titre = 'Page Contact - ';

?>

<div class="container">
			
			<div class="starter-template">
			<h1>Echangeons ensemble !</h1>
			<p class="lead">Vous pouvez utiliser le formulaire de contact qui est à votre dispotion pour qu'on puisse s'échanger sur les nouveautés, les prochains romans à venir... N'hésitez pas à me faire des retours sur les chapitres !</p>
      	<br/>
      </div>
			    
    </div><!-- /.container -->
			    
	<div class="container">
		<form action="action_page.php">
			    
			<label for="fname">Nom</label> <input type="text" id="fname"
				name="firstname" placeholder=""> <label for="lname">Prénom</label>
				<input type="text" id="lname" name="lastname" placeholder="">
				<label for="subject">Sujet</label>
			<textarea id="subject" name="subject" placeholder="Ecrivez quelque chose..." style="height: 200px"></textarea>
			    
			<input type="submit" value="Envoyer">
			    
		</form>
	</div>