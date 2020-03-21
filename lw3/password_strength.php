<?php
require_once 'inc/error.inc.php';
$inputString = $_GET['password'] ?? '';
$errorCode = ERR_OK;

if (empty($inputString)) {
	http_response_code(400);
	return;
}

if (!ctype_alnum($inputString)) {
	$errorCode = ERR_INVALID_SYMBOLS;
}

if ($errorCode == ERR_OK){
   $passStrength = strengthLength($inputString) 
   	+ strengthDigit($inputString) 
   	+ strengthDownLetter($inputString) 
   	+ strengthHighLetter($inputString) 
   	+ strengthOnlyLetter($inputString) 
   	+ strengthOnlyDigit($inputString) 
   	+ strengthRepeatSymbol($inputString);
   
   echo $passStrength;
} else {
	echo getErrorMessage($errorCode);
}

function strengthLength($pass){
	return 4 * strlen($pass);
}

function strengthDigit($pass){
	preg_replace('^\\d^', '', $pass, -1, $countOfDigit);
    return 4 * $countOfDigit;
}

function strengthDownLetter($pass){
	preg_replace('^[a-z]^', '', $pass, -1, $countOfDownLetter);
    return ($countOfDownLetter !== 0) ? ((strlen($pass) - $countOfDownLetter) * 2) : 0;
}

function strengthHighLetter($pass){
	preg_replace('^[A-Z]^', '', $pass, -1, $countOfHighLetter);
    return ($countOfHighLetter !== 0) ? ((strlen($pass) - $countOfHighLetter) * 2) : 0;
}

function strengthOnlyLetter($pass){
	preg_replace('^[A-z, a-z]^', '', $pass, -1, $countLetter); 
	return ((strlen($pass)) == $countLetter) ? -$countLetter : 0;
}

function strengthOnlyDigit($pass){
	preg_replace('^\\d^', '', $pass, -1, $countDigit); 
	return ((strlen($pass)) == $countDigit) ? -$countDigit : 0;
}

function strengthRepeatSymbol($pass){
	$countRepeatSymbol = 0;
    $arrTemp = array_count_values(str_split($pass));
    foreach($arrTemp as $value){
    	if ($value !== 1){
            $countRepeatSymbol += $value;
        }
    }
    return -$countRepeatSymbol;
}
