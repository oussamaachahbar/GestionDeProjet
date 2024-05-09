<?php
include_once('connexion.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $email = $_POST['email'];
    $password = $_POST['passworde'];

    // Requête pour vérifier les informations d'identification
    $sql = "SELECT * FROM employe WHERE email = '$email' AND passworde = '$password'";
    $result =$con->query($sql);
    $count = mysqli_num_rows($result);

    if($count == 1) {
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $_SESSION['nom'] = $data["NOM"];
        $_SESSION['prenom'] = $data["PRENOM"];
        $_SESSION['permission'] = $data["profession"];
        $_SESSION['matricule'] = $data["matriculation"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>WELCOME IN E-PROJECT !</title>
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
                            <li><a href="index.php" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->              
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                     <!-- START WIDGETS -->                    
                     <div class="row">
                        <div class="col-md-3">

                            <!-- START WIDGET SLIDER -->
                        <?php 
                        include_once('connexion.php');
                        // Requête pour compter le nombre total de projets
$requete = $conn->query("SELECT COUNT(*) as total_projets FROM projet");
$resultat = $requete->fetch(PDO::FETCH_ASSOC);
$totalProjets = $resultat['total_projets'];
                        ?>
                            <div class="widget widget-default widget-item-icon" onclick="location.href='table-projet.php';">
    <div class="widget-item-left">
        <span class="fa fa-image"></span>
    </div>
    <div class="widget-data">
        <div class="widget-int num-count"><?php echo $totalProjets; ?></div>
        <div class="widget-title">TOTAL DES PROJETS</div>
        <div class="widget-subtitle">SUR LA PLATEFORME</div>
    </div>
    <div class="widget-controls">
        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget">
            <span class="fa fa-times"></span>
        </a>
    </div>
</div>
         
                            <!-- END WIDGET SLIDER -->
                            
                        </div>
                        <div class="col-md-3">
                            <?php
                            include_once('connexion.php');
                            // Requête pour compter le nombre total de commentaires
$requete = $conn->query("SELECT COUNT(*) as total_commentaires FROM commentaire");
$resultat = $requete->fetch(PDO::FETCH_ASSOC);
$totalCommentaires = $resultat['total_commentaires'];
?>
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='table-commentaire.php';">
    <div class="widget-item-left">
        <span class="fa fa-envelope"></span>
    </div>
    <div class="widget-data">
        <div class="widget-int num-count"><?php echo $totalCommentaires; ?></div>
        <div class="widget-title">COMMENTAIRES</div>
        <div class="widget-subtitle">SUR LA PLATEFORME</div>
    </div>
    <div class="widget-controls">
        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget">
            <span class="fa fa-times"></span>
        </a>
    </div>
</div>
                        
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                        <?php
                            include_once('connexion.php');
                            // Requête pour compter le nombre total de commentaires
$requete = $conn->query("SELECT COUNT(*) as total_employes FROM employe");
$resultat = $requete->fetch(PDO::FETCH_ASSOC);
$totalEmployes = $resultat['total_employes'];
?>
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo $totalEmployes; ?></div>
                                    <div class="widget-title">EMPLOYES ENREGISTRES</div>
                                    <div class="widget-subtitle">SUR LA PLATEFORME</div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-danger widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
                    <!-- END WIDGETS -->                            
                    
                    <div class="row">
                      
                        </div>
                        <div class="col-md-4">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default" style="width:70em">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>PHASE</h3>
                                        <span>PHASE activity</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 10px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                    <table class="table table-bordered small-width" >
  <thead>
    <tr>
        <th scope="col">ref_projet</th>
    <th scope="col">NOM</th>  
      
      
      <th scope="col">statut</th>
      
      

      
      
    </tr>
  </thead>
  <?php
  include_once 'connexion.php';
  $sql = "SELECT * FROM phase";
  $result=$conn->query($sql);
  if ($resultat) {
    while ($row =$result->fetch(pdo::FETCH_ASSOC)) {
        $id=$row['id'];
        $Nom = $row['NOM'];
        $ref = $row['ref_projet'];
        $dur = $row['duree'];
        $chef = $row['responsable'];
        $stat=$row['statut'];
        
      echo '<tr>
      <td scope="row">' . $ref . '</td>
      <td scope="row">' . $Nom. '</td>
     
              
              
              <td scope="row">' . $stat. '</td>
             

             
             
            
              
              
            </tr>';
    }
  
  }
  ?>  </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                </div>
            </div>
        </div>
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
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>