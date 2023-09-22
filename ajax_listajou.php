<?php
   require "loginIdent.php";
   $req = $db->prepare("insert into courses_liste values ( NULL, ?);");
   $req->bindValue(1, $_GET['idajou']);
   $req->execute();
   $mandarine = $req->rowCount();

   $req = $db->query("select last_insert_id();");
   $patatine = $req->fetch()[0];

   $retournage = array("rowCount"=>$mandarine, "lastID"=>$patatine);
   echo json_encode($retournage);
