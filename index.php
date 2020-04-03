<?php
if(isset($_SESSION["username"])){
  header("Location:home");
  exit(); }
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
    <nav class="fixed" id="navi">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo"><img src="img/quara.png" width="160px" height="50px" alt="quara logo"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Home</a></li>
                <li><a href="login">Login</a></li>
                <li><a href="signup">Signup</a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li><a href="#">Home</a></li>
        <li><a href="login">Login</a></li>
        <li><a href="signup">Signup</a></li>
    </ul>

    <div class="no-pad-bot" id="index-banner">
        <div class="container">
        <br><br>
        <h2 class="header left orange-text">Send Rumors You've Heard About Anyone Online</h2>
        <div class="row center">
            <h5 class="header col s12" style="color:white;">Get to know things about yourself that you didnt know before now</h5>
        </div>
        <div class="row center">
            <a href="signup" id="download-button" class="btn-large waves-effect waves-light orange">Start receiving messages</a>
        </div>
        <br><br>

        </div>
    </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4 z-depth-3" style="margin-top:10px; ">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Anonymity</h5>
            <p>What is fun about quara is that you dont have to know who is sending the messages to you</p>
          </div>
        </div>

        <div class="col s12 m4 z-depth-3" style="margin-top:10px;">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Safe and secure</h5>

            <p>You have the freedom to say anything you want because the reciever dont know your name</p>
          </div>
        </div>

        <div class="col s12 m4 z-depth-3" style="margin-top:10px;">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Easy to use</h5>

            <p>Quara is very easy to use , creating a profile on quara takes less than 2seconds. create an account now</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Let's have fun as we stay safe in this trying times</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background3.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer teal">
    <div class="footer-copyright">
      <div class="container">
      Made with &hearts; by  <a class="brown-text text-lighten-3" href="#">finify</a>
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
