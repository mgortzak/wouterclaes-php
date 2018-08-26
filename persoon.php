<?
   require_once('header.php');

   function display_sex($sex, $language = array()) {
    if ($sex == 'M') {
      print ("<b>{$language['geslacht']}</b> {$language['man']}<br>");
    } else if ($sex == 'V') {
      print ("<b>{$language['geslacht']}</b> {$language['vrouw']}<br>");
    } else{
      print ("<b>{$language['geslacht']}</b> {$language['onbekend']}<br>");
    }
   }

   function display_information_person($lang1, $value1, $lang2, $value2) {
    if (strlen($value2) == 0 && strlen($value1) > 0) {
      print ("<b>$lang1</b> $value1<br>\n");
    } else if (strlen($value2) > 0 && strlen($value1) > 0) {
      print ("<b>$lang1</b> $value1 $lang2 $value2<br>");
    } else if (strlen($value2) > 0 && strlen($value1) == 0) {
      print ("<b>$lang1</b> $lang2 $value2<br>");
    }
   }

   function display_information_relation($key, $language, $date, $place) {
    switch($key) {
      case 'B': {
        print_information_relation($language, 'buitenecht', $date, $place);
        break;
      }
      case 'N': {
        print_information_relation($language, 'onbekendrel', $date, $place);
        break;
      }
      case 'V': {
        print_information_relation($language, 'verloofd', $date, $place);
        break;
      }
      case 'H': {
        print_information_relation($language, 'huwelijk', $date, $place);
        break;
      }
      case 'O': {
        print_information_relation($language, 'ondertrouw', $date, $place);
        break;
      }
      case 'S': {
        print_information_relation($language, 'samenwonen', $date, $place);
        break;
      }
    }
   }

   function print_information_relation($language, $relation, $date, $place) {
    if(strlen($place) > 0) {
      print ("<b>$language[$relation]</b> $date {$language['plaats']} $place<br>");
    } else {
      print ("<b>$language[$relation]</b> $date<br>");
    }
   }

   function display_person_link($person, $desc, $lang, $read_only = false) {
      $naamlink = "{$person['voornaam']} {$person['voorvoegsel']} {$person['achternaam']}";

      if($person['id'] < 9999999 && !$read_only) {
         $desc = (strlen($desc) > 0 ? "<b>$desc</b> " : '');
         print("$desc<a href=\"persoon.php?kaart={$person['id']}&lang=$lang\">$naamlink</a>");
      } else {
         print("$desc$naamlink");
      }
   }

   print('<blockquote><div>');
if($tijd == 0) 
{
if($kaart > 0 && is_numeric($kaart) && $kaart != 9999999) {
  mysql_query('SET character_set_results=utf8', $db_resource);

  $select = "SELECT * FROM stamnr WHERE id = $kaart";
  $query = mysql_query($select) OR die(mysql_error());

  // loop thru the person
  while ($lijst = mysql_fetch_array($query)) {
    $naam_partner_1 = "{$lijst['voornaam']} {$lijst['voorvoegsel']} {$lijst['achternaam']}";
    print ("<h1>$naam_partner_1</h1>");

    // display the image of the person
    $photo_path = "images/persons/$kaart.jpg";
    if (file_exists($photo_path)) {
      print ("<p><img src =\"$photo_path\" alt=\"$naam_partner_1\" title=\"$naam_partner_1\"></p>");
    }

    // print the sex of the person
    display_sex($lijst['geslacht'], $msg);

    // print information of the person
    display_information_person($msg['geboren'], $lijst['geboortedatum'], $msg['plaats'], $lijst['geboorteplaats']);
    display_information_person($msg['gedoopt'], $lijst['doopdatum'], $msg['plaats'], $lijst['doopplaats']);
    display_information_person($msg['aangiftegeboorte'], $lijst['aangiftedatum'], $msg['plaats'], $lijst['aangifteplaats']);
    display_information_person($msg['overleden'], $lijst['overlijdingsdatum'], $msg['plaats'], $lijst['overlijdingsplaats']);
    display_information_person($msg['aangifteoverlijden'], $lijst['aangifteoverdatum'], $msg['plaats'], $lijst['aangifteoverplaats']);
    display_information_person($msg['begraven'], $lijst['begravendatum'], $msg['plaats'], $lijst['begravenplaats']);
    
    print('<br>');

    // get the relations of the person
    $select = "SELECT relatie FROM stamoud WHERE id = $kaart";
    $query = mysql_query($select) OR die(mysql_error());

    // loop thru the relations
    while ($oud = mysql_fetch_array($query)) {
      //get the parents of selected the relation
      $select = "SELECT vader,moeder FROM stamrel WHERE relatie = {$oud['relatie']}";
      $query = mysql_query($select) OR die(mysql_error());

      // loop thru the parents
      while ($ouders = mysql_fetch_array($query)) {
        // get the information of the father
        $select = "SELECT * FROM stamnr WHERE id = {$ouders['vader']}";
        $query = mysql_query($select) OR die(mysql_error());

        // loop thru the father
        while ($vader = mysql_fetch_array($query)) {
          if (strlen($vader['achternaam']) > 0) {
            display_person_link($vader, $msg['vader'], $lang);
          }
        } // end loop of the father

        // get the information of the mother
        $select = "SELECT * FROM stamnr WHERE id = {$ouders['moeder']}";
        $query = mysql_query($select) OR die(mysql_error());
        print"<br>";

        // loop thru the mother
        while ($moeder = mysql_fetch_array($query)) {
          if (strlen($moeder['achternaam']) > 0) {
            display_person_link($moeder, $msg['moeder'], $lang);
          }
        } // end loop of the mother
      } // end loop of the parents
    } // end loop of the relations
  } // end loop of the person

  // get the spouse(s)
  $moeke = array();
  $i = 0;
  $selectrelatie = "SELECT pers2, relatie FROM stamvlg WHERE pers1 = $kaart ORDER BY volgnummer";
  $queryrelatie = mysql_query($selectrelatie) OR die(mysql_error());
  $aantal = mysql_num_rows($queryrelatie);
   
  // count the number of relations and initialize some data
  while($rel = mysql_fetch_array($queryrelatie)) {
    $moeke[$i] = $rel['pers2'];
    $relatie[$i] = $rel['relatie'];
    $i++;
  }
   
  $j = 0;

  while ($j < $aantal) {
    $selectvrouw = "SELECT * FROM stamnr WHERE id= {$moeke[$j]}";
    $queryvrouw = mysql_query($selectvrouw) OR die(mysql_error());
    $vrouw = mysql_fetch_array($queryvrouw);
    $naam_partner_2 = "{$vrouw['voornaam']} {$vrouw['voorvoegsel']} {$vrouw['achternaam']}";

    $selrelatie = "SELECT *  FROM stamrel WHERE relatie = {$relatie[$j]}";
     
    $queryres = mysql_query($selrelatie) OR die(mysql_error());
    $deze = mysql_fetch_array($queryres);
     
    if ($aantal > 0) {
      print ("<h2>{$msg['relatie']}</h2>");
    }

    // print information about the relation
    display_information_relation($deze['reltype'], $msg, $deze['reldatum'], $deze['relplaats']);
    display_information_relation($deze['reltype2'], $msg, $deze['reldatum2'], $deze['relplaats2']);
    
    // display the image of the relation
    $photo_path = "images/relations/{$deze['relatie']}.jpg";
    if (file_exists($photo_path)) {
      print ("<p><img src =\"$photo_path\" alt=\"$naam_partner_1 & $naam_partner_2\" title=\"$naam_partner_1 & $naam_partner_2\"></p>");
    }
    
    // print the person link of the spouse, w/o a description
    print('<blockquote>'); // <blockquote> of the relation/children of spouse begins here
    print('<h2>');
    display_person_link($vrouw, '', $lang);
    print('</h2>');

    // print the sex of the spouse
    display_sex($vrouw['geslacht'], $msg);

    // print information of the spouse
    display_information_person($msg['geboren'], $vrouw['geboortedatum'], $msg['plaats'], $vrouw['geboorteplaats']);
    display_information_person($msg['gedoopt'], $vrouw['doopdatum'], $msg['plaats'], $vrouw['doopplaats']);
    display_information_person($msg['aangiftegeboorte'], $vrouw['aangiftedatum'], $msg['plaats'], $vrouw['aangifteplaats']);
    display_information_person($msg['overleden'], $vrouw['overlijdingsdatum'], $msg['plaats'], $vrouw['overlijdingsplaats']);
    display_information_person($msg['aangifteoverlijden'], $vrouw['aangifteoverdatum'], $msg['plaats'], $vrouw['aangifteoverplaats']);
    display_information_person($msg['begraven'], $vrouw['begravendatum'], $msg['plaats'], $vrouw['begravenplaats']);
    
    print('<br>');

    $select = "SELECT relatie FROM stamoud WHERE id = {$vrouw['id']}";
    $query = mysql_query($select) OR die(mysql_error());

    while ($oud = mysql_fetch_array($query)) {
      $select = "SELECT vader,moeder FROM stamrel WHERE relatie = {$oud['relatie']}";
      $query = mysql_query($select) OR die(mysql_error());

      while ($ouders = mysql_fetch_array($query)) {
        $select = "SELECT * FROM stamnr WHERE id = {$ouders['vader']}";
        $query = mysql_query($select) OR die(mysql_error());

        while ($vader = mysql_fetch_array($query)) {
          if ($vader['achternaam']<>"") {
            display_person_link($vader, $msg['vader'], $lang);
          }
        }

        $select = "SELECT * FROM stamnr WHERE id = {$ouders['moeder']}";
        $query = mysql_query($select) OR die(mysql_error());
        print"<br>";

        while ($moeder = mysql_fetch_array($query)) {
          if ($moeder['achternaam']<>"") {
            display_person_link($moeder, $msg['moeder'], $lang);
          }
        }
      }
    }

    // the children
    $teller = 0;
    $tel = 0;
    $test = array();

    $select = "SELECT id FROM stamoud WHERE relatie = {$deze['relatie']} ORDER BY volgnummer";
    $query = mysql_query($select) OR die(mysql_error());
    $telkinderen = mysql_num_rows ($query);
    while($kind = mysql_fetch_array($query)) {
      $test[$teller] = $kind['id'];
      $teller++;
    }
     
    if ($telkinderen > 0) {
      print "<h3>{$msg['kind']}</h3>";
    }

    print('<blockquote>'); // <blockquote> of the children begins here
    // loop thru the children
    while ($tel < $teller) {            
      $select = "SELECT * FROM stamnr WHERE id = $test[$tel]";
      $query = mysql_query($select) OR die(mysql_error());
      $kroost = mysql_fetch_array($query);
      $tel++;
      
      $selectkrelatie = "SELECT pers2, relatie FROM stamvlg WHERE pers1 = {$kroost['id']} ORDER BY volgnummer";
      $querykrelatie = mysql_query($selectkrelatie) OR die(mysql_error());
      $kaantal = mysql_num_rows($querykrelatie);

      // print the link of the child, w/o a description
      print('<h3>');
      if($kaantal > 0) {
        display_person_link($kroost, '', $lang);
      } else {
        display_person_link($kroost, '', $lang, true);
      }
      print('</h3>');
      
      // print the sex of the child
      display_sex($kroost['geslacht'], $msg);

      // print information of the child
      display_information_person($msg['geboren'], $kroost['geboortedatum'], $msg['plaats'], $kroost['geboorteplaats']);
      display_information_person($msg['gedoopt'], $kroost['doopdatum'], $msg['plaats'], $kroost['doopplaats']);
      display_information_person($msg['aangiftegeboorte'], $kroost['aangiftedatum'], $msg['plaats'], $kroost['aangifteplaats']);
      display_information_person($msg['overleden'], $kroost['overlijdingsdatum'], $msg['plaats'], $kroost['overlijdingsplaats']);
      display_information_person($msg['aangifteoverlijden'], $kroost['aangifteoverdatum'], $msg['plaats'], $kroost['aangifteoverplaats']);
      display_information_person($msg['begraven'], $kroost['begravendatum'], $msg['plaats'], $kroost['begravenplaats']);

      //kindrelatie
      $kmoeke = array();
      $k = 0;
       
      while($krel = mysql_fetch_array($querykrelatie)) {
        $kmoeke[$k] = $krel['pers2'];
        $krelatie[$k] = $krel['relatie'];
        $k++;
      }
       
      $l = 0;

      // loop thru the children relations
      while ($l < $kaantal) {
        $selectkvrouw = "SELECT * FROM stamnr WHERE id = $kmoeke[$l]";
        $querykvrouw = mysql_query($selectkvrouw) OR die(mysql_error());
        $kvrouw = mysql_fetch_array($querykvrouw);

        $selkrelatie = "SELECT * FROM stamrel WHERE relatie = $krelatie[$l]";
         
        $querykres = mysql_query($selkrelatie) OR die(mysql_error());
        $kdeze = mysql_fetch_array($querykres);
         
        if ($kaantal > 0) {
          print("<h4>{$msg['relatie']}</h4>");
        }
        print('<blockquote>'); // <blockquote> of the childs relation begins here
        
        display_information_relation($kdeze['reltype'], $msg, $kdeze['reldatum'], $kdeze['relplaats']);
        display_information_relation($kdeze['reltype2'], $msg, $kdeze['reldatum2'], $kdeze['relplaats2']);

        // print the link of the child's spouse, w/o a description
        print('<blockquote>'); // <blockquote> of the childs spouse begins here
        print('<h4>');
        display_person_link($kvrouw, '', $lang);
        print('</h4>');
        print('</blockquote>'); // <blockquote> of the childs spouse ends here        
        
        $l++;
        print('</blockquote>'); // <blockquote> of the childs relation begins here
      } // end children relations
    } // end of the children
    $j++;
    print('</blockquote>'); // <blockquote> of the children ends here
    print('</blockquote>'); // <blockquote> of the relation/children of spouse ends here
  }
  //einde relaties
}
}
else
{
   print("De site wordt bijgewerkt, probeer het over $tijd minuten nog eens.<br/>");
   print('Sorry voor het ongemak.');
}
   print('</div></blockquote>');

   require_once('footer.php');
?>