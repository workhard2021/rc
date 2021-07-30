<?php

require_once 'controller/Controller.class.php';
$table=isset($_GET['table'])? $_GET['table']:"";
$colonne=isset($_GET['colonne'])? $_GET['colonne']:"";
$id=isset($_GET['id'])? $_GET['id']:"";
$api=new Controller();
$api->get($table,$colonne,$id);