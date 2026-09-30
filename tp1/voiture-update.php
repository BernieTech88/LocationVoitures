<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:voiture-index.php");
    exit;
}

require_once("classes/CRUD.php");

$crud = new CRUD;

// On prépare les données selon ta base SQL
$data = [
    'id'              => $_POST['id'],
    'marque'          => $_POST['marque'],
    'modele'          => $_POST['modele'],
    'annee'           => $_POST['annee'],
    'immatriculation' => $_POST['immatriculation'],
    'prix_jour'       => $_POST['prix_jour']
];

$update = $crud->update('voitures', $data);

if($update){
    header('location:voiture-show.php?id='.$_POST['id']);
    exit;
}else{
    echo "Erreur lors de la mise à jour.";
}
