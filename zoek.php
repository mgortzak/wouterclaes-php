<?php
  require_once ('header.php');
  
  $heigth = '50px';
  
  if($tijd == 0) 
  {
?>
<table>
  <tr>
    <td height="<?=$heigth;?>"></td>
    <td width="<?=$width;?>" height="<?=$heigth;?>"></td>
    <td height="<?=$heigth;?>"></td>
  </tr>
  
  <tr>
    <td></td>
    <td width="<?=$width;?>"><div class="text">
    <?  
        if($achternaam && strlen($achternaam) > 0 && !is_numeric($achternaam)) {
          mysql_query('SET character_set_client=utf8', $db_resource);      
          mysql_query('SET character_set_results=utf8', $db_resource);
          $select = "SELECT * FROM stamnr WHERE achternaam = '$achternaam' ORDER BY achternaam, voorvoegsel, voornaam ASC";
          $query = mysql_query($select) OR die(mysql_error());
          $aantal = mysql_num_rows($query);
          
          print("<p>{$msg['zoek_result_begin']} <b>$aantal</b> {$msg['zoek_result_end']} <b>$achternaam</b>:</p>");
          print('<font class="result">');
          while ($familie = mysql_fetch_array($query))
          { 
            $naam = $familie['achternaam'].(strlen($familie['voorvoegsel']) == 0 ? '' : " {$familie['voorvoegsel']}").', '.$familie['voornaam'];
            $geboren = (strlen($familie['geboortedatum']) == 0 ? '?' : $familie['geboortedatum']);
            $gedoopt = (strlen($familie['doopdatum']) == 0 ? '?' : $familie['doopdatum']);
            print ("<a href=\"persoon.php?kaart={$familie['id']}&lang=$lang\">$naam</a> - {$msg['geboren']} ($geboren) - {$msg['gedoopt']} ($gedoopt)<br>");   
          }
          print('</font>');
        }
    ?> 
    </div></td>
    <td></td>
  </tr>
  
  <tr>
    <td height="<?=$heigth;?>"></td>
    <td width="<?=$width;?>" height="<?=$heigth;?>"></td>
    <td height="<?=$heigth;?>"></td>
  </tr>
</table>
<?php
}
else
{
   ?>
   <blockquote><div>
      De site wordt bijgewerkt, probeer het over <?=$tijd;?> minuten nog eens.<br/>
      Sorry voor het ongemak.
   </div></blockquote>
   <?php
}
  require_once ('footer.php');
?>