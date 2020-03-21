<?php
function last($inStr){	
    return mb_substr($inStr, -1);
}
function withoutLast($inStr){
    return mb_substr($inStr, 0, -1);
}
function revers($inStr){
    $arr = preg_split('//u', $inStr, null, PREG_SPLIT_NO_EMPTY);
	$endArr = count($arr) - 1;
	$startArr = 0;
    while($startArr <= $endArr) {
	    $exchangeSymbol = $arr[$startArr];
	    $arr[$startArr] = $arr[$endArr];
	    $arr[$endArr] = $exchangeSymbol;
	    ++$startArr;
	    --$endArr;
	}
	return implode($arr);
} 
function remExtBlanks($inStr){
    return trim(preg_replace('/  +/', ' ', $inStr)); 
}
