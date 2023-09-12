<?php
   require "loginIdent.php";
   $req = $db->prepare("insert into courses_zones values (?, ?, ?);");
   $req->bindValue(1, $_GET['idzone']);
   $req->bindValue(2, $_GET['zonome']);
   $req->bindValue(3, $_GET['coulzone']);
   $req->execute();
   echo $req->rowCount();
