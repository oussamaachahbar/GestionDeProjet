<?php
include_once 'connexion.php';
session_start();
if(isset($_POST['savee'])){
    $comm=$_POST['description'];
$nom=$_POST['nom'];
$date=$_POST['date'];
$sql="INSERT INTO `commentaire`(`discription`, `NOM`,`date`) VALUES ('$comm','$nom','$date')";
$resultat=$conn->query($sql);}

?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title> COMMENTAIRES </title>
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
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">commentaire</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">     
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-arrow-circle-o-left"></span> COMMENTAIRES</h2>
                        </div>                                                
                      
                        
                    </div>   
                    <form method="POST" role="form">
        <div class="panel-body form-group-separated" style="width:60em">
            <div class="form-group">
                <label class="col-md-3 col-xs-5 control-label">DESCRIPTION</label>
                <div class="col-md-9 col-xs-7">
                    <input type="text" placeholder="DESCRIPTION" class="form-control" name="description" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-5 control-label">DATE</label>
                <div class="col-md-9 col-xs-7">
                    <input type="date" placeholder="date de commentaire" class="form-control" name="date" />
                </div>
            </div>

            <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label"> NOM </label>
                                        <div class="col-md-9 col-xs-7">
                                            <?php
echo "<input type='text' name='nom'value='" . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "' class='form-control' style='color: black;' readonly>";

           ?> </div></div>
             <div>
            <button type="submit" class="btn btn-primary btn-rounded pull-right" name="savee">Save</button>
        </div>     
        </div>
        
    </form>
     <!-- afficher table comm-->
  
      <!--end affichage-->
                    
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
                            <a href="deconnexion.php" class="btn btn-success btn-lg">Yes</a>
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






