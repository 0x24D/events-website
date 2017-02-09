<?php
public function escape($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
public function safeInt($int){
	return filter_var($int, FILTER_VALIDATE_INT);
}
public function safeFloat($float){
	return filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
}
public function safeString($string){
	return filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
}
public function safeUrl($string){
	return filter_var($string, FILTER_SANITIZE_URL);
}
public function safeEmail($string){
	return filter_var($string, FILTER_SANITIZE_EMAIL);
}
?>
