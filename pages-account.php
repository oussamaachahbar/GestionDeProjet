<?php
include_once 'connexion.php';
session_start();
if (isset($_POST['savee'])){
  $mat=$_POST['matriculation'];  
  $Nom = $_POST['nomee'];
  $Prenom = $_POST['prenomee'];
  $emai = $_POST['emailee'];
  $pass = $_POST['passwordee'];
  $proff = $_POST['profee'];
  $cine = $_POST['cin'];
 
  $tel=$_POST['telephone'];
  $poste=$_POST['post'];

  $sql = "INSERT INTO `employe` (`matriculation`, `NOM`, `PRENOM`, `cin`, `email`, `telephone`, `poste`, `passworde`, `profession`) VALUES ('$mat', '$Nom','$Prenom', '$cine','$emai','$tel', '$poste','$pass','$proff') "; 
  $result = $conn->query($sql);

  
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>AJOUTER PROFIL</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                      
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
             <!-- START PAGE SIDEBAR -->
             
                <div class="page-title">                    
                    <h2 style="color:white"><span class="fa fa-cogs"></span> Create Account</h2>
                </div>
                <!-- END PAGE TITLE -->                     
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                       
                    
                    <div class="row" style=" background-color:black">                        
                        
                        <div class="col-md-6 col-sm-8 col-xs-7" style="width:90em ; margin-left:30px">
                            
                            <form method="post" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    
                                </div>
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">MATRICULATION</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="matriculation" class="form-control" name="matriculation"/>
                                        </div>
                                    </div>
                                    
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">NOM</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="nom" class="form-control" name="nomee"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">PRENOM</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="prenom" class="form-control" name="prenomee"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">CIN</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="cin" class="form-control" name="cin"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">EMAIL</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="email" placeholder="email" class="form-control" name="emailee"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
  <label class="col-md-3 col-xs-5 control-label">profession</label>
  <div class="col-md-9 col-xs-7">
    <select class="form-control" name="profee">
      <option value="admin">admin</option>
      <option value="utilisateur">utilisateur</option>
    </select>
  </div>
</div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label" >TELEPHONE</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="telephone" class="form-control"name="telephone"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">POSTE</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="POSTE" class="form-control" name="post"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Password</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" placeholder="password" class="form-control" name="passwordee"/>
                                        </div>
                                    </div>
                                                                   
                                    <div>
                                       
                                            <button type="submit" class="btn btn-primary btn-rounded pull-right" name="savee">Save</button>
                                      
                                    </div>
                                </div>
                            </div>
                            </form>
                            
                                    
    </body>
</html>






