<?php

require_once('../controllers/helpers.php');

$date_fr='2021-02-05';
$date_en='20/03/2021';
$email='aaaaffff.net';
$phone='0603050505';
$zip_code='06400';


echo $date_fr.'=>'.date_fr_to_en($date_fr);
echo'<br>';
echo $date_en.'=>'.date_en_to_fr($date_en);

echo'<br>';


if(is_email($email)) 
echo $email.'est valide';
else echo $email.'est invalide';

echo'<br>';

if(is_phone_number($phone)) echo $phone.'est un numero valide';
 else $phone.'est un numero invalide';
echo'<br>';


 if(is_zip_code($zip_code)) echo $zip_code.'est valide'; else echo $zip_code.'est invalide';
  










?>