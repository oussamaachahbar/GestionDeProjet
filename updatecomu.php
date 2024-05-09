<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-SERVICE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .autreprof{
        display: flex;
        flex-direction: row;
       
    }
    center{
        margin: 1em;
    }
    .card-body{
        margin: 1.5em;
    }
    
  </style>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
	

<?php
include 'connexion.php';
$id=$_GET['updateid'];
if (isset($_POST['update'])){
   $comm=$_POST['comm'];
  $nom=$_POST['nom'];
  $date=$_POST['date'];
  


  $sql = "UPDATE `commentaire` SET `id`='$id',`discription`='$comm',`NOM`='$nom',`date`='$date'  where id='$id'";        
  $result = $conn->query($sql);
  
}

$id= $_GET['updateid'];
$sqll = "SELECT `discription`, `NOM`,`date` FROM `commentaire` WHERE id='$id'";
$resultat = $conn->query($sqll);

if ($resultat && $resultat->rowCount() > 0) {
  $personne = $resultat->fetch(PDO::FETCH_ASSOC);
} else {
  // Handle the case where no rows were found
  $personne = [];
}
?>
<div class="page-content-wrap">
                    
                       
                    
                    <div class="row">                        
                        
                        <div class="col-md-6 col-sm-8 col-xs-7" style="width:50em ;">
                            
                            <form method="post" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span>COMMENTAIRE</h3>
                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">commentaire</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="COMMENTAIRE" class="form-control" name="comm" value="<?php echo $personne['discription']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">date</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="date" placeholder="DATE" class="form-control" name="date" value="<?php echo $personne['date']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">nom et prenom</label>
                                        <div class="col-md-9 col-xs-7">
                                        <input type="text" placeholder="NOM ET PRENOM" class="form-control" name="nom" value="<?php echo $personne['NOM']; ?>" readonly>
                                        </div>
                                    </div>
                                    
                                                                             
                                    <button type="update" 
		          class="btn btn-primary"
		          name="update">update</button>
		   
		    <a href="table-com-uti.php" class="link-primary">View</a>
                                </div>
                            </div>
                            </form>
   </body>
</html>