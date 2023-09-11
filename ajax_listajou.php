<?php
   require "loginIdent.php";
   $req = $db->prepare("insert into courses_liste values ( NULL, ?);");
   $req->bindValue(1, $_GET['idajou']);
   $req->execute();
   echo $req->rowCount();
