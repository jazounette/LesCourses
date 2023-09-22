<?php
   if ($_GET["faire"] == "version") {  echo "PHP Ver: " . phpversion();  }

   if ($_GET["faire"] == "soumiss") {///////////////crée le clavier des touches des zones
      require "loginIdent.php";
      $req = $db->query("select * from courses_zones order by id_zone;");
      $rep = $req->fetchAll(PDO::FETCH_ASSOC);

      $i=0;
      $divsoum = '<table class="tablesoumi"><tr>'; // la liste des boutons sumit du formulaire ajout d'article
      $divmoud = '<table class="suppzone">';// la liste des zones avec le bonton éffacer dans la zone édition de zone
      $tdzones = '<td colspan="5">'; // contient la liste des zones sous forme de bouton radio
      foreach ($rep as $val) {
         $divsoum .= '<td><input title="' . $val["id_zone"] . '" class="btnsoumi" type="submit" ';
         $divsoum .= 'value="' . $val["nom_zone"] . '" onclick="soumettre(' . $val["id_zone"] . ')"></td>';
         $i++;
         if ($i%3 == 0) { $divsoum .= "</tr><tr>"; }

         $divmoud .= '<tr><td style="background-color:#' . $val["coulbck"] . '; color:#' . $val["coultxt"] . '">' . $val["id_zone"] . '</td>';
         $divmoud .= '<td onclick="laCarapate(' . $val["id_zone"] . ', \'' . $val["nom_zone"] . '\', \'' . $val["coulbck"] . '\', \'' . $val["coultxt"] . '\')">' . $val["nom_zone"] . '</td>';
         $divmoud .= '<td><button onclick="pellerevien(' . $val["id_zone"] . ')">✖</button></td></tr>';

         $tdzones .= '<div onclick="surligne()">';
         $tdzones .= '<input type="radio" name="zone" id="zone' . $val["id_zone"] . '" value="' . $val["id_zone"] . '">';
         $tdzones .= '<label for="zone' . $val["id_zone"] . '">' . $val["nom_zone"] . '</label></div>';
      }
      $divsoum .= "<td><input title='ajoute/supprime des zones' type='button' class='btnsoumi' onclick='taplusrien()' value='...'></td>";
      $divsoum .= "</tr></table><br>";
      $divsoum .= "<div class='surligne' style='padding-bottom: 3px'><input type='checkbox' id='ajoutauto' checked>";
      $divsoum .= "<label for='ajoutauto'>Ajoute en même temps à la liste de courses.</label></div>";

      $divmoud .= "</table>";
      $tdzones .= "</td>";
      $retournage = array("amandine"=>$divsoum, "clémentine"=>$divmoud, "orangine"=>$tdzones);
      echo json_encode($retournage);
   }

   if ($_GET["faire"] == "suplist") {
      require "loginIdent.php";
      $req = $db->query("truncate table courses_liste;");
   }
