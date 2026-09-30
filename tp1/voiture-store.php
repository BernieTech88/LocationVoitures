<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:voiture-index.php");
    exit;
}

require_once('classes/CRUD.php');

$crud = new CRUD;

// On prépare les données selon ta base SQL
$data = [
    'marque'         => $_POST['marque'],
    'modele'         => $_POST['modele'],
    'annee'          => $_POST['annee'],
    'immatriculation'=> $_POST['immatriculation'],
    'prix_jour'      => $_POST['prix_jour']
];

$insert = $crud->insert('voitures', $data);

if($insert){
    header("location:voiture-show.php?id=$insert");
    exit;
} else {
    header("location:voiture-index.php");
    exit;
}
