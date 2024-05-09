<?php
include 'connexion.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `projet` where id='$id'";
    $resultat=$conn->query($sql);
    if($resultat){
       header('location:table-projet.php');
       

    }
    else{
    echo"ERROR DELETED";
    }
}
?>

