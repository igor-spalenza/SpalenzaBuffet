<?php
if (isset($_POST['action'])) { // Checking for submit form
	
	$my_email = 'spalenzabuffet@gmail.com'; // Change with your email address
	
	if ($_POST['action'] == 'add') {
		$name		= trim(strip_tags(addslashes($_POST['name'])));
		$email		= trim(strip_tags(addslashes($_POST['email'])));
		$message	= trim(strip_tags(addslashes($_POST['message'])));
		$pattern	= '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
		
		if ($email != '' && $message != '') {
			if (preg_match($pattern, $email)) {
				$headers = 'From: ' . $email . "\r\n";
				if ($name == '') $subject = '[spalenzabuffet] Nova mensagem do site ';
				else $subject = '[spalenzabuffet] Nova mensagem de:  ' . $name;
				
				mail($my_email, $subject, $message, $headers);
				
				echo 'success|<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ion-close"></i></button>Agradecemos pelo contato e aguarde: em breve retornaremos.</div>';
			} else {
				echo 'error|<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ion-close"></i></button>Informe um e-mail válido!</div>';
			}
		} else {
			echo 'error|<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ion-close"></i></button>Por favor, preencha todos os campos obrigatórios.</div>';
		}
	}
} else { // Submit form false
	header('Location: index.html');	
}
?>