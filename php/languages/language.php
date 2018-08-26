<?php 
  $link = ($kaart > 0 ? "kaart=$kaart&" : '');
  $link .= (strlen($keuze) > 0 ? "keuze=$keuze&" : '');
  $link .= (strlen($achternaam) > 0 ? "achternaam=$achternaam&" : '');
?>
<p>
<table>
  <tr>
    <td width="100%"></td>
    <td><a href="?<?=$link?>lang=nl"><img src="<?=$root_dir;?>/images/languages/nl.gif"></a></td>
    <td><a href="?<?=$link?>lang=en"><img src="<?=$root_dir;?>/images/languages/en.gif"></a></td>
    <td><a href="?<?=$link?>lang=de"><img src="<?=$root_dir;?>/images/languages/de.gif"></a></td>
  </tr>
</table>
</p>