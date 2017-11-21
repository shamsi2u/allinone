<?php $data = array(); // array to pass back data
	  $errors = array(); // array to hold validation errors

	if(empty($_POST['name'])){
		$errors['name'] = 'Name is required.';
	}elseif (empty($_POST['email'])){
		$errors['email'] = 'Email is required.';
	}elseif (empty($_POST['phone'])){
		$errors['phone'] = 'Phone number is required.';
	}elseif (empty($_POST['subject'])){
		$errors['subject'] = 'Subject is required.';
	}else{

		$data['success'] = true;
		
		$data['messageSuccess'] = 'Hey! Thanks for reaching out. We will get back to you soon';
		
		// CHANGE THE TWO LINES BELOW
		
		$email_to = "operations1@allinoneemirates.com";
		
		$email_subject = $_POST['Coustomer Request']; // required
		
		$email_from = $_POST['email'];
		
		// Form Message Begin
		
		$email_message = "<table border='0' cellpadding='2' cellspacing='2' width='600'>
		<tr><td>Request a Quote details are below:</td></tr>
		<tr><td>Name: ".$_POST['name']." </td></tr>
		<tr><td>Phone: ".$_POST['phone']." </td></tr>
		<tr><td>Email: ".$_POST['email']."</td></tr>
		<tr><td>City: ".$_POST['city']."</td></tr>
		<tr><td>Service: ".$_POST['service']."</td></tr>
		<tr><td>Message: ".$_POST['message']."</td></tr>
		</table>";	
		$cc = "operations@allinoneemirates.com";
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'Reply-To: '.$_POST['email']."\r\n";
		$headers .= 'From: '.$_POST['email'] . "\r\n";
		$headers .= 'Cc: '.$cc . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();
	
		@mail($email_to, $email_subject, $email_message, $headers);
	}
	
		if (! empty($errors)) {
		
			$data['success'] = false;
			
			$data['errors'] = $errors;
			
			$data['messageError'] = '*Note: Please check the fields in red';
		
		} 

		echo json_encode($data);
?>
