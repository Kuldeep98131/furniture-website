<?PHP
include ('../includes/databaseset.php');

$message1=''; //This initializes the variable;
$check=1;

if(isset($_POST['login']))
{    $p='12345qwertyuodhgsmmfsfmserjemsmsemsmensmandmwsmssmfhewe34msmfsf';

	$email=$_POST['email'];
	$pass1=$_POST['password'];
	$secretcode=$_POST['secretcode'];
	
	$dbh=new PDO("mysql:dbname=$database;host=$server", $user_name, $pass_word);
	$sql=$dbh->prepare("SELECT * FROM adminlogin WHERE email=? ");
	
	$sql->execute(array($email));
	
	while($r=$sql->fetch())
	{
  $p=$r['pass'];
  $email=$r['email'];
  
    }
	
	$site_salt="myencryption";
	
	$salted_hash = hash('sha256',$pass1.$site_salt);
	
	$p = hash('sha256',$p.$site_salt);
	
	if( $p!=$salted_hash) //Compare passwords.
		{
			//failed login
			$message1="<p style='color:red;'>Wrong login credentials!</p>";	 
		
			$check=0;
		
		}
		
		if($secretcode!=='magic')
		
		{
			$message1="<p style='color:red;'>Wrong secret code!</p>";	 
			$check=0;
		}
		
		if($check==1)
		{
						//creating the login session 
						session_start();						
						$_SESSION['login'] = "admin12345"; /*Sets the session to admin12345*/
						
						//end of creation of login session
						header("location:index.php");
						
		}
		
}

?>


<!DOCTYPE html5>
<html>
   <head>
   
   <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
 <title> MagiSide: Where All The Magic Begins</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  
	   <!--The code includes jquery code -->
	<script type="text/javascript" src="../jquery/jquery-3.4.1.min.js"></script>
	<!-- End of jquery file inclusion -->
	
      <!-- Bootstrap -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 
         queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page  
	  
	         via file:// -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
            html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
            respond.min.js"></script>
      <![endif]-->
	  
	  <!-- Beginning of sticky menu CSS code-->
	<style>
body {
  margin: 0;
  font-size: 14px;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  background-color: #f1f1f1;
  padding: 5px;
  text-align: center;
}

#navbar {
  overflow: hidden;
  background-color: #333;
   z-index: 9999;
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #4CAF50;
  color: white;
}

.content {
  padding-top: 5px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}
div.topped {
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}
</style>
	
	
	<!-- End of sticky menu CSS -->
	 
   </head>
   
   <body>
   <div class="container-fluid">
   
   <div class="row">
	  <div class='col-md-12' style='background-color: #333;'>
			
			<div id='navbar'>
				<div class='col-md-2' style='border-radius:60px; color:white; padding: 10px; text-align:center; box-shadow: 
			inset 10px -10px 0px white, inset -10px 10px 0px white; '>
			<p style='font-size: 25px; padding:0;'>Magi<i>Side</i></p>
				<h5 style="font-family: 'Pacifico', cursive;">Where All the Magic Begins</h5>
			</div>	<br />
			<i style='color: #333; float: left; padding-right: 10%'>MagiSide</i>
						<a href='index.php'  class='active'>Home</a>
						<a href='products.php' style=''>Products</a>
						<a href='categories.php' style=''>Categories</a>
						<a href='fulfilled.php' style=''>Fulfilled Orders</a>
						<a href='adminupload.php' style=''>Add new Product</a>
						<a href='logout.php' style='float:right;'>Logout</a>
						  
			</div>	  
	  </div>
	  </div>
						  <div class="row"> <!-- Start of padding row -->
							  <div class='col-md-12' style='padding-top:15px'>
							  </div>
						  </div> <!-- End of padding row -->
	 
			
			<div class="row" style='background-color:silver;' >
				  <div class='col-md-3' style='padding-top:0px; '> <!-- Left vertical menu -->
				  
				  
				  </div>
				  
				 <div class='col-md-6' style='padding-bottom:300px; background-color:white; text-align:center;'> <!-- right side with products -->
				  
				  <?PHP echo $message1;   ?>
					Fill the fields below to login.
					<form action=''   method='POST'>
							<p><input type='text'  name='email' placeholder='Email' required  />
							
							<p><input type='password'  name='password' placeholder='Your password' required  />
							
							<p><input type='text'  name='secretcode' placeholder='Your secret' required  />
						
						<br />
							<input type='submit' name='login'  value='Login'  />
						
					</form>
			
				</div>  <!--End of 9 column for products -->
			</div>
				  
				 
	<?PHP
include ('../includes/footer.php'); //the upper part of the website. 

	?>	 
	 
   </div> <!-- End of container fluid -->
   </body>
   </html>