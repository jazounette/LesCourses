<?php
   require "loginIdent.php";
   $quékette = "select * from courses_prods ";
   $quékette .= "join courses_zones ";
   $quékette .= "where courses_prods.zone = courses_zones.id_zone ";
   $quékette .= "order by zone, describ;";
   $req = $db->query($quékette);
   // $req = $db->query("select * from courses_prods join courses_zones where courses_prods.zone = courses_zones.id_zone order by zone;");
   //select * from courses_liste join courses_prods where courses_liste.id_prod = courses_prods.id_prod;
   $rep = $req->fetchAll(PDO::FETCH_ASSOC);

   if ($rep) {
      // echo "<pre>"; print_r ($rep); echo "/<pre>";
      // echo "titrouvert: " . $_GET["titrouvert"] . "<br>";
      echo "<table id='tableprods'>";
      $toto = 0;
      $ligne = 0;
      $titre = 1;
      $feuvert = TRUE;
      foreach ($rep as $val) {
         if ($toto < $val["zone"]) {
            $toto = $val["zone"];
            echo "<tr class='prodtitre' onclick='ouverture(" . $titre . ")'><td colspan='5'>" . $val["nom_zone"] . "</td></tr>";
            $ligne++;
            $feuvert = ($titre == $_GET["titrouvert"]) ? TRUE : FALSE;
            $titre++;
         }
         if ($feuvert) {
            $euro = (isset($val["prix"])) ? "€" : "-";
            echo '<tr>';
            // echo "<td>" . $val["id_zone"] . "</td>";
            // echo "<td>" . $val["zone"] . "</td>";
            echo "<td>" . $val["describ"] . "</td>";
            // echo "<td>" . $val["nom_zone"] . "</td>";
            echo "<td class='prix'>" . $val["prix"] . $euro . "</td>";
            echo "<td><button onclick='lesroidugag(" . $val["id_prod"] . ")'>DEL</button></td>";//bouton effacer un produits
            echo "<td><button onclick='pour100briq(" . $val["id_prod"] . ", " . $ligne . ")'>ÉDiT</button></td>";//bouton éditer un produits
            echo "<td><button onclick='yarienàvoir(" . $val["id_prod"] . ")'>ADD</button></td>";//bouton ajouter un article à la liste de course
            echo "<td>" . $val["id_prod"] . "</td>";
            echo "</tr>";
            $ligne++;
         }
      }
      echo "</table>";
   } else {
      echo "c'est vide est froid";
   }