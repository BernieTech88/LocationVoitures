<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:client-index.php");
    exit;
}

require_once("classes/CRUD.php");

$crud = new CRUD;

// On prépare les données selon ta base SQL
$data = [
    'id'        => $_POST['id'],
    'nom'       => $_POST['nom'],
    'prenom'    => $_POST['prenom'],
    'email'     => $_POST['email'],
    'telephone' => $_POST['telephone']
];

$update = $crud->update('clients', $data);

if($update){
    header('location:client-show.php?id='.$_POST['id']);
    exit;
}else{
    echo "Erreur lors de la mise à jour.";
}
