<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:client-index.php");
    exit;
}

if(!isset($_POST['id']) || !is_numeric($_POST['id'])){
    header("location:client-index.php");
    exit;
}

require_once('classes/CRUD.php');

$id = $_POST['id'];
$crud = new CRUD;

$delete = $crud->delete('clients', $id);

if($delete){
    header('location:client-index.php');
    exit;
} else {
    echo "Erreur lors de la suppression du client.";
}
