<?php
session_start();
if(isset($_SESSION["username"])){
	header("Location: ../home");
	exit(); }
require('../phpfiles/dbconnect.php');//DBCONNECTION

if (isset($_POST['username']))
{
    // removes backslashes
	$username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);	
	$userpassword = stripslashes($_REQUEST['userpassword']);
	$userpassword = mysqli_real_escape_string($con,$userpassword);
	//Checking is user existing in the database or not
	$query = "SELECT * FROM `q_users` WHERE username='$username' and userpassword='$userpassword' ";
	
	FUNCTION error(){
	echo '<form class="login col s12" METHOD="POST"  >
    <h3><p class="title">Log in</p></h3>
    <p class="title" style="color:red;">Wrong user and password combination</p>
    <div class="row">
			<div class="input-field col s12">
				<input placeholder="Placeholder" id="first_name" name="username" required type="text" class="validate">
				<label style="font-size:22px;" for="first_name">username</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="*********" id="pass" name="userpassword" required type="text" class="validate">
				<label style="font-size:22px;" for="pass">Password</label>
			</div>
		</div>
	<center>
	Not yet a member
	<br><a style="font-size:20px;" href="../signup">Signup</a>
	<br>
	</center>
    <input type="submit" id="button" value="Login"/>
	</form>
	<footer><a target="blank" href="#">A FINIFY PRODUCTION</a></footer>
	</div>

	<!--  Scripts-->
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/materialize.js"></script>
	<script src="../js/init.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127419768-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag("js", new Date());

  gtag("config", "UA-127419768-2");
</script>
	</body>
	</html>';
	}
	
	$result = mysqli_query($con,$query) ;
	$rows = mysqli_num_rows($result) ;
	if($rows==1)
	{
		$_SESSION['username'] = $username;
		// Redirect user to index.php
		header("Location:../home");
	}else{
		require('header.php');
		error();
	}
}else{

	require('header.php');
?>
	<form class="login col s12" METHOD="POST">
		<h3><p class="title">Log in</p></h3>
		<h6> Recieve anonymous compliments from your friends and send anonymous messages to your friends for free.</h6>
		<br/>

		<div class="row">
			<div class="input-field col s12">
				<input placeholder="enter your username" id="first_name" name="username" required type="text" class="validate">
				<label style="font-size:22px;" for="first_name">username</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="*********" id="pass" name="userpassword" required type="text" class="validate">
				<label style="font-size:22px;" for="pass">Password</label>
			</div>
		</div>
		<input  type="submit" id="button" value="Login"/>
		<center>
		Not yet registered
		<br><a style="font-size:20px;" href="../signup">Signup</a>
		<br>
		
		</center>

		
	</form>
	<footer><a target="blank" href="#">A FINIFY PRODUCTION</a></footer>
</div>

 <!--  Scripts-->
 <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
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
<?php } ?>
