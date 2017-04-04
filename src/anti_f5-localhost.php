<?php
	function antiF5 ($view){

		// Edit this ->

		$src = "./thred/f5log.log";		//file directory
		$msg = "Stopped load this web page a few seconds because of loading it too often.";	//message when f5 attack
		$msg_color = "red";	//message color
		$delay = 3; //delay time when load (sec)

		// Edit this <-

		echo "<!-- 'Anti f5 attack' was made by Seaoftrees. (MIT) -->\r\n";
		$break = false;
		$ipLong = decoct(ip2long($_SERVER["REMOTE_ADDR"])); 
		$time = Time();
		$original_data = "";

		$fp = fopen($src, 'r');
		if(flock($fp, LOCK_EX)){
			$original_data = fgets($fp);
			flock($fp, LOCK_UN);
		}else{
			echo "Failed to lock the file.";
		}
		fclose($fp);

		$fp = fopen($src, 'w+');
		if(flock($fp, LOCK_EX)){
			if(strpos($original_data, "9") !== false){
				$data = explode("9", $original_data);
			}else{
				$data = array(0 => "".$original_data);
			}
			$contents = "";
			foreach ($data as $value) {
				$del = false;
				if($value){
					List($ip, $past, $viewed) = explode("8", $value);
					if(($viewed===$view)&&(($time-(octdec($past)))<$delay)){ //if(($ip===$ipLong)&&($viewed===$view)&&(($time-(octdec($past)))<$delay)){
						$break = true;
					}else{
						if(($time-(octdec($past)))>($delay+10)) $del=true;
					}
				}
				if(!$del) $contents = $contents.$ip."8".decoct($time)."8".$view;
			}
			fwrite($fp, $contents);
			flock($fp, LOCK_UN);
		}else{
			echo "Failed to lock the file.";
		}
		fclose($fp);

		if($break) exit('<font color="'.$msg_color.'">'.$msg.'</font>');

	}
?>