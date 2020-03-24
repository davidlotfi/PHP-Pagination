<?php
  // PDO extention

  try {

       $bdd = new PDO('mysql:host=localhost;dbname=pagination','root','');

  } catch (Exception $e){

      die('Erreur:'.$e->getMessage());

    }

  function find_all_produit(){
    global $bdd;
    return $bdd->query('SELECT * FROM produit');
  }

  function count_all_produit(){
    $reponse = find_all_produit();
    return $reponse->rowCount(); ;
  }

  function find_by_sql($sql=""){
    global $bdd;
    return $bdd->query($sql);
  }


 ?>
