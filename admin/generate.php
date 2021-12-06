<?php

      $fp = fopen("access.log", "a");
      if(!$fp) 
          return "Error opening access.log";

for($i=0, $j = 10; $i<100; $i++, $j--){
   $ret = '["url'.$i.'","date'.$i.'"],'."\n";
   fwrite($fp, $ret);
}
fclose($fp);

?>