<?php
  require_once('config.php');
  require_once('images/persons/9999999.jpg');
  
  $kaart = (isset($_GET['kaart']) ? mysql_real_escape_string($_GET['kaart']) : 0);
  $keuze = (isset($_GET['keuze']) ? mysql_real_escape_string($_GET['keuze']) : '');      
  $achternaam = (isset($_GET['achternaam']) ? mysql_real_escape_string($_GET['achternaam']) : '');
  $lang = (isset($_GET['lang']) ? mysql_real_escape_string($_GET['lang']) : 'nl');

  switch ($lang) {
    case 'en': {
      require_once('php/languages/en.php');
      break;
    }
    case 'de': {
      require_once('php/languages/de.php');
      break;
    }
    default: {
      require_once('php/languages/nl.php');
      break;
    }
  } 

	$aantal = 0;
	if (file_exists('STMNR.SQL')) 
	{
		$aantal = $aantal + 1;
	}
	
	if (file_exists('STMOUD.SQL')) 
	{
		$aantal = $aantal + 1;
	} 
	
	if (file_exists('STMREL.SQL')) 
	{
		$aantal = $aantal + 1;
	} 
	
	if (file_exists('STMVLG.SQL')) 
	{
		$aantal = $aantal + 1;
	} 
	
	$tijd = 0;
	if($aantal > 0 && file_exists('UPDATE.WC'))
	{
		$tijd = 15 * $aantal;
	}  
?>
<html>
<head>
<meta name="description" content="Genealogie site met onder andere uitgebreide kwartierstaten van de families Doup, Horlings, van den Hout, de Jong, Klamer, Klok, van Leliveld, Mol, Schep, van der Schoot, Sonneveld & Wijnmaalen">
<meta name="author" content="Mark Gortzak">
<meta http-equiv="content-language" content="<?=$lang?>">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="content-script-type" content="text/javascript">
<link rel="shortcut icon" href="<?=$root_dir?>/images/favicon.ico">
<link type="text/css" href="<?=$root_dir?>/css/main.css" rel="stylesheet" />
<title>Wouter Claes Genealogie</title>
</head>
<?php
  $begin_time = microtime(true);
?>
<body>

<table>
	<tr>
		<td class="header"><a href="<?=$root_dir?>/index.php?lang=<?=$lang?>"><?=$msg['header_home'];?></a></td>
		<td class="header"><a href="<?=$root_dir?>/genealogie.php?lang=<?=$lang?>"><?=$msg['header_pedigree'];?></a></td>
		<td class="header"><a href="<?=$root_dir?>/statistieken.php?lang=<?=$lang?>"><?=$msg['header_statistics'];?></a></td>
		<td class="header"><a href="<?=$root_dir?>/uitvoer.php?lang=<?=$lang?>"><?=$msg['header_search'];?></a></td>
		<td class="header"><a href="<?=$root_dir?>/links.php?lang=<?=$lang?>"><?=$msg['header_links'];?></a></td>
    	<td class="header"><a href="<?=$root_dir?>/contact.php?lang=<?=$lang?>"><?=$msg['header_email']?></a></td>
    	<td class="header"><a href="<?=$root_dir?>/opsporing.php?lang=<?=$lang?>"><?=$msg['header_opsporing']?></a></td>	
    	<td class="header"><a href="<?=$root_dir?>/brongegevens.php?lang=<?=$lang?>"><?=$msg['header_brongegevens']?></a></td>				
	</tr>
</table>

<?php 
  require_once('php/languages/language.php');
?>
