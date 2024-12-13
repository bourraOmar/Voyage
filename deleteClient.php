<?php 
include 'connect.php';
if(isset($_GET['clientId'])){
  $id = $_GET['clientId'];

  $sql = "DELETE FROM `client` WHERE id_client = $id";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo("deleted successfull");
    header('location: client.php');
    exit();
  }
  else
    die(mysqli_error($conn));
}