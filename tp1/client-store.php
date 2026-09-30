<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:client-index.php");
    exit;
}

require_once('classes/CRUD.php');

$crud = new CRUD;

// On prépare les données selon ta base SQL
$data = [
    'nom'       => $_POST['nom'],
    'prenom'    => $_POST['prenom'],
    'email'     => $_POST['email'],
    'telephone' => $_POST['telephone']
];
/*var_dump($_POST);
exit;*/


$insert = $crud->insert('clients', $data);

if($insert){
    header("location:client-show.php?id=$insert");
    exit;
} else {
    header("location:client-index.php");
    exit;
}
