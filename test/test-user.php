<?php
 if(!isset($_SESSION)) {
    session_start();
    $_SESSION['connected']=false;
  }
require_once('../conf.php');
require_once('../controllers/helpers.php');
require_once('../models/functions_users.php');

//fonction d'insertion
$_POST=array();            
$_POST['login']='test';
$_POST['email']='test@test.com';
$_POST['password']='12345';
$_POST['nom']='elena';
$_POST['prenom']='gabriela';      
$_POST['naissance']='08/05/1988';
$_POST['tel']='0680286012';
$_POST['sexe']='0';   
$_POST['adresse']='318 montée des pertuades';
$_POST['postal']='06300';
$_POST['ville']='Vallauris';
 $id=adduser();

 if (!$id) die("Erreur lors de l'ajout");

//fonction récuperation d'un utilisateur
$userinfo=getUser($id);
if(!$userinfo) die("Erreur lors de l'ajout");
print_r($userinfo);
   
//fonction modification
$_POST['ville']='Cannes';
$update=updateUser($id);
if(!$update) die("Erreur lors de l'ajout");

//fonction récuperation d'un utilisateur
$userinfo=getUser($id);
if(!$userinfo) die("Erreur lors de l'ajout");
print_r($userinfo);

//fonction de connexion
// $_POST[] 
$_POST['login']='test';
$_POST['password']='12345';
$login=login();

//fonction is_connected
    if(is_connected()) echo "Utilisateur connecté"; else die("Utilisateur non connecté");

//fonction is_admin
   if(is_admin()) echo "admin "; else "is utilisateur";
//fonction logout
      logout();
//fonction is_connected
if(is_connected())  die("Erreur lors du logout"); else echo "Utilisateur deconnecté";
//fonction suppression d'un utilisateur
$deleted=deleteUser($id);
if(!$deleted) die('Suppression utilisateur impossible'); else echo 'Utilisateur supprimé';
//fonction récuperation de tous les utilisateur
 $tab=getUsers();
  print_r($tab);



?>