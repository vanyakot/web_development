<?php
require_once 'inc/common.inc.php';
$inputString = $_GET['text'] ?? '';

if (empty($inputString)) {
	http_response_code(400);
	return;
}

echo remExtBlanks($inputString);