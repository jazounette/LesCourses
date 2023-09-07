<?php
   require "loginIdent.php";

   $req = $db->prepare("insert into courses_prods values (NULL, ?, ?, ?);");
   $req->bindValue(1, $_GET['zone']);
   $req->bindValue(2, $_GET['desc']);
   $prixConv = floatval($_GET['prix']);
   if ($prixConv) {  $req->bindValue(3, $prixConv);  } else {  $req->bindValue(3, NULL);  }
   $req->execute();
   echo $req->rowCount();
