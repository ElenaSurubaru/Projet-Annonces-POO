<?php


function getAnnonce($id){
  try {
    $db = connect();
    $AnnonceQuery = $db->prepare('SELECT * FROM annonces WHERE id_annonce = :id');
    $AnnonceQuery->execute(['id' => $id]);
    return $AnnonceQuery->fetch();
  } catch(Exception $e){
    if(DEBUG_MODE) echo $e->getMessage();
  }
  return false;
}

function getAnnonces($limit=10,$page=1){
  try {
    $db = connect();
    $Annonces=$db->query('SELECT * FROM annonces '.generate_sql_limit($limit,$page));
    return $Annonces->fetchAll();
  } catch (Exception $e) {
    if(DEBUG_MODE) echo $e->getMessage();
  }
  return false;
}

//ajout d'un nouvel utilisateur
function addAnnonce(){
  try {
    $db = connect();
    $insertAnnonce = $db->prepare("INSERT INTO `annonces`( `date_creation`, `titre`, `description`, `duree_de_publication_en_mois`, `prix_vente_objet`, `cout_annonce`, `id_mode_paiement`, `id_etat`, `id_utilisateur`) VALUES (:date_creation, :titre, :description, :duree_de_publication_en_mois, :prix_vente_objet, :cout_annonce, :id_mode_paiement, :id_etat, :id_utilisateur)");
    $req= $insertAnnonce->execute([
      'date_creation'=>$date_creation,'titre'=>$titre, 'description'=>$description, 'duree_de_publication_en_mois'=>$duree_de_publication_en_mois, 'prix_vente_objet'=>$prix_vente_objet,'cout_annonce'=>$cout_annonce, 'id_mode_paiement'=>$id_mode_paiement,'id_etat'=>$id_etat,'id_utilisateur'=>$id_utilisateur]);
     if($req) return $db->lastInsertId();
  } catch (Exception $e) {
    if(DEBUG_MODE) echo $e->getMessage();
  }
  return false;
}

function updateAnnonce($id){
  try {
    $db = connect();
    $updateAnnonce = $db->prepare("UPDATE annonces SET date_creation=:date_creation,titre=:titre,description=:description,duree_de_publication_en_mois=:duree_de_publication_en_mois,prix_vente_objet=:prix_vente_objet,cout_annonce=:cout_annonce,id_mode_paiement=:id_mode_paiement,id_etat=:id_etat,id_utilisateur=:id_utilisateur WHERE id_annonce=:id");
    return $updateAnnonce->execute([
      'date_creation'=>$date_creation, 'titre'=>$titre, 'description'=>$description, 'duree_de_publication_en_mois'=>$duree_de_publication_en_mois,'prix_vente_objet'=>$prix_vente_objet,'cout_annonce'=>$cout_annonce,'id_mode_paiement'=>$id_mode_paiement,'id_etat'=>$id_etat,'id_utilisateur'=>$id_utilisateur,'id'=>$id
    ]);
  } catch (Exception $e) {
    if(DEBUG_MODE) echo $e->getMessage();
  }
  return false;
}

function deleteAnnonce($id){
  try {
    $db = connect();
    $deleteAnnonce = $db->prepare('DELETE FROM annonces WHERE id_annonce=:id');
    return $deleteAnnonce->execute(['id' => $id]);
  } catch (Exception $e) {
    if(DEBUG_MODE) echo $e->getMessage();
  }
  return false;
}

?>