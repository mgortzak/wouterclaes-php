<?php
  require_once('header.php');
  
  mysql_query('SET character_set_results=utf8', $db_resource);  
  $select = 'SELECT * FROM links ORDER BY description ASC';
  $query = mysql_query($select) OR die(mysql_error());
  
  // get the links, sorted by description
  $old_letter = '';
  $links = array();
  while($result = mysql_fetch_array($query)) {
    $new_letter = strtoupper(substr($result['description'], 0, 1));
  
    if($new_letter != $old_letter) {
      $links[$new_letter] = array();
    }
    $links[$new_letter][] = "<a href=\"{$result['url']}\" target=\"_blank\">{$result['description']}</a>";
    $old_letter = $new_letter;
  }
  
  // get the link for the letters
  $letters = '';
  foreach(range('A','Z') as $letter) {
    if(isset($links[$letter])) {
      $letters .= "<a href=\"#$letter\">$letter</a> ";
    } else {
      $letters .= "$letter ";
    }
  }
?>
<center>
<hr width="100%" size=4>
<h2><?=$letters;?></h2>
<hr width="100%" size=4>
<?php
  foreach($links as $letter => $links_letter) {
    print("<a name=\"$letter\"><h3>$letter</h3></a>");
  
    foreach($links_letter as $link) {
      print("$link<br>");
    }
  
    print('<a href=""><h3>Top</h3></a><br>');   
  }
?>
</center>
<?php 
  require_once('footer.php');
?>