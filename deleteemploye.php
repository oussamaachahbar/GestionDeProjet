<?php
include 'connexion.php';
if(isset($_GET['deletemat'])){
    $mat=$_GET['deletemat'];
    $sql="delete from `employe` WHERE matriculation='$mat'";
    $resultat=$conn->query($sql);
    if($resultat){
       header('location:table-employe.php');
       

    }
    else{
    echo"ERROR DELETED";
    }
}
?>

