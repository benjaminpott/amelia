<?php // benchmnark

function fx_ubench(){

	$bench = new Ubench;
	$bench->start();

	// Execute some code
	$bench->end();

	// Get elapsed time and memory

	echo '		<div data-alert class="alert-box info" style="font-size:0.8em;font-family:Courier, monospace;margin-bottom: 0px!important;">'."\n";
	echo '			<strong>uBench</strong>'."\n";
	echo '			<br>Time: '.$bench->getTime()."\n"; // 156ms or 1.123s
	echo '			<br>Time (float): '.$bench->getTime(true)."\n"; // elapsed microtime in float
	echo '			<br>Time: '.$bench->getTime(false, '%d%s')."\n"; // 156ms or 1s
	echo '			<br>Memory Peak: '.$bench->getMemoryPeak()."\n"; // 152B or 90.00Kb or 15.23Mb
	echo '			<br>Memory Peak(bytes): '.$bench->getMemoryPeak(true)."\n"; // memory peak in bytes
	echo '			<br>Memory Peak: '.$bench->getMemoryPeak(false, '%.3f%s')."\n"; // 152B or 90.152Kb or 15.234Mb

	// Returns the memory usage at the end mark
	echo '			<br>Memory Usage: '.$bench->getMemoryUsage()."\n"; // 152B or 90.00Kb or 15.23Mb
echo '			<a href="#" class="close">&times;</a>'."\n";
	echo '		</div>'."\n";


}

?>