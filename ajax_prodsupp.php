<?php
   require "loginIdent.php";

   $tablouz = array( "courses_liste", "courses_prods" );

   foreach($tablouz as $val){
      $req = $db->prepare("delete from " . $val . " where id_prod=?;");
      $req->bindValue(1, $_GET['idsupp']);
      $req->execute();
      echo $val . ": " . $req->rowCount() . " ligne supprimé - id_prod:". $_GET['idsupp'] . "<br>";
   }
