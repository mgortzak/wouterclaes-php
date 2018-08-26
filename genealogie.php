<?php
  require_once ("header.php");
?>

<style type="text/css">

#ddimagetabs{
}

#ddimagetabs a{
display: block;
text-decoration: none;
font: bold 12px Arial; /*tab font */
color: #000000; /*font color */
width: 86px; /*width of tab image */
height: 22px; /*height of tab image */
float: left;
display: inline;
margin-left: 4px; /*spacing between tabs */
padding-top: 4px; /*vertical offset of tab text from top of tab*/
background-image:url(images/bluetab.jpg); /*URL to tab image */
background-repeat: no-repeat;
text-align: center;
}

#ddimagetabs a:hover, #ddimagetabs a.current{
background-image:url(images/bluetabover.jpg); /*URL to tab image onmouseover */
color: #000000;
}

#tabcontentcontainer{
<script language="JavaScript1.2">
<!--

/*
Screen Size Redirect script (By Robert @ http://members.tripod.com/technological_tinker/)
Submitted to Dynamicdrive.com to feature script in archive
For full source, usage terms, and 100's more DHTML scripts, visit http://dynamicdrive.com
*/


if (screen.width==800||screen.height==600) //if 800x600

width:800px; /*width of 2nd level content*/
else if (screen.width==640||screen.height==480) //if 640x480
width:640px; /*width of 2nd level content*/
else if (screen.width==1024||screen.height==768) //if 1024x768
width:1024px; /*width of 2nd level content*/
else if (screen.width==1280||screen.height==1024) //if 1024x768
width:1280px; /*width of 2nd level content*/
else //if all else
width:800px; /*width of 2nd level content*/ 

//-->
</script>

height:40px; /*height of 2nd level content. Set to largest's content height to avoid jittering.*/
}

.tabcontent{
display:none;
}

</style>

<script type="text/javascript">

/***********************************************
* DD Tab Menu II script- � Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

//Set tab to intially be selected when page loads:
//[which tab (1=first tab), ID of tab content to display]:
var initialtab=[1, "sc1"]

//Turn menu into single level image tabs (completely hides 2nd level)?
var turntosingle=0 //0 for no (default), 1 for yes

//Disable hyperlinks in 1st level tab images?
var disabletablinks=0 //0 for no (default), 1 for yes


////////Stop editting////////////////

var previoustab=""

if (turntosingle==1)
document.write('<style type="text/css">\n#tabcontentcontainer{display: none;}\n</style>')

function expandcontent(cid, aobject){
if (disabletablinks==1)
aobject.onclick=new Function("return false")
if (document.getElementById && turntosingle==0){
highlighttab(aobject)
if (previoustab!="")
document.getElementById(previoustab).style.display="none"
document.getElementById(cid).style.display="block"
previoustab=cid
}
}

function highlighttab(aobject){
if (typeof tabobjlinks=="undefined")
collectddimagetabs()
for (i=0; i<tabobjlinks.length; i++)
tabobjlinks[i].className=""
aobject.className="current"
}

function collectddimagetabs(){
var tabobj=document.getElementById("ddimagetabs")
tabobjlinks=tabobj.getElementsByTagName("A")
}

function do_onload(){
collectddimagetabs()
expandcontent(initialtab[1], tabobjlinks[initialtab[0]-1])
}

if (window.addEventListener)
window.addEventListener("load", do_onload, false)
else if (window.attachEvent)
window.attachEvent("onload", do_onload)
else if (document.getElementById)
window.onload=do_onload

</script>

<body>
<div id="ddimagetabs">
<a href="php/kwartierstaten/horlings.php" onMouseover="expandcontent('sc1', this)">Horlings</a>
<a href="php/kwartierstaten/vandenhout.php" onMouseover="expandcontent('sc2', this)">van den Hout</a>
<a href="php/kwartierstaten/dejong.php" onMouseover="expandcontent('sc3', this)">de Jong</a>
<a href="php/kwartierstaten/klamer.php" onMouseover="expandcontent('sc4', this)">Klamer</a>
<a href="php/kwartierstaten/klok.php" onMouseover="expandcontent('sc5', this)">Klok</a>
<a href="php/kwartierstaten/leliveld.php" onMouseover="expandcontent('sc6', this)">van Leliveld</a>
<a href="php/kwartierstaten/mol.php" onMouseover="expandcontent('sc7', this)">Mol</a>
<a href="php/kwartierstaten/schep.php" onMouseover="expandcontent('sc8', this)">Schep</a>
<a href="php/kwartierstaten/schoot.php" onMouseover="expandcontent('sc9', this)">van der Schoot</a>
<a href="php/kwartierstaten/sonnev.php" onMouseover="expandcontent('sc10', this)">Sonneveld</a>
<a href="php/kwartierstaten/wijnmaalen.php" onMouseover="expandcontent('sc11', this)">Wijnmaalen</a>
<a href="php/kwartierstaten/doup.php" onMouseover="expandcontent('sc12', this)">Doup</a>
<a href="php/kwartierstaten/bernoster.php" onMouseover="expandcontent('sc13', this)">Bernoster</a>
<a href="php/kwartierstaten/winkelhuijzen.php" onMouseover="expandcontent('sc14', this)">Winkelhuijzen</a>
<a href="php/kwartierstaten/gortzak.php" onMouseover="expandcontent('sc15', this)">Gortzak</a>
<a href="php/kwartierstaten/hoeboer.php" onMouseover="expandcontent('sc16', this)">Hoeboer</a>
</div> <br style="clear:left" />

<DIV id="tabcontentcontainer">

<div id="sc1" class="tabcontent">
<center>
<br><br>
Kwartierstaat van<br><br>
<b>Fennechienna Horlings</b><br><br>
<img src="images/persons/209751.jpg"><br><br>
geboren 20 september 1920 te Oude Pekela<br>
overleden 13 september 1991 te Oude Pekela<br><br>
echtgenote van<br><br><b>Jan Klok</b><br><br>
<a href="php/kwartierstaten/horlings.php">Kwartierstaat</a>
</center><br>
</div>

<div id="sc2" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Jacobus Pieter van den Hout</b><br><br><img src="images/persons/123.jpg"><br><br>
      geboren 30 mei 1915 te Dordrecht<br>
      overleden 12 juni 1993 te Delft<br>
      <br>echtgenoot van<br><br>
      <b>Maria Caroline Doup</b><br>
      <br><a href="php/kwartierstaten/vandenhout.php">Kwartierstaat</a></center><br>
</div>

<div id="sc3" class="tabcontent">
<center><br><br>Kwartierstaat van<br><br><b>Cornelis de Jong</b><br><br><img src="images/persons/150.jpg"><br><br>geboren 6 februari 1912 te Dordrecht<br>overleden 30 september 1997 te Spijkkenisse<br><br>echtgenoot van<br><br><b>Hendrika Jannigje Schep</b><br><br><a href="php/kwartierstaten/dejong.php">Kwartierstaat</a></center><br>
</div>

<div id="sc4" class="tabcontent">
<center><br><br>Kwartierstaat van<br><br><b>Harmina Luchina Klamer</b><br><br><img src="images/persons/210552.jpg"><br><br>geboren 9 augustus 1927 te Wildervanksterdallen<br>overleden 5 maart 2005 te Stadskanaal<br><br>echtgenote van<br><br><b>Herman Jan Frederik van der Schoot</b><br><br><a href="php/kwartierstaten/klamer.php">Kwartierstaat</a></center><br>
</div>

<div id="sc5" class="tabcontent">
<center><br><br>Kwartierstaat van<br><br><b>Jan Klok</b><br><br><img src="images/persons/209752.jpg"><br><br>geboren 15 januari 1917 te Vlagtwedde<br>overleden 3 februari 1979 te Oude Pekela<br><br>echtgenoot van<br><br><b>Fennechiena Horlings</b><br><br><a href="php/kwartierstaten/klok.php">Kwartierstaat</a></center><br>
</div>

<div id="sc6" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Lamberta Geertruida van Leliveld</b><br><br><img src="images/persons/215.jpg"><br><br>geboren 20 april 1923 te Dordrecht<br>overleden 29 september 1991 te Stadskanaal<br><br>echtgenote van<br><br><b>Jacob Mol</b><br><br><a href="php/kwartierstaten/leliveld.php">Kwartierstaat</a></center><br>
</div>

<div id="sc7" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Jacob Mol</b><br><br><img src="images/persons/247.jpg"><br><br>geboren 13 augustus 1924 te 's Gravendeel<br>overleden 30 oktober 2000 te Oude Pekela<br><br>echtgenoot van<br><br><b>Lamberta Geertruida van Leliveld</b><br><br><a href="php/kwartierstaten/mol.php">Kwartierstaat</a></center><br>
</div>

<div id="sc8" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Hendrika Jannigje Schep</b><br><br><img src="images/persons/303.jpg"><br><br>geboren 16 december 1916 te Ameide<br>overleden 17 april 1988 te Rotterdam<br><br>echtgenote van<br><br><b>Cornelis de Jong</b><br><br><a href="php/kwartierstaten/schep.php">Kwartierstaat</a></center><br>
</div>

<div id="sc9" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Herman Jan Frederik van der Schoot</b><br><br><img src="images/persons/210551.jpg"><br><br>geboren 15 februari 1919 te Nieuw Buinen<br>overleden 27 mei 1960 te Nieuw Buinen<br><br>echtgenoot van<br><br><b>Harmina Luchina Kramer</b><br><br><a href="php/kwartierstaten/schoot.php">Kwartierstaat</a></center><br>
</div>

<div id="sc10" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Elsje Sonneveld</b><br><br><img src="images/persons/317.jpg"><br><br>geboren 24 februari 1933 te Rotterdam<br>overleden 5 oktober 1986 te Epe<br><br>echtgenote van<br><br><b>Jacobus van Leliveld</b><br><br><a href="php/kwartierstaten/sonnev.php">Kwartierstaat</a><br><br>foto Willem Sonneveld</center><br>
</div>

<div id="sc11" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Willem Wijnmaalen</b><br><br><img src="images/persons/373.jpg"><br><br>geboren 7 januari 1897 te Delft<br>overleden 9 september 1971 te 's Gravenhage<br><br>echtgenoot van<br><br><b>Rinkje Gijsbertha Lukas</b><br><br>en van<br><br><b>Johanna Menechiena Bruggemann</b><br><br><a href="php/kwartierstaten/wijnmaalen.php">Kwartierstaat</a></center><br>
</div>


<div id="sc12" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Maria Carolina Doup</b><br><br><img src="images/persons/58.jpg"><br><br>geboren 11 maart 1922 te Tegal<br>overleden 3 juli 1966 te 's Gravenhage<br><br>echtgenoot van<br><br><b>Jacobus Pieter van den Hout</b><br><br><a href="php/kwartierstaten/doup.php">Kwartierstaat</a></center><br>
</div>

<div id="sc13" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Alida Maria Engelina Bernoster</b><br><br><img src="images/persons/245640.jpg"><br><br>geboren 2 februari 1931 te Schiedam<br><br>echtgenote van<br><br><b>Wouter Franciscus Winkelhuijzen</b><br><br><a href="php/kwartierstaten/bernoster.php">Kwartierstaat</a></center><br>
</div>

<div id="sc14" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Wouter Franciscus Winkelhuijzen</b><br><br><img src="images/persons/245639.jpg"><br><br>geboren 22 februari 1925 te Rotterdam<br>overleden 9 februari 1989 te Spijkenisse<br><br>echtgenoot van<br><br><b>Alida Maria Engelina Bernoster</b><br><br><a href="php/kwartierstaten/winkelhuijzen.php">Kwartierstaat</a></center><br>
</div>

<div id="sc15" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Lambertus Willibrordus Gortzak</b><br><br>geboren 16 december 1930 te Roelofarendsveen<br>overleden 10 mei 1996 te Harderwijk<br><br>echtgenoot van<br><br><b>Elizabeth Maria Hoeboer</b><br><br><a href="php/kwartierstaten/gortzak.php">Kwartierstaat</a></center><br>
</div>

<div id="sc16" class="tabcontent">
<br><center>Kwartierstaat van<br><br><b>Elizabeth Maria Hoeboer</b><br><br>geboren 27 oktober 1933 te Hazerswoude Rijndijk<br>overleden 12 maart 2016 te Dordrecht<br><br>echtgenote van<br><br><b>Lambertus Willibrordus Gortzak</b><br><br><a href="php/kwartierstaten/hoeboer.php">Kwartierstaat</a></center><br>
</div>

</DIV>

<?php
require_once ("footer.php");
?>