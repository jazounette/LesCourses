<?php
   require "loginIdent.php";

   if (($_GET["idzone"] >= 1) && ($_GET["idzone"] <= 999) && ($_GET["zonome"] != "" )) {
      $req = $db->prepare("select exists(select * from courses_zones where id_zone=?);");
      $req->bindValue(1, $_GET['idzone']);
      $req->execute();
      $responce = $req->fetch()[0];
      if ($responce== 1) {///////////////la row exist >> update
         $req = $db->prepare("update courses_zones set nom_zone=?, coulbck=?, coultxt=? where id_zone=?;");
         $req->bindValue(1, $_GET["zonome"]);
         $req->bindValue(2, $_GET["coulbck"]);
         $req->bindValue(3, $_GET["coultxt"]);
         $req->bindValue(4, $_GET["idzone"]);
         $req->execute();
         echo $req->rowCount();
      }
      if ($responce == 0) {/////la row N'exist PAS >> insertion
         $req = $db->prepare("insert into courses_zones values (?, ?, ?, ?);");
         $req->bindValue(1, $_GET['idzone']);
         $req->bindValue(2, $_GET['zonome']);
         $req->bindValue(3, $_GET['coulbck']);
         $req->bindValue(4, $_GET['coultxt']);
         $req->execute();
         echo $req->rowCount();
      }


   }