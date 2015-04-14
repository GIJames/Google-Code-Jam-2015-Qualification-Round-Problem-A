<?php

	if (isset($_GET["i"])) {
		$inname = $_GET["i"];
	}
	else $inname = "input.txt";
	if(isset($_GET["o"])){
		$outname = $_GET["o"];
	}
	else $outname = "output.txt";
	$in = fopen($inname, "r") or die("Unable to open input file!");
	$out = fopen($outname, "w") or die("Unable to open output file!");
	/*while(!feof($in)) {
		write ( read () . "\r\n" );
	}*/
	//actual problem starts here------------
	$cases = intval ( read() );
	for ( $i = 1; $i <= $cases; $i++ ){
		$case = explode ( " ", read());
		$levels = intval( $case[0] ) + 1;
		debug( "levels in case " . $i . ": " . $levels . "\r\n");
		$count = 0;
		$friends = 0;
		for ($level = 0; $level < $levels; $level++ ){
			debug ( "level " . $level . " members: " . intval(substr ( $case[1] , $level , 1  )) . "\r\n");
			while ( $count < $level ){
				$friends++;
				$count++;
			}
			$count += intval(substr ( $case[1] , $level , 1  ));
		}
		write("Case #" . $i . ": " . $friends . "\r\n");
	}
	//actual problem ends here--------------
	function write( $contents ) {
		global $out;
		fwrite( $out , $contents );
		echo str_replace ( "\r\n" , "<br>" , $contents);
	}
	function read() {
		global $in;
		return trim( fgets($in) , "\r\n" );
	}
	function debug( $contents ) {
		echo str_replace ( "\r\n" , "<br>" , $contents);
	}
?>
