<?php
   require "loginIdent.php";
   // $quékette = "select * from courses_liste ";
   // $quékette .= "join courses_prods ";
   // $quékette .= "where courses_liste.id_prod = courses_prods.id_prod ";
   // $quékette .= "order by courses_prods.zone, courses_prods.describ;";

   $quékette = "select id_list, describ, prix, couleur from courses_liste ";
   $quékette .= "join courses_prods ";
   $quékette .= "on courses_liste.id_prod = courses_prods.id_prod ";
   $quékette .= "join courses_zones ";
   $quékette .= "on courses_prods.zone = courses_zones.id_zone ";
   $quékette .= "order by courses_prods.zone, courses_prods.describ;";

   $req = $db->query($quékette);
   $rep = $req->fetchAll(PDO::FETCH_ASSOC);

   $nompro = array(" Bidules", " Machins", " Trucs", " Articles");
   $nomrnd = rand(0, 3);
   $somprx = 0;

   if ($rep) {
      echo "<table class='tableliste'>";
      foreach ($rep as $val) {
         $somprx += $val["prix"];
         echo '<tr>';
         // echo "<td class='debug'>" . $val["id_list"] . "</td>";
         // echo "<td class='debug'>" . $val["id_prod"] . "</td>";
         // echo "<td class='debug'>" . $val["zone"] . "</td>";
         echo "<td><div class='coliste' style='background-color: #" . $val["couleur"] . "'></div></td>";
         $euro = (isset($val["prix"])) ? "€" : "-";
         echo "<td><span>" . $val["describ"] . "</span></td>";
         echo "<td class='prix'>" . $val["prix"] . $euro . "</td>";
         echo "<td class='tdbout'><button onclick='mafemmesap(" . $val["id_list"] . ")'>DEL</button></td>";
         echo "</tr>";
      }
      echo "<tr><td colspan='3' style='text-align:right'>" . $req->rowCount() . $nompro[$nomrnd] . " / TOTAL=" . $somprx . "€</td><td></td></tr>";
      echo "</table>";
   } else {
      echo "<p>La liste de courses est vide</p>";
   }