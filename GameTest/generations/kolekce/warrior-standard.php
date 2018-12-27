<?php

$barva = "#FF0000";

echo "<p class='nazev-kolekce' style='color:$barva;'>Warrior Standard<p>";
echo "<table class='library2'>";
echo "<tr>";

/* DISABLE
  pointer-events: none;
  cursor: default;
  text-decoration: none;
  color: black;
  background-color:grey;
  */

echo "<td style='background-color:$barva;'><a class='barva-textu-kouzla' href='equipspell.php?position=passive&spellname=Armor Breaker&icon=armor-punch.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Armor Breaker (Passive)</p>";
echo "<p class='popisek-kouzla'>ignores 1 armor per level (max 30)</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'><a class='barva-textu-kouzla' href='equipspell.php?position=ultimate&spellname=Heroic Finish&icon=decapitation.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/decapitation.png);'></div>";
echo "<p class='nazev-kouzla'>Heroic Finish (Ultimate)</p>";
echo "<p class='popisek-kouzla'>Deals 50% weapon dmg + 100 + 60% <strong>Strength</strong> <br>(Need Melee Weapon)</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'><a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Combat Shout&icon=shouting.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/shouting.png);'></div>";
echo "<p class='nazev-kouzla'>Combat Shout</p>";
echo "<p class='popisek-kouzla'>Buffs you and your team for 5 + 1 per lvl <strong>Strength</strong> </p>";
echo "</td></a>";

echo "</tr>";
echo "<tr>";

echo "<td style='background-color:$barva;'><a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Destructive Strike&icon=sword-break.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/sword-break.png);'></div>";
echo "<p class='nazev-kouzla'>Destructive Strike</p>";
echo "<p class='popisek-kouzla'>Deals 80 + 100% <strong>Strength</strong> to your <strong>Target</strong></p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'><a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Cleave&icon=amputation.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/amputation.png);'></div>";
echo "<p class='nazev-kouzla'>Cleave</p>";
echo "<p class='popisek-kouzla'>Deals 30 + 50% <strong>Strength</strong> to the target and 30 + 50% <strong>Strength</strong> to one target above or below</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'><a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Leap&icon=running-ninja.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/running-ninja.png);'></div>";
echo "<p class='nazev-kouzla'>Leap</p>";
echo "<p class='popisek-kouzla'>Deal 30  + 75 % <strong>Strength</strong> to the target above and below</p>";
echo "</td></a>";

echo "</tr>";
echo "<tr>";

echo "<td style='background-color:$barva;'><a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Bloodthirst&icon=chopped-skull.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/chopped-skull.png);'></div>";
echo "<p class='nazev-kouzla'>Bloodthirst</p>";
echo "<p class='popisek-kouzla'>deal 80 dmg + 25% <strong>Strength</strong> <br> and heal yourself for 40 + 30 % <strong>Strength</strong></p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'><a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Rend&icon=cut-palm.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/cut-palm.png);'></div>";
echo "<p class='nazev-kouzla'>Rend</p>";
echo "<p class='popisek-kouzla'>Hit your target for 45 dmg <br> and deal 20 + 50 % <strong>Strength</strong> every round for 3 rounds</p>";
echo "</td></a>";

echo "</tr>";

echo "</table>";

?>