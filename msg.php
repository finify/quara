<?php
session_start();
require('phpfiles/dbconnect.php');//DBCONNECTION

if($_GET['name']== ""){//check if name get var is present
    header("Location: index.php");
    exit(); 
}
$username = $_GET['name'];//check if user exits
$query = "SELECT * FROM `q_users` WHERE username='$username'";
$result = mysqli_query($con,$query) ;
	$rows = mysqli_num_rows($result) ;
	if($rows!=1)
	{
		header("Location:index.php");
	}

?>
<?php
    if (isset($_REQUEST['yourmessage']))
    {
        $yourmessage = stripslashes($_REQUEST['yourmessage']);
        $yourmessage = mysqli_real_escape_string($con,$yourmessage);
        $currentdate = date("Y/m/d");
        $currenttime = date("h:i:s A");
        
        //insert into userprofile//
            $query1 = "INSERT  into `q_messages` 
            (receiver,messagetxt,datesent,timesent)
            VALUES 
            ('$username','$yourmessage','$currentdate','$currenttime')";
            $result1 = mysqli_query($con,$query1);
            if($result1)
            {
                $_SESSION['msgsent'] = "yes";
                // Redirect user to index.php
                header("Location:signup");
            }

    }else{
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Quara msg</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

    <div class="no-pad-bot" id="index-banner">
        <div class="container">
        <br><br>
        <div class="row center">
            <div id="card" style="height:auto;" class="card large">
                <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="img/msggif.gif">
                </div>
                <div class="card-content">
                <h4>Say Something About <?php echo $_GET['name'] ?> .....</h4>
                <span class="card-title activator grey-text text-darken-4">Say what you think or what you have heard about <?php echo $_GET['name'] ?> or Leave a feedback for <?php echo $_GET['name'] ?> anonymously using the form below.. 🥰🥰 
                Thank You!! 😍😊 </span>
                <form class="login col s12" METHOD="POST">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea style="height:120px;" id="textarea2" class="materialize-textarea" name="yourmessage" data-length="120" required></textarea>
                            <label for="textarea2">Say something you heard about me</label>
                        </div>
                    </div>
                    <button  style="width:100%; color:white;  border-radius:25px;" class="waves-effect waves-light btn-large orange"  type="submit" id="button"> send message <i class="material-icons right">send</i></button>
                    

   
                   
                </form>
                <p><a href="#">By using this service you agree to our Privacy Policy. Terms of Service and any related policies.</a></p>
                </div>
            </div>
        </div>

        </div>
    </div>


  

  <footer class="page-footer teal">
    <div class="footer-copyright">
      <div class="container">
      Made with &hearts; by  <a class="brown-text text-lighten-3" href="http://materializecss.com">finify</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127419768-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127419768-2');
</script>
  </body>
</html>

<?php     }?>