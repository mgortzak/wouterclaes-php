<?php
require_once('header.php');
?>

<table>
	<tr>
		<td></td>
		<td width="<?=$width;?>">
		<h2>Opsporing verzocht</h2>

		<div class="brongegevens">
		<pre>
		<?php include_once('opsporing.txt'); ?>
		</pre>
		</div>
		
		<div class="text">
		<p>		
		Bij eventuele beantwoording kunt u gebruik maken van ons <a href="mailto:info@wouterclaes.nl?subject=Bestellen brongegevens">e-mailadres</a>.
		</p>		
		</div>
		
		</td>
		<td></td>
	</tr>
</table>
<?php
require_once('footer.php');
?>