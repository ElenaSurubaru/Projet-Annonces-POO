<?php



function getCat($id){
  try {
    $db = connect();
    $CatQuery = $db->prepare('SELECT * FROM categories WHERE id_categorie = :id');
    $CatQuery->execute(['id' => $id]);
    return $CatQuery->fetch();
  } catch(Exception $e){
    if(DEBUG_MODE) echo $e->getMessage();
  }
  return false;
}

function getCats($limit=10,$page=1){
  try {
    $db = connect();
    $Cats=$db->query('SELECT * FROM categories '.generate_sql_limit($limit,$page));
    return $Cats->fetchAll();
  } catch (Exception $e) {
    if(DEBUG_MODE) echo $e->getMessage();
  }
  return false;
}
//ajout d'un nouvel utilisateur
function addCat(){
  try {
    $db = connect();
    $insertCat = $db->prepare('INSERT INTO categories (nom_categorie, id_categorie_parente ) VALUES ( :nom_categorie, :id_categorie_parente)');
    $req= $insertCat->execute(['nom_categorie'=>$nom, 'id_categorie_parente'=>$cat_id]);
     if($req) return $db->lastInsertId();
  } catch (Exception $e) {
    if(DEBUG_MODE) echo $e->getMessage();
  }
  return false;
}

function updateCat($id){
  try {
    $db = connect();
    $updateCat = $db->prepare('UPDATE categories SET nom_categorie=:nom_categorie,  id_categorie_parente=:id_categorie_parente WHERE id_categorie=:id_categorie');
    return $updateCat->execute(['nom_categorie'=>$nom, 'id_categorie'=>$id, 'id_categorie_parente'=>$cat_id]);
  } catch (Exception $e) {
    if(DEBUG_MODE) echo $e->getMessage();
  }
  return false;
}

function deleteCat($id){
  try {
    $db = connect();
    $deleteCat = $db->prepare('DELETE FROM categories WHERE id_categorie=:id');
    return $deleteCat->execute(['id' => $id]);
  } catch (Exception $e) {
    if(DEBUG_MODE) echo $e->getMessage();
  }
  return false;
}

?>