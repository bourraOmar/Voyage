<?php 
  include 'connect.php';
  if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];

    $sql = "DELETE FROM `activite` WHERE id_activite = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo("deleted successfull");
      header('location: activite.php');
      exit();
    }
    else 
      die(mysqli_error($conn));
  }
