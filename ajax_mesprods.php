<?php
   require "loginIdent.php";
   $quékette = "select * from courses_prods ";
   $quékette .= "join courses_zones ";
   $quékette .= "where courses_prods.zone = courses_zones.id_zone ";
   $quékette .= "order by zone, describ;";
   $req = $db->query($quékette);
   $rep = $req->fetchAll(PDO::FETCH_ASSOC);

   if ($rep) {
      echo "<table id='tableprods' class='tableprods'>";
      $toto = 0;
      $ligne = 0;
      $feuvert = TRUE;
      foreach ($rep as $val) {
         if ($toto < $val["zone"]) {
            $toto = $val["zone"];
            echo "<tr class='prodtitre' onclick='ouverture(" . $val["zone"] . ")'>";
            echo "<td colspan='5'>";
            echo "<span class='colprod' style='background-color: #" . $val["coulbck"] . "; color:#" . $val["coultxt"] . "'>" . $val["nom_zone"];
            echo "</span></td></tr>";
            $ligne++;
            $feuvert = ($val["zone"] == $_GET["titrouvert"]) ? TRUE : FALSE;
         }
         if ($feuvert) {
            if (isset($val["prix"])) { $euro = "€"; $laclasse = "prix"; }
               else { $euro = "-"; $laclasse = "pasprix"; }
            echo '<tr class="prodligne">';
            echo "<td>" . $val["describ"] . "</td>";
            echo "<td class='" . $laclasse . "'>" . $val["prix"] . $euro . "</td>";
            echo "<td class='tdbout'><button onclick='lesroidugag(" . $val["id_prod"] . ")'>✘</button></td>";//bouton effacer un produits
            echo "<td class='tdbout'><button onclick='pour100briq(" . $val["id_prod"] . ", " . $val["zone"] . ", " . $ligne . ")'>ÉDiT</button></td>";//bouton éditer un produits
            echo "<td class='tdbout'><button onclick='yarienàvoir(" . $val["id_prod"] . ")'>ADD</button></td>";//bouton ajouter un article à la liste de course
            echo "<td class='debug'>" . $val["id_prod"] . "</td>";
            echo "</tr>";
            $ligne++;
         }
      }
      echo "</table>";
   } else {
      echo "c'est vide est froid";
   }