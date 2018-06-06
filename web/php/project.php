<?php

function getCategories() {
  global $db;
  $dbq = "SELECT title, category_id FROM public.category";
  try{
    $query = $db->prepare($dbq);
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  } catch (PDOException $e){
    $e->getMessage();
    echo $e;
  }
}

function existingCategory($category){
  $categories = getCategories();
  foreach($categories as $cat){
    if (strtolower($cat['title']) == strtolower($category))
    return true;
  }
  return false;
}

function insertCategory($category){
  global $db;
  try{
    $dbq = "INSERT INTO category (title) VALUES ('$category')";
    $db->exec($dbq);
  } catch (PDOException $e){
    $e->getMessage();
    echo $e;
  }
}
?>
