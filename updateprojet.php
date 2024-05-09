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
   $refe=$_POST['reference'];
  $titre = $_POST['titre'];
  $descr = $_POST['description'];
  $budg = $_POST['budget'];
  $periodeest = $_POST['periodeestime'];
  $datedeb = $_POST['datedebut'];
  $datefin = $_POST['datefin'];
$chef=$_POST['chefdeprojet'];
   


  $sql = "UPDATE `projet` SET `id`='$id',`reference`='$refe',`titre`='$titre',`description`='$descr',`budget`='$budg',`periodeestime`='$periodeest',`datedebut`='$datedeb',`datefin`='$datefin',`chefprojet`='$chef' WHERE id=$id ";        
  $result = $conn->query($sql);
  
}

$id = $_GET['updateid'];
$sqll = "SELECT `id`, `reference`, `titre`, `description`, `budget`, `periodeestime`, `datedebut`, `datefin`, `chefprojet` FROM `projet` where id='$id'";
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
                                    <h3><span class="fa fa-pencil"></span>PROJET</h3>
                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">REFERENCE</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="REFERENCE" class="form-control" name="reference" value="<?php echo $personne['reference']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">TITRE</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="TITRE" class="form-control" name="titre" value="<?php echo $personne['titre']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">DESCRIPTION</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="DESCRIPTION" class="form-control" name="description"value="<?php echo $personne['description']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">BUDGET</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="BUDGET" class="form-control" name="budget" value="<?php echo $personne['budget']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label" >PERIODE ESTIME</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="periode estimé" class="form-control"name="periodeestime" value="<?php echo $personne['periodeestime']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">DATE DEBUT</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="date" placeholder="DATE DE DEBUT" class="form-control" name="datedebut" value="<?php echo $personne['datedebut']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">DATE FIN</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="date" placeholder="DATE DE FIN" class="form-control" name="datefin" value="<?php echo $personne['datefin']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group" style="width:36.4em">
                                        <label class="col-md-3 col-xs-5 control-label">CHEF DE PROJET</label>
                                        
                                            <select class="form-control" name="chefdeprojet" value="<?php echo $personne['chefprojet']; ?>">
                                            <?php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare('SELECT * FROM employe');
        $resultat->execute();
        $coordona = $resultat->fetchAll(PDO::FETCH_ASSOC);
        ?>
       
            <option value="<?php echo $personne['chefprojet']; ?>"><?php echo $personne['chefprojet']; ?></option>
                <?php
                foreach ($coordona as $ligne) {
                    echo "<option class='custom-option' value='" . $ligne['NOM'] . " " . $ligne['PRENOM'] . "'>" . $ligne['NOM'] . " " . $ligne['PRENOM'] . "</option>";
                }
                ?>
                                            </select>      
                                   
                                   
                                      <style>
  .custom-option {
    color: white; /* Remplacez "red" par la couleur de votre choix */
    /* Ajoutez d'autres propriétés CSS ici si nécessaire */
    background-color: black;
  }
</style>
                                       
                                    <button type="update" 
		          class="btn btn-primary"
		          name="update">update</button>
		   
		    <a href="table-projet.php" class="link-primary">View</a>
                                </div>
                            </div>
                            </form>
   </body>
</html>