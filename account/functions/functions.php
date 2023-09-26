<!-- Include SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php

function clean($string){
	return htmlentities($string);
}

function redirect($location){
	return header("Location: {$location}");
}


function set_message($message) {
  if(!empty($message)){ 
   $_SESSION['message']	= $message;
   }else {
	$message = "";
   }
}

function display_message(){
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}


function token_generator(){
	$token =$_SESSION['token'] = md5(uniqid(mt_rand(),true));
	return $token;
}


function validation_errors($error_message){

	$error_message = <<<DELIMITER
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong=Warning</Strong> $error_message 
        </div>
DELIMITER;       
return $error_message;
}

function phone_exists($phone){
	$sql = "SELECT phone FROM designers WHERE phone ='$phone'";
	$result = query($sql);
	if(row_count($result) ==1){
		return true;
	}else {
		return false;
	}
}

function email_exists($email){
	$sql = "SELECT Email FROM designers WHERE Email ='$email'";
	$result = query($sql);
	if(row_count($result) ==1){
		return true;
	}else {
		return false;
	}
}

/* Validation Functions*/

function validate_user_registration(){ 
   $errors = [];
   $min = 3;
   $max = 20;
   
  if($_SERVER['REQUEST_METHOD'] == "POST"){

  	$first_name = clean($_POST['first_name']);
  	$last_name = clean($_POST['last_name']);
  	$username = clean($_POST['username']);
  	$phone = clean($_POST['phone']);
  	$email = clean($_POST['email']);
  	$password = clean($_POST['password']);
  	$confirm_password = clean($_POST['confirm_password']);

	  
   if(strlen($first_name) < $min) {
   	$errors[] = "Your first name cannot be less than {$min} characters ";
   }
	  
   if(strlen($first_name) > $max) {
   	$errors[] = "Your first name cannot be greater than {$max} characters ";
   }

	  
    if(empty($first_name)){
   	$errors[] = "Your Firstname cannot be empty";
   }
	  
   if(strlen($last_name) < $min) {
   	$errors[] = "Your last name cannot be less than {$min} characters ";
   }
	  
   if(strlen($last_name) > $max) {
   	$errors[] = "Your last name cannot be greater than {$max} characters ";
   }
	  
    if(strlen($username) > $max) {
   	$errors[] = "Your username cannot be greater than {$max} characters ";
   }
	  
   if(strlen($username) < $min) {
   	$errors[] = "Your user name cannot be less than {$min} characters ";
   }
	  
	  
    if(email_exists($email)){
     $errors[] = "Sorry that email is already registered ";
   }
    if(phone_exists($phone)){
     $errors[] = "Your that phone is already registered ";
   }
   if(strlen($email) < $min) {
   	$errors[] = "Your email cannot be less than {$min} characters ";
   }
	  
   if($password !== $confirm_password) {
    $errors[] = "Your passwords do not match";
   } 
	  
if(strlen($phone) < $min) {
   	$errors[] = "Your phone number cannot be less than {$min} characters ";
   }
	  
	  if(strlen($phone) > $max) {
   	$errors[] = "Your phone number cannot be more than {$max} characters ";
   }
	  
	if(empty($phone)) {
	$errors[] = "Your phone cannot be empty";
   }
	  
   if(!empty($errors)) {
   	foreach ($errors as $error) {
   		echo validation_errors($error);
   	}
   }
	  else {
        if (register_user($first_name, $last_name, $phone, $email, $username, $password)) {
    // Registration succeeded
    echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Please login to complete your account..!',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = '../administration/pages-login.php';
            });
          </script>";
} else {
    // Registration failed
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'We could not create the new account for you',
                confirmButtonText: 'OK'
            });
          </script>";
}
   }
  }
} 

/* ****************** Register user function**************  */
function register_user($first_name, $last_name,$phone,$email,$username, $password) {
	$first_name = escape($first_name);
	$last_name  = escape($last_name);
	$phone      = escape($phone);
    $email      = escape($email);
	$username   = escape($username);
    $password   = escape($password);
	
    if(email_exists($email)) {
		return false;	
	} 
	else if (phone_exists($phone)) {
	   return false;
	 } 
	
	else {   
         $password        = md5($password);           
	 	 $sql ="INSERT INTO  designers(first_name,surname,phone,email,username,password)";
	     $sql.= " VALUES('$first_name','$last_name','$phone','$email','$username','$password')";
	     $result = query($sql);
	     confirm($result);     
	     return true;
	 }  
} 


?>
