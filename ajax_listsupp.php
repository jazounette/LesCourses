<?php
   require "loginIdent.php";
   $req = $db->prepare("delete from courses_liste where id_list=?;");
   $req->bindValue(1, $_GET['idsupp']);
   $req->execute();
   echo $req->rowCount();