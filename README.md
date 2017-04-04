# Anti_f5_attack
You can implement Anti-f5-attack using PHP.

<h2>How to use</h2>
Please only write this in first of php file.
↓before↓
<code>
<!DOCTYPE html>
<html>
	<body>
		<p>Text</p>
	</body>
</html>
</code>
↓after↓
<code>
\<?php
	require "./anti_f5.php";
	antiF5("0");
?\>
<!DOCTYPE html>
<html>
	<body>
		<p>Text</p>
	</body>
</html>
</code>

<h2>Other Settings</h2>
anti_f5.php
<code>
<?php
	function antiF5 ($view){

		// Edit this ->

		$src = "./thred/f5log.log";		//file directory
		$msg = "Stopped load this web page a few seconds because of loading it too often.";	//message when f5 attack
		$msg_color = "red";	//message color
		$delay = 3; //delay time when load (sec)

		// Edit this <-
    
    ...more
</code>

<code>$src = "./thred/f5log.log";		//file directory</code>
'$src' of String is a log file directory. You need not create this file because of creating auto.

<code>$msg = "Stopped load this web page a few seconds because of loading it too often.";	//message when f5 attack</code>
