<?php
/*
выведите историю активности с пагинацией сгруппированную по URL. 
Поля таблицы: URL, Количество визитов, Последнее посещение. 
Эту информацию вы запрашиваете в проекте activity (json-rpc запрос).
*/ 


// Вот этот блок конечно надо делать с одним циклом и с одним массивом:
// построчно считываем, и сразу складываем куда надо, но я расписал подробно, чтобы было понятно чего я хочу добиться.

$log = file_get_contents('access.log');
if(!$log)
   echo "Error reading access.log";
   
$log = '['.substr($log, 0, -2).']';
$log_arr = json_decode($log);
unset($log);

$res = array();
foreach($log_arr as $str){
   $url = $str[0];
   $time = $str[1];
   
   $res[$url][] = $time;
}
unset($log_arr);

$show = array();
foreach($res as $url=>$time){
   $last_time = max($time);
   $visits = count($time);
   
   $show[] = array($url, $visits, $last_time);
}
unset($res);

/*********    PAGING      *********/

$page_size = (isset($_GET['page_size']) ? $_GET['page_size'] : 10);    // кол-во строк на странице
$rows_count = count($show);   // кол-во строк в наличии 
$pages_count = ceil($rows_count / $page_size);    // кол-во страниц
$page_num = (isset($_GET['page_num']) ? $_GET['page_num'] : 1);   // текущая страница
$from_row = ($page_num-1) * $page_size;
$to_row = ($page_num-1) * $page_size + $page_size;

for($i=1; $i<=$pages_count; $i++){
   if($i!=$page_num)
      echo "<a href='activity.php?page_num=$i&page_size=$page_size'>$i</a> ";
   else
      echo "$i ";
}

$cur_row = 0;
?>   

<table border=1>
   <tr>
      <th>URL</th>
      <th>Visits Count</th>
      <th>Last Visit</th>
   </tr>
   <?php foreach($show as $str){
      $cur_row ++;
      if($cur_row <= $from_row)
         continue;
      if($cur_row > $to_row)
         break;
      
      echo"  
      <tr>
         <td>$str[0]</td>
         <td>$str[1]</td>
         <td>$str[2]</td>
      </tr>";
   } ?>
</table>
   
