<?php
require_once('header.php');

if (isset($_POST['submit']) && ((isset($_POST['achternaam']) && strlen($_POST['achternaam']) > 0 && !is_numeric($_POST['achternaam'])) || isset($_POST['voornaam']) && strlen($_POST['voornaam']) > 0 && !is_numeric($_POST['voornaam']))) {
  $achternaam = trim(mysql_real_escape_string($_POST['achternaam']));
  $voornaam = trim(mysql_real_escape_string($_POST['voornaam']));
} else {
  $achternaam = '';
  $voornaam = '';
}

  if($tijd == 0) 
  {
?>
<table>
	<tr>
		<td></td>
		<td width="<?=$width;?>">
		<div id="result" class="text">

		<form method="post" action="<?=$root_dir?>/uitvoer.php?lang=<?=$lang?>">
		<input type="hidden" name="lang" value="<?=$lang?>">
		<table>
			<tr>
				<td colspan="2">
				<h2><?=$msg['zoeken'];?></h2>
				</td>
			</tr>
			<tr>
				<td><?=$msg['zoeken_achternaam'];?>:</td>
				<td><input type="text" size="30" name="achternaam"
					value="<?=(strlen($achternaam) > 0 ? $achternaam : '');?>"></td>
			</tr>
			<tr>
				<td><?=$msg['zoeken_voornaam'];?>:</td>
				<td><input type="text" size="30" name="voornaam"
					value="<?=(strlen($voornaam) > 0 ? $voornaam : '');?>"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit"
					value="<?=$msg['zoeken'];?>"></td>
			</tr>
		</table>
		</form>

		<?php
		if (strlen($achternaam) > 0 || strlen($voornaam) > 0) {
		  mysql_query('SET character_set_client=utf8', $db_resource);
		  mysql_query('SET character_set_results=utf8', $db_resource);

		  $select = "SELECT id, achternaam, voornaam, voorvoegsel, geboortedatum, doopdatum FROM stamnr ";
		  if(strlen($achternaam) > 0 && strlen($voornaam) > 0) {
		    $select .= "WHERE achternaam LIKE '$achternaam%' AND voornaam LIKE '$voornaam%' ORDER BY achternaam, voornaam , voorvoegsel";
		  } else if(strlen($achternaam) > 0) {
		    $select .= "WHERE achternaam LIKE '$achternaam%' ORDER BY achternaam, voornaam , voorvoegsel";
		  } else if(strlen($voornaam) > 0) {
		    $select .= "WHERE voornaam LIKE '$voornaam%' ORDER BY achternaam, voornaam , voorvoegsel";
		  }

		  $query = mysql_query($select) OR die(mysql_error());
		  $aantal = mysql_num_rows($query);

		  if ($aantal == 0) {
		    print($msg['geen_resultaten']);
		  } else {
		    print("<p>{$msg['zoek_result_begin']} <b>$aantal</b> {$msg['zoek_result_end']}:</p>");
		    print('<font class="result">');
		    while($persons = mysql_fetch_array($query)) {
		      if ($persons['id'] <> 9999999) {
		        $naamlink = "{$persons['achternaam']}, {$persons['voorvoegsel']} {$persons['voornaam']}";

		        $geboren = (strlen($persons['geboortedatum']) > 0 ? $persons['geboortedatum'] : '?');
		        $gedoopt = (strlen($persons['doopdatum']) > 0 ? $persons['doopdatum'] : '?');
		        print("<a href=\"persoon.php?kaart={$persons['id']}&lang=$lang\">$naamlink</a> - {$msg['geboren']} ($geboren) - {$msg['gedoopt']} ($gedoopt)<br>");
		      }
		    }
		  }
		}
		?></div>
		</td>
		<td></td>
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
  require_once('footer.php');
?>