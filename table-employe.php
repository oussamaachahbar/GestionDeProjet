<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title> TABLES DES DONNEES </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link href="assets/img/favicon.png" rel="icon">
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                      
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
             <!-- START PAGE SIDEBAR -->
             <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                       
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                        <img src="logo.png" alt="">
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                            <img src="logo.png" alt="">
                            <p class="username" style="color:white; margin:4%">|<?php echo "BONJOUR ". $_SESSION['permission']; ?>|</p>
                            <p class="username" style="color:white; margin:8%">|<?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom']; ?>|</p>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li class="xn-openable active">
                        <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboards</span></a>
                        <ul>
                            <li class="active"><a href="index1.php"><span class="xn-text">Dashboard 1</span></a></li>
                        </ul>
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Pages</span></a>
                        <ul>
                            <li><a href="creer projet.php"><span class="fa fa-image"></span> Nouveau Projet</a></li>

                            <li><a href="creer phase.php"><span class="fa fa-users"></span> Definir les phases d'un projet</a></li>
        
                            <li><a href="creer profile.php"><span class="fa fa-wrench"></span>Ajouter Profil</a></li>
                    
                            <li><a href="pages-commentaires.php"><span class="fa fa-edit"></span> Commentaires </a></li>                      
                        </ul>
                    </li>                                  
                    <li class="xn-openable">
                        <a href="tables.php"><span class="fa fa-table"></span> <span class="xn-text">Tables</span></a>
                        <ul>                            
                            <li><a href="table-employe.php"><span class="fa fa-download"></span> Total Employe</a></li>
                            <li><a href="table-projet.php"><span class="fa fa-download"></span>Total Projet</a></li>
                            <li><a href="table-phase.php"><span class="fa fa-download"></span>Total Phase</a></li>
                            <li><a href="table-commentaire.php"><span class="fa fa-download"></span>Total Commentaire</a></li>                            
                        </ul>
                    </li>       
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->                    
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="deconnexion.php" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->              
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->    
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Export</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> EMPLOYE</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default" style="width:80em">
                                
                                <style>
  .table table-bordered {
    width: 70em; /* Ajustez la valeur de width selon vos besoins */
  }
</style>



<style>
.cadre-professionnel {
  border: 1em solid black;
  padding: 10px;
  background-color:white;
  font-family: Arial, sans-serif;
  font-weight: bold;
  /* Ajoutez d'autres styles appropriés selon vos préférences */
}
</style>


   <table class="table table-bordered small-width" >
  <thead>
    <tr>
    <th scope="col">MATRICULATION</th>  
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col">CIN</th>
      <th scope="col">EMAIL</th>
      <th scope="col">TELEPHONE</th>
      <th scope="col">POSTE</th>
     
      
     
      <th scope="col">PROFESSION</th>
      <th scope="col">OPERATION1</th>
      
    </tr>
  </thead>
  <?php
  include_once 'connexione.php';
  $sql = "SELECT * FROM employe";
  $resultat = mysqli_query($conn, $sql);
  if ($resultat) {
    while ($row = mysqli_fetch_assoc($resultat)) {
        
        $mat=$row['matriculation'];  
        $Nom = $row['NOM'];
        $Prenom = $row['PRENOM'];
        $emai = $row['email'];
        $pass = $row['passworde'];
        $proff = $row['profession'];
        $cine = $row['cin'];
        $tel=$row['telephone'];
        $poste=$row['poste'];
      echo '<tr>
      <td scope="row">' . $mat. '</td>
     
              <td scope="row">' . $Nom . '</td>
              <td scope="row">' . $Prenom . '</td>
              <td scope="row">' . $cine. '</td>
              <td scope="row">' . $emai . '</td>
              <td scope="row">' . $tel. '</td>
              <td scope="row">' . $poste. '</td>
              <td scope="row">' . $proff . '</td>
             
            
              <td>
                <button class="btn btn-danger">
                  <a href="deleteemploye.php?deletemat=' . $mat . '" class="text-light">DELETE</a>
                </button>
                <button class="btn btn-warning" >
                <a href="updateemploye.php?updatemat='.$mat.'" class="text-light">UPDATE</a>
                </button>
              </td>
              
            </tr>';
    }
  
  }
  ?>  </table>
  <style>
  .small-width {
  width:90em; /* Modifiez cette valeur selon vos besoins */
}</style>

 
                            <!-- END DEFAULT TABLE EXPORT -->

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->        
        
 <!-- MESSAGE BOX-->
 <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="index.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                      

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->
        
        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>        
        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->                 
    </body>
</html>





