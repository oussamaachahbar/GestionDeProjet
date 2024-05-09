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
  $mat = $_GET['updatemat'];
  $cine = $_POST['cin'];
  $nom = $_POST['NOM'];
  $prenom = $_POST['PRENOM'];
  $email = $_POST['email'];
  $pass = $_POST['passworde'];
  $prof = $_POST['profession'];
  $postee = $_POST['poste'];
  $tel = $_POST['telephone'];

  $sql = "UPDATE `employe` SET `NOM`='$nom', `PRENOM`='$prenom', `cin`='$cine', `email`='$email', `telephone`='$tel', `poste`='$postee', `passworde`='$pass', `profession`='$prof' WHERE `matriculation`='$mat'";
  $conn->query($sql);
}

$mat = $_GET['updatemat'];
$sqll = "SELECT `matriculation`, `NOM`, `PRENOM`, `cin`, `email`, `telephone`, `poste`, `passworde`,  `profession` FROM `employe` WHERE `matriculation`='$mat'";
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
      cin
      <input type="text" class="form-control" name="cin" placeholder="CIN" value="<?php echo $personne['cin']; ?>">
    </div>

    <div class="form-group">
      NOM
      <input type="text" class="form-control" name="NOM" placeholder="NOM" value="<?php echo $personne['NOM']; ?>">
    </div>
    
    <div class="form-group">
      PRENOM
      <input type="text" class="form-control" name="PRENOM" placeholder="PRENOM" value="<?php echo $personne['PRENOM']; ?>">
    </div>
    
    <div class="form-group">
      email
      <input type="email" class="form-control" name="email" placeholder="EMAIL" value="<?php echo $personne['email']; ?>">
    </div>
    
    <div class="form-group">
      password
      <input type="text" class="form-control" name="passworde" placeholder="PASSWORD" value="<?php echo $personne['passworde']; ?>">
    </div>
    
    <div class="form-group">
      poste
      <input type="text" class="form-control" name="poste" placeholder="POST" value="<?php echo $personne['poste']; ?>">
    </div>
    
    <div class="form-group">
      PROFESSION
      <select class="form-control" name="profession">
        <option value="admin" <?php if($personne['profession'] == 'admin') echo 'selected'; ?>>admin</option>
        <option value="utilisateur" <?php if($personne['profession'] == 'utilisateur') echo 'selected'; ?>>utilisateur</option>
      </select>
    </div>
    
    <div class="form-group">
      telephone
      <input type="text" class="form-control" name="telephone" placeholder="YOUR NUMBER" value="<?php echo $personne['telephone']; ?>">
    </div>
    

    <button type="submit" class="btn btn-primary" name="update">update</button>
    <a href="table-employe.php" class="link-primary">View</a>
  </form>
</div>
</body>

</html>