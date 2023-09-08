<?php
   require "loginIdent.php";

   $tablouz = array( "courses_liste", "courses_prods" );
   $ritourn = array();

   foreach($tablouz as $val){
      $req = $db->prepare("delete from " . $val . " where id_prod=?;");
      $req->bindValue(1, $_GET['idsupp']);
      $req->execute();
      $ritourn[$val] = $req->rowCount();
   }
   echo json_encode($ritourn);
