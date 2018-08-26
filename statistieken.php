<?php
  require_once('header.php');
  
  if($tijd == 0) 
  {
?>
<table>
	<tr>
		<td></td>
		<td width="<?=$width;?>">
		<h2><?=$msg['header_statistics'];?></h2>
		<div class="text"><?php
		print ($msg['database']);

		$select = "SELECT COUNT(*) AS FLD_SEX_COUNT FROM stamnr";
		$query = mysql_query($select) OR die(mysql_error());
		$result = mysql_fetch_array($query);
		$aantal = $result['FLD_SEX_COUNT'];
		print ("<br>{$msg['a_personen']} $aantal<br>");

		$select = "SELECT COUNT(*) AS FLD_SEX_COUNT_MALE FROM stamnr WHERE UPPER(GESLACHT) = 'M'";
		$query = mysql_query($select) OR die(mysql_error());
		$result = mysql_fetch_array($query);
		$bantal = $result['FLD_SEX_COUNT_MALE'];
		$man = ($aantal > 0 ? ($bantal / $aantal) * 100 : 0);
		$pman = substr($man, 0, 4);
		print $msg['a_mannen']. $bantal ." (". $pman. "%) <br>";

		$select = "SELECT COUNT(*) AS FLD_SEX_COUNT_FEMALE FROM stamnr WHERE UPPER(GESLACHT) = 'V'";
		$query = mysql_query($select) OR die(mysql_error());
		$result = mysql_fetch_array($query);
		$cantal = $result['FLD_SEX_COUNT_FEMALE'];
		$vrouw = ($aantal > 0 ? ($cantal / $aantal) * 100 : 0);
		$pvrouw= substr($vrouw, 0, 4);
		print $msg['a_vrouwen']. $cantal ." (". $pvrouw ."%) <br>";

		$select = "SELECT COUNT(*) AS FLD_SEX_COUNT_NONE FROM stamnr WHERE UPPER(GESLACHT) = 'O'";
		$query = mysql_query($select) OR die(mysql_error());
		$result = mysql_fetch_array($query);
		$dantal = $result['FLD_SEX_COUNT_NONE'];
		$onz = ($aantal > 0 ? ($dantal / $aantal) * 100 : 0);
		$ponz= substr($onz, 0, 4);
		print $msg['a_onbekend']. $dantal ." (". $ponz ."%)<br>";

		$select = "SELECT COUNT(*) AS FLD_COUNT_RELATIONS FROM stamrel";
		$query = mysql_query($select) OR die(mysql_error());
		$result = mysql_fetch_array($query);
		$aantal_relaties = $result['FLD_COUNT_RELATIONS'];
		print $msg['a_relaties'].$aantal_relaties."<br>";

		$select = "SELECT COUNT(DISTINCT(ACHTERNAAM)) AS FLD_COUNT_UNIQUE_LAST_NAMES FROM stamnr";
		$query = mysql_query($select) OR die(mysql_error());
		$result = mysql_fetch_array($query);
		$aantal_unique = $result['FLD_COUNT_UNIQUE_LAST_NAMES'];
		print $msg['a_achternaam'].$aantal_unique."<br>";
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