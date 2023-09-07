<?php
   require "loginIdent.php";

   $req = $db->prepare("delete from courses_zones where id_zone=?;");
   $req->bindValue(1, $_GET['idsupp']);
   $req->execute();

   echo $req->rowCount();
   // echo $req->rowCount() . " ligne supprimé - id_zone:". $_GET['idsupp'] . "<br>";
