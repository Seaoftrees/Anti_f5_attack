# Anti_f5_attack
You can implement Anti-f5-attack using PHP.

<h2>How to use</h2>
Please only write this in first of php file.<br>
require "[directory]"; // => anti_f5.php directory.<br>
antiF5("ID"); // => this web page ID. <b>YOU DON'T USE "8" AND "9".</b>  

### ↓before↓ ###
    <!DOCTYPE html>
    <html>
      <body>
        <p>Text</p>
      </body>
    </html>
    
### ↓after↓ ###
    <?php
      require "./anti_f5.php";
      antiF5("0");
    ?>
    <!DOCTYPE html>
    <html>
      <body>
        <p>Text</p>
      </body>
    </html>
    
<h2>Options</h2>  
    
### anti_f5.php ###
    $src = "./thred/f5log.log"; //file directory  
    $msg = "Stopped load this web page a few seconds because of loading it too often.";	//message when f5 attack  
    $msg_color = "red";	//message color  
    $delay = 3; //delay time when load (sec)  
    
### description ###
'$src' of String is a log file directory. You need not create this file because it is created automatic.  
  
'$msg' of String is the message when f5-attack.  
  
'$msg_color' of String is color of 'msg'. (HTML color)  
  
'$delay' of Integer is delay time between loading and next.
