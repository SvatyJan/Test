<?php

$barva = "#5050FF";

echo "<p class='nazev-kolekce' style='color:$barva;'>Wizzard Standard<p>";
echo "<table class='library2'>";
echo "<tr>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=passive&spellname=Novice Rune&icon=shiv.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Novice Rune (Passive)</p>";
echo "<p class='popisek-kouzla'>your spells ignore 5 + 2 per level <strong>Magic Resistance</strong> <br> (max 65)</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=ultimate&spellname=Smite&icon=smite.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/smite.png);'></div>";
echo "<p class='nazev-kouzla'>Smite (Ultimate)</p>";
echo "<p class='popisek-kouzla'>Smite an enemy for 60 + 100% <strong>Intelligence</strong></p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Firebolt&icon=shiv.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Firebolt</p>";
echo "<p class='popisek-kouzla'>deal 70 + 75% <strong>Intelligence</strong> <br> and burn enemy for 10 damage per round <br> for 1 + (1 per 100 <strong>Intelligence</strong>) rounds</p>";
echo "</td></a>";

echo "</tr>";
echo "<tr>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Magic Explosion&icon=shiv.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Magic Explosion</p>";
echo "<p class='popisek-kouzla'>deal 5 + 40% <strong>Intelligence</strong> damage to all enemies <br> and heal all your allies for 15 + 45 % <strong>Intelligence</strong> </p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Cold Blast&icon=shiv.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Cold Blast</p>";
echo "<p class='popisek-kouzla'>deal 50 + 70 % <strong>Intelligence</strong> damage to the target <br> and 20 + 30 % <strong>Intelligence</strong> to enemy <br> above and below the target.</p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Overload&icon=overload.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/overload.png);'></div>";
echo "<p class='nazev-kouzla'>Overload</p>";
echo "<p class='popisek-kouzla'>Throw unstable bolt on enemy 10 base dmg + 100% <strong>Intelligence</strong></p>";
echo "</td></a>";

echo "</tr>";
echo "<tr>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Refreshing Nova&icon=shiv.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Refreshing Nova</p>";
echo "<p class='popisek-kouzla'>heal all your allies for 30 + 75 % <strong>Intelligence</strong></p>";
echo "</td></a>";

echo "<td style='background-color:$barva;'> <a class='barva-textu-kouzla' href='equipspell.php?position=any&spellname=Freeze&icon=shiv.png'>";
echo "<div class='obrazek-kouzla' style='background-image:url(img/spells/armor-punch.png);'></div>";
echo "<p class='nazev-kouzla'>Freeze</p>";
echo "<p class='popisek-kouzla'>freeze the target for 1 + 1 per 100 <strong>Intelligence</strong> rounds <br> and deal 20 damage + 5 % <strong>Intelligence</strong></p>";
echo "</td></a>";

echo "</tr>";

echo "</table>";

?>