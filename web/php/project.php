<?php
// remove task from db on click
function killTask($index){
  global $db;
  global $user;
  try{
    $dbq = "DELETE FROM task WHERE task_id=$index";
    $db->exec($dbq);
    $str = "location:tasklist.php?user=".$user;
    // redirect to avoid multiple executions
    header($str);

  } catch (PDOException $e){
    $e->getMessage();
    echo $e;
  }
}

// grab all possible categories from db
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

// check to see if given category exists in db
function existingCategory($category){
  $categories = getCategories();
  foreach($categories as $cat){
    if (strtolower($cat['title']) == strtolower($category))
    return true;
  }
  return false;
}

// add category into db
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
