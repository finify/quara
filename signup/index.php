<?php
session_start();
if(isset($_SESSION["username"])){
	header("Location: ../home");
	exit(); 
}
//complete form

if(isset($_SESSION["msgsent"])){
	require('signupheader.php');
		echo "<div class='form'>
		<b>your message was sent successfully</b> <br/> <a href='index.php'>Get your own responce from friends now 😍😊</a></div>
		</div>  
		</body>
		</html>";
	session_destroy();
}else{
	$error='';
	$form = '
<form class="login col s12" METHOD="POST">
	<h3><p class="title">Sign Up</p> </h3>
	<p>'.$error.'</p>
	<div class="row">
		<div class="input-field col s12">
			<input placeholder="username" id="user" required name="username" required type="text" class="validate">
			<label style="font-size:22px;" for="user">username</label>
		</div>
	</div>
	
	<div class="row">
		<div class="input-field col s12">
			<input placeholder="*********" id="userpass" required name="userpassword" required type="password" class="validate">
			<label style="font-size:22px;" for="userpass">password</label>
		</div>
	</div>
	
	<div class="row">
		<div class="input-field col s12">
			<input placeholder="*********" id="userpassc" required name="confirmpassword" required type="password" class="validate">
			<label style="font-size:22px;" for="userpassc">confirm password</label>
		</div>
	</div>
	
	<center>
	Already a member
	<br><a style="font-size:20px;" href="../login">Login</a>
	<br>
	</center>
	
	<input type="submit" id="button" value="Sign Up" name="submit"/>
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
</html>
	';

  require('../phpfiles/dbconnect.php');
  // If form submitted, insert values into the database.
if (isset($_REQUEST['username']))
{
  //cleaning input for db upload
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
  	$userpassword = stripslashes($_REQUEST['userpassword']);
	$userpassword = mysqli_real_escape_string($con,$userpassword);
  $confirmpassword = stripslashes($_REQUEST['confirmpassword']);//confirm password
	$confirmpassword = mysqli_real_escape_string($con,$confirmpassword);
  
	if($confirmpassword==$userpassword)
	{
		$query = "SELECT * FROM `q_users` WHERE username='$username' " ;//query to select input with same details as in db
		$result = mysqli_query($con,$query);
		$rows = mysqli_num_rows($result);
				if($rows==1)//if user already exist
				{
					require('signupheader.php');
						echo "<div class='form'>
						This Username is registered already <br/><a href='index.php'>Try Again</a></div>
						</div>  
						</body>
						</html>";
						die();
				}else{
					//insert into userprofile//
					$query1 = "INSERT  into `q_users` 
					(username,userpassword)
					VALUES 
					('$username','$userpassword')";
					$result1 = mysqli_query($con,$query1);
					if($result1)
					{
						require('signupheader.php');
						echo "<div class='form'>
						You are registered successfully <a href='../login'>Login</a></div>
						</div>  
						</body>
						</html>";
						die();
					}
				}
	}else{
		require('signupheader.php');
		echo "<div class='form'>
		<b>Password Do not match</b> <a href='index.php'>Try Again</a></div>
		</div>  
		</body>
		</html>";
		die();
	}
}else{
	require('signupheader.php');
	echo $form;
}
}

?>