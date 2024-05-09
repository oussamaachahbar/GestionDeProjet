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

if (isset($_POST['update'])) {
  $id = $_GET['updateide'];
  $nom = $_POST['nom'];
  $ref = $_POST['ref'];
  $dur = $_POST['dure'];
  $chef = $_POST['chef'];
  
  $sql = "UPDATE `phase` SET `id`='$id',`NOM`='$nom',`ref_projet`='$ref',`duree`='$dur',`responsable`='$chef' WHERE id='$id'";
  $conn->query($sql);
}

$id = $_GET['updateide'];
$sqll = "SELECT `id`, `NOM`, `ref_projet`, `duree`, `responsable` FROM `phase` WHERE id='$id'";
$resultat = $conn->query($sqll);

if ($resultat && $resultat->rowCount() > 0) {
  $personne = $resultat->fetch(PDO::FETCH_ASSOC);
} else {
  // Handle the case where no rows were found
  $personne = [];
}
?>

<div class="container">
  <form action="" method="post"> 
    <h4 class="display-4 text-center">UPDATE</h4>
    <hr><br>
    <div class="form-group">
      NOM
      <input type="text" class="form-control" name="nom" placeholder="nom" value="<?php echo $personne['NOM']; ?>">
    </div>
    <div class="form-group">
      REFERENCE
      <input type="text" class="form-control" name="ref" placeholder="reference" value="<?php echo $personne['ref_projet']; ?>">
    </div>


    
    
    <div class="form-group">
      duré
      <input type="text" class="form-control" name="dure" placeholder="dure" value="<?php echo $personne['duree']; ?>">
    </div>
    
    <div class="form-group">
      responsable
      
      <?php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare('SELECT NOM, PRENOM, poste FROM employe');
        $resultat->execute();
        $coordona = $resultat->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="form-group">
            <select name="chef" class="form-control" >
                <?php
                foreach ($coordona as $ligne) {
                    echo "<option value='" . $ligne['NOM'] . " " . $ligne['PRENOM'] . "'>" . $ligne['NOM'] . " " . $ligne['PRENOM'] . "</option>";
                }
                ?>
            </select>
    </div>
    
    
  
    

    <button type="submit" class="btn btn-primary" name="update">update</button>
    <a href="table-phase.php" class="link-primary">View</a>
  </form>
</div>
</body>

</html>