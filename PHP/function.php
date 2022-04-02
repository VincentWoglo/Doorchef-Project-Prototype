<?php
//string escape functions
function s($strings){
	return htmlentities($strings, ENT_QUOTES, 'UTF-8', FILTER_SANITIZE_STRING);

}
//function for email
function e($emailcheck){
	return FILTER_VAR($emailcheck, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE);
}
//function for int
//function for 

?>