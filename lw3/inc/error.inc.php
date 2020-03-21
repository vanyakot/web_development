<?php

const ERR_OK = 0;
const ERR_INVALID_SYMBOLS = 1;
const ERR_INVALID_FIRST_SYMBOL = 2;

define('MSG_VALID_ID', 'Строка являеется идентификатором.'); 

function getErrorMessage($errorCode)
{
	$errorMessages = [
		ERR_INVALID_FIRST_SYMBOL => 'Первый символ не являеется буквой.',
		ERR_INVALID_SYMBOLS => 'В строке найдены неподдерживаемые символы.'
	];
	return $errorMessages[$errorCode] ?? '';	
}
