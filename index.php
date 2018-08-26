<?php
  require_once('header.php');
  
  if($tijd == 0) 
  {
?>
<table>
  <tr>
    <td>&nbsp;</td>
    <td width="<?=$width;?>"> 
      <h1><?=$msg['welkom'];?> Wouter Claes</h1>
    </td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td width="<?=$width;?>">
      <div class="text">
          <?=$msg['intro'];?><br>
          <p>
		  Alida Maria Engelina Bernoster<br>
		  Maria Carolina Doup<br>
		  Lambertus Willibrordus Gortzak<br>
		  Elizabeth Maria Hoeboer<br>
          Fennechienna Horlings<br>
          Jacobus van den Hout<br>
          Cornelis de Jong<br>
          Harmina Luchina Klamer<br>
          Jan Klok<br>
          Lamberta Geertruida van Leliveld<br>
          Jacob Mol<br>
          Hendrika Jannigje Schep<br>
          Herman Jan Frederik van der Schoot<br>
          Elsje Sonneveld<br>
          Willem Wijnmaalen<br>
		  Wouter Franciscus Winkelhuijzen<br>
			<br>
		  en brongegevens van:<br>
              <br>
		 's Gravendeel, Abbenes, Alkemade,<br>
		 Bennekom, Bleskensgraaf, De Kaag,<br>
		 De Mijl, Krabbe en Nadort,<br>
		 Ede, Gelders Veenendaal,<br>
		 Hoogblokland, Hoornaar,<br>
		 Laagblokland, Lunteren, Nieuwe Wetering,<br>
		 Noordeloos, Otterlo, Oud Ade, Oude Wetering,<br>
		 Rijpwetering, Roelofarendsveen,<br>
		 Sandelingen Ambacht, Wageningen,<br>
		 Wieldrecht, Zevenhoven, Zwijndrecht.<br>
		  </p>
      </div>
    </td> 
    <td>&nbsp;</td> 
  </tr>
  
  <tr><td colspan="3">&nbsp;</td></tr>
  
  <tr>
    <td>&nbsp;</td>
    <td width="<?=$width;?>" class="updated"><?=$msg['update'];?> <?=$last_updated;?></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr><td colspan="3">&nbsp;</td></tr>
  
  <tr>
    <td>&nbsp;</td>
    <td width="<?=$width;?>" class="disclaimer"><?=$msg['bepaling'];?></td>
    <td>&nbsp;</td>
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