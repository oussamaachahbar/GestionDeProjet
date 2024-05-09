<?php
include 'connexion.php';
if(isset($_GET['deleteide'])){
    $id=$_GET['deleteide'];
    $sql="delete from `phase` WHERE id='$id'";
    $resultat=$conn->query($sql);
    if($resultat){
       header('location:table-phase.php');
       

    }
    else{
    echo"ERROR DELETED";
    }
}
?>

