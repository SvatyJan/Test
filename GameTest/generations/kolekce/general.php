<?php

$barva = "#FFFFFF";

echo "<p class='nazev-kolekce' style='color:$barva;'>General<p>";
echo "<table class='library2'>";
echo "<tr>";

echo "<td style='background-color:$barva;'><a href='equipspell.php?position=passive&spellname=Goldfinder&icon=Goldfinder.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/Goldfinder.png);'></div>";
echo "<p class='nazev-kouzla'>Goldfinder</p>";
echo "<p class='popisek-kouzla'>5% more gold</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'><a href='equipspell.php?position=passive&spellname=Tribe Mastery&icon=tribe-mastery.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/tribe-mastery.png);'></div>";
echo "<p class='nazev-kouzla'>Tribe Mastery</p>";
echo "<p class='popisek-kouzla'>7% more resources</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'><a href='equipspell.php?position=passive&spellname=Wings&icon=wings.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/wings.png);'></div>";
echo "<p class='nazev-kouzla'>Wings</p>";
echo "<p class='popisek-kouzla'>10% faster travelling</p>";
echo "</td></a>";

echo "</tr>";

echo "</table>";

?>