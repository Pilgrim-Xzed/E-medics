<?php

if (! function_exists('money_format')) {

	function money_format($val,$symbol='$',$r=2) {

		$n = $val;
		$c = is_float($n) ? 1 : number_format($n,$r);
		$d = '.';
		$t = ',';
		$sign = ($n < 0) ? '-' : '';
		$i = $n=number_format(abs($n),$r);
		$j = (($j = $i.length) > 3) ? $j % 3 : 0;

		return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;

	}

}

