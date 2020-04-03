<?php
session_start();
$username = $_SESSION['username'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Quara msg</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <style>
   #textcopy:hover{
       cursor:pointer;
   }
    </style>
</head>
<body>
    <nav class="fixed" id="navi">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo"><?php echo $username;?>'s Profile </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../phpfiles/logout.php">logout</a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li><a href="../phpfiles/logout.php">logout</a></li>
    </ul>

    <div class="no-pad-bot" id="index-banner">
        <div class="container">
        <br><br>
        <div class="row center">
            <div class="card large" style="height:auto;">
                <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/dancing.gif">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Welcome to your profile <?php echo $username;?><i class="material-icons right">share</i></span>
                    <h6>https://mp3crib.com/msg.php?name=<?php echo $username;?> <i class="material-icons ">content_copy</i></h6>
                    <h5>Share your profile link to get responses from your friend. <br>Go to "View Messages" to check out the responses</h5>
                    <div class="row center">
                        <a href="messages.php" style="width:100%;" id="download-button" class="btn-large waves-effect waves-light orange">View Messages <i class="material-icons right">send</i></a>
                    </div>
                    <div class="row center">
                        <a style="width:100%;" id="download-button" class="btn-large left waves-effect waves-light green-ligh" href="whatsapp://send?text=Write *Something you heard about me* 😉 I won't know who wrote it.. 😂❤ 👉   https://mp3crib.com/msg.php?name=<?php echo $username;?> " data-action='share/whatsapp/share'>Share via Whatsapp <i class='material-icons right'>share</i></a>
                    </div>
                </div>
                <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">SHARE ON<i class="material-icons right">close</i></span>
                <div class="row center">
                    <a style="width:100%;" id="download-button" class="btn-large left waves-effect waves-light green-ligh" href="whatsapp://send?text=Write *Something you heard about me* 😉 I won't know who wrote it.. 😂❤ 👉   https://mp3crib.com/msg.php?name=<?php echo $username;?> " data-action='share/whatsapp/share'>Share via Whatsapp <i class='material-icons right'>share</i></a>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>


  

  <footer class="page-footer teal">
    <div class="footer-copyright">
      <div class="container">
      Made with &hearts; by  <a class="brown-text text-lighten-3" href="#">finify</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script>
        function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Copied the text: " + copyText.value);
    }
  </script>

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
