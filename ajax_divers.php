<?php
   if ($_GET["faire"] == "version") {  echo "PHP Ver: " . phpversion();  }

   if ($_GET["faire"] == "soumiss") {///////////////crée le clavier des touches des zones
      require "loginIdent.php";
      $req = $db->query("select * from courses_zones order by id_zone;");
      $rep = $req->fetchAll(PDO::FETCH_ASSOC);

      $i=0;
      $divsoum = '<table class="tablesoumi"><tr>';
      $divmoud = '<table>';
      foreach ($rep as $val) {
         $divsoum .= '<td>';
         $divsoum .= '<input title="' . $val["id_zone"] . '" class="btnsoumi" type="submit" value="' . $val["nom_zone"] . '" onclick="soumettre(' . $val["id_zone"] . ')">';
         $divsoum .= "</td>";
         $i++;
         if ($i%3 == 0) { $divsoum .= "</tr><tr>"; }

         $divmoud .= '<tr><td>' . $val["id_zone"] . '</td>';
         $divmoud .= '<td>' . $val["nom_zone"] . '</td>';
         $divmoud .= '<td><button onclick="pellerevien(' . $val["id_zone"] . ')">DEL</button></td></tr>';
      }
      $divsoum .= "<td><input title='ajoute/supprime des zones' type='button' class='btnsoumi' onclick='taplusrien()' value='...'></td>";
      $divsoum .= "</tr></table>";
      $divmoud .= "</table>";
      $retournage = array("amandine"=>$divsoum, "clémentine"=>$divmoud);
      echo json_encode($retournage);
   }
