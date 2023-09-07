<?php
   require "loginIdent.php";
   $req = $db->prepare("select * from courses_prods where describ like ? order by describ;");
   $req->bindValue(1, "%" . $_GET['cherche'] . "%");
   $req->execute();
   $rep = $req->fetchAll(PDO::FETCH_ASSOC);

   // $req = $db->query("select * from courses_prods where descrip like '%o%';");
   // $rep = $req->fetchAll(PDO::FETCH_ASSOC);
   if ($rep) {
      echo "<table>";
      foreach ($rep as $val) {
         echo '<tr class="survol" onclick="yarienàvoir(' .$val["id_prod"] . ')">';
         echo "<td>" . $val["id_prod"] . "</td>";
         // echo "<td>" . $val["zone"] . "</td>";
         echo "<td>" . $val["describ"] . "</td>";
         echo "<td>" . $val["prix"] . "</td>";
         echo "</tr>";
      }
      echo "</table>";
   } else {
      echo "c'est vide est froid";
   }