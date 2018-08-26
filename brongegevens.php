<?php
require_once('header.php');
?>

<table>
	<tr>
		<td></td>
		<td width="<?=$width;?>">
		<h2>Bestellingen brongegevens</h2>

		<div class="brongegevens">
		<pre>
		<?php include_once('brongegevens.txt'); ?>
		</pre>
		</div>
		
		<div class="text">
		<p>		
		Voor meer informatie aangaande brongegevens kunt u ons <a href="mailto:info@wouterclaes.nl?subject=Bestellen brongegevens">e-mailen</a>.
		</p>		
		</div>
		
		</td>
		<td></td>
	</tr>
</table>
<?php
require_once('footer.php');
?>