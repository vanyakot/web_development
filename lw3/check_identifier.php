<?php

require_once('inc/error.inc.php');

$inputString = $_GET['identifier'] ?? '';
$errorCode = ERR_OK;

if (empty($inputString)) {
	http_response_code(400);
	return;
}

if (!ctype_alnum($inputString)) {
	$errorCode = ERR_INVALID_SYMBOLS;
}

if ($errorCode == ERR_OK && ctype_digit($inputString[0])) {
	$errorCode = ERR_INVALID_FIRST_SYMBOL;
}

echo ($errorCode == ERR_OK) ? MSG_VALID_ID : getErrorMessage($errorCode);