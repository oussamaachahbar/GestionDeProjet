<?php
include 'connexion.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `commentaire` WHERE id='$id'";
    $resultat=$conn->query($sql);
    if($resultat){
       header('location:table-com-uti.php');
       

    }
    else{
    echo"ERROR DELETED";
    }
}
?>

