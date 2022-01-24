<?php
  require '../php/db.php';

  $link = mysqli_connect($host, $user, $password, $db) or die("Ошибка " . mysqli_error($link));

  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    $sql = "SELECT * FROM todo;";
    $result = $link->query($sql);

    $todos = array();
    while($row = $result->fetch_assoc()) {
      $todo[] = $row;
    }
    echo json_encode($todo);
  }
  else if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    $_POST = json_decode(file_get_contents('php://input'), true);  
    $todo = $_POST['todo'];
    
    $sql = "INSERT INTO `todo` (`text`) VALUES('$todo')";
    $result = $link->query($sql);
  }
  else if ($_SERVER['REQUEST_METHOD'] === 'PUT') 
  {
    $_POST = json_decode(file_get_contents('php://input'), true);  
    $id = $_POST['id'];
    $boolean = $_POST['checked'];
    
    $sql = "UPDATE `todo` SET `checked` = $boolean WHERE id = $id";
    $result = $link->query($sql);
  }
  else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') 
  {
    $_POST = json_decode(file_get_contents('php://input'), true);  
    $id = $_POST['id'];
    
    $sql = "DELETE FROM `todo` WHERE id=$id";
    $result = $link->query($sql);
  }
  
?>