<?php
   require "loginIdent.php";
   $req = $db->prepare("update courses_prods set zone=?, describ=?, prix=? where id_prod=?;");
   $req->bindValue(1, $_GET['zone']);
   $req->bindValue(2, $_GET['desc']);
   $req->bindValue(4, $_GET['idéd']);
   $prixConv = floatval($_GET['prix']);
   if ($prixConv) {  $req->bindValue(3, $prixConv);  } else {  $req->bindValue(3, NULL);  }
   $req->execute();
   // echo $_GET['idéd'] . " - " . $_GET['desc'] . " - " . $_GET['prix'] . "<br>";
   echo $req->rowCount();
