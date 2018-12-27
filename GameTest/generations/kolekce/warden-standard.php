<?php

$barva = "#00AA00";

echo "<p class='nazev-kolekce' style='color:$barva;'>Warden Standard<p>";
echo "<table class='library2'>";
echo "<tr>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=passive&spellname=Double Strike&icon=armor-punch.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Double Strike (Passive)</p>";
echo "<p class='popisek-kouzla'>Every second <strong>Auto Attack</strong> deal double damage <br> need Weapon Equipped</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=ultimate&spellname=Mimic&icon=armor-punch.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Mimic (Ultimate)</p>";
echo "<p class='popisek-kouzla'>summon copy of yourself <br> all your actions are twice <br> for 1 round per 100 <strong>Agility</strong></p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Fan of Knives&icon=armor-punch.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Fan of Knives</p>";
echo "<p class='popisek-kouzla'>throw knives on enemy team dealing <br> 20 + 65% <strong>Agility</strong> to all enemies</p>";
echo "</td></a>";

echo "</tr>";
echo "<tr>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Shiv&icon=shiv.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/shiv.png);'></div>";
echo "<p class='nazev-kouzla'>Shiv</p>";
echo "<p class='popisek-kouzla'>deal 30 + 100% <strong>Agility</strong> <br> to the target and ignore target's armor (max 30)</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Counter&icon=armor-punch.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Counter</p>";
echo "<p class='popisek-kouzla'>next round turn enemy spells against them <br> (must have 50 <strong>Agility</strong>)</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Swing&icon=armor-punch.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Swing</p>";
echo "<p class='popisek-kouzla'>swing your melee weapon dealing <br> 70 % <strong>Weapon Damage</strong> + 40 % <strong>Agility</strong> <br> and 10 % <strong>Strength</strong> to the target</p>";
echo "</td></a>";

echo "</tr>";
echo "<tr>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Pickpocket&icon=armor-punch.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Pickpocket</p>";
echo "<p class='popisek-kouzla'>steal 10 gold + 3 per <strong>level</strong> <br> (max 100 gold)</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Steady Shot&icon=armor-punch.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Steady Shot</p>";
echo "<p class='popisek-kouzla'>deal 80 % <strong>Weapon Damage</strong> + 65% <strong>Agility</strong></p>";
echo "</td></a>";

echo "</tr>";

echo "</table>";

?>