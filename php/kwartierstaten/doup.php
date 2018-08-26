<?php
require_once('../../header.php');
?>
<script type="text/javascript" language="javascript" src="../../js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
  // Reset Font Size
  var originalFontSize = $('html').css('font-size');
  $(".resetFont").click(function(){
  $('html').css('font-size', originalFontSize);
  });
  // Increase Font Size
  $(".increaseFont").click(function(){
    var currentFontSize = $('html').css('font-size');
  var currentFontSizeNum = parseFloat(currentFontSize, 10);
    var newFontSize = currentFontSizeNum*1.2;
  $('html').css('font-size', newFontSize);
  return false;
  });
  // Decrease Font Size
  $(".decreaseFont").click(function(){
    var currentFontSize = $('html').css('font-size');
  var currentFontSizeNum = parseFloat(currentFontSize, 10);
    var newFontSize = currentFontSizeNum*0.8;
  $('html').css('font-size', newFontSize);
  return false;
  });
});
</script>

<a href="#" class="increaseFont"><?=$msg['pedigree_bigger_font'];?></a> - <a href="#" class="decreaseFont"><?=$msg['pedigree_smaller_font'];?></a> - <a href="#" class="resetFont"><?=$msg['pedigree_reset_font'];?></a>
<pre>
<?php 
require_once('../../html/kwartierstaten/DOUP.TXT');
?>
</pre>
<?php
require_once('../../footer.php');
?>