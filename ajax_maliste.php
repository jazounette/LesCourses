<?php
   require "loginIdent.php";
   $quékette = "select * from courses_liste ";
   $quékette .= "join courses_prods ";
   $quékette .= "where courses_liste.id_prod = courses_prods.id_prod ";
   $quékette .= "order by courses_prods.zone, courses_prods.describ;";
   $req = $db->query($quékette);
   // $req = $db->query("select * from courses_liste join courses_prods where courses_liste.id_prod = courses_prods.id_prod order by courses_prods.zone;");
   $rep = $req->fetchAll(PDO::FETCH_ASSOC);
   $nompro = array(" Bidules", " Machins", " Trucs", " Articles");
   $nomrnd = rand(0, 3);
   $somprx = 0;

   // echo "<pre>"; print_r ($rep); echo "/<pre>";
   if ($rep) {
      echo "<table>";
      foreach ($rep as $val) {
         $somprx += $val["prix"];
         echo '<tr>';
         echo "<td>" . $val["id_list"] . "</td>";
         echo "<td>" . $val["id_prod"] . "</td>";
         $euro = (isset($val["prix"])) ? "€" : "-";
         echo "<td>" . $val["zone"] . "</td>";
         echo "<td>" . $val["describ"] . "</td>";
         echo "<td class='prix'>" . $val["prix"] . $euro . "</td>";
         echo "<td><button onclick='mafemmesap(" . $val["id_list"] . ")'>DEL</button></td>";
         echo "</tr>";
      }
      echo "<tr><td colspan='4' style='text-align:right'>Total=" . $somprx . "€</td></tr>";
      echo "<tr><td colspan='4' style='text-align:right'>" . $req->rowCount() . $nompro[$nomrnd] . "</td></tr>";
      echo "</table>";
   } else {
      echo "c'est vide est froid";
   }