<?php

if(!isset($_SESSION)) {
    session_start();
    $_SESSION['connected']=false;
  }
require_once('../conf.php');
require_once('../controllers/helpers.php');
require_once('../models/class_db.php');
require_once('../models/class-users.php');

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

$user=new User(); //instance de la classe user dans un objet $user

 $id=$user->add();

 if (!$id) die("Erreur lors de l'ajout");

//fonction récuperation d'un utilisateur
$userinfo=$user->getById($id);
if(!$userinfo) die("Erreur lors de l'ajout");
print_r($userinfo);
   
//fonction modification
$_POST['ville']='Cannes';
$update=$user->update($id);
if(!$update) die("Erreur lors de l'ajout");

//fonction récuperation d'un utilisateur
$userinfo=$user->getById($id);
if(!$userinfo) die("Erreur lors de l'ajout");
print_r($userinfo);

//fonction de connexion
// $_POST[] 
$_POST['login']='test';
$_POST['password']='12345';
$login=$user->login();

//fonction is_connected
    if(User::is_connected()) echo "Utilisateur connecté"; else die("Utilisateur non connecté");

//fonction is_admin
   if(User::is_admin()) echo "admin "; else "is utilisateur";
//fonction logout
User::logout();
//fonction is_connected
if(User::is_connected())  die("Erreur lors du logout"); else echo "Utilisateur deconnecté";
//fonction suppression d'un utilisateur
$deleted=$user->delete($id);
if(!$deleted) die('Suppression utilisateur impossible'); else echo 'Utilisateur supprimé';
//fonction récuperation de tous les utilisateur
 $tab=$user->getAll();
  print_r($tab);




































?>