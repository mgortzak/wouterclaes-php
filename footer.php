<?php   
  $end_time = microtime(true);
  $total_time = $end_time - $begin_time;  
  // a bit of a hack, but a few lost millisecond don't matter here
  $duration = number_format($total_time, 4, '.', ',');
?>

<table>
  <tr> 
    <td class="footer">&copy;2009/<?php echo date("Y"); ?> Hans Mol & Mark Gortzak</td>
  </tr>
  
  <tr>
    <td class="footer"><?="{$msg['load_time']} $duration {$msg['seconds']}"?></td>
  </tr>
</table>

</body>
</html>