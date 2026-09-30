<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:reservation-index.php");
    exit;
}

require_once('classes/CRUD.php');

$crud = new CRUD;

// récupérer la voiture
$voiture = $crud->selectId('voitures', $_POST['voiture_id']);
$prix_jour = $voiture['prix_jour'];

// calcul du nombre de jours
$jours = (strtotime($_POST['date_fin']) - strtotime($_POST['date_debut'])) / 86400;

// calcul du total
$total = $prix_jour * $jours;

// préparer les données selon ta base SQL
$data = [
    'client_id'  => $_POST['client_id'],
    'voiture_id' => $_POST['voiture_id'],
    'date_debut' => $_POST['date_debut'],
    'date_fin'   => $_POST['date_fin'],
    'total'      => $total
];

$insert = $crud->insert('reservations', $data);

if($insert){
    header("location:reservation-show.php?id=$insert");
    exit;
} else {
    header("location:reservation-index.php");
    exit;
}
