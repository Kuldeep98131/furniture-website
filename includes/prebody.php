<?PHP
$currency='INR'; //this sets currency type.

//Beginning of $_COOKIE check
	$pagename=basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */

	if(isset($_COOKIE['visitor'])) //check whether the cookie has been set_error_handler
		{
			$visitorid=$_COOKIE['visitor']; //assigning cookie value as visitorid.
		}
	else //cookie is not set. set it.
		{
		$cookie_name = "visitor"; //assigning cookie name
		$t=date('Ymdhis'); //taking timestamp factor 
		$random_no=mt_rand(10000,10000000000); //random number betw set min ad max values.
		
		$cookie_value = $t.$random_no; //setting a unique cookie value by combining time and random number.
		
		$visitorid=$cookie_value; //cookie value is the same as the visitorid.
		
		setcookie($cookie_name, $cookie_value, time() + (60*60*24 * 7), "/"); 
		
		/* cookie time is in seconds so cookie period is set to 7 days.	It could as well be written as 86400*7 or even 604800 */
		
		}
		
	
	if($pagename=="successful_submission.php") /*if the page is order submission page, a new cookie will be set to avoid showing products which have already been shopped. */
		{
		$cookie_name = "visitor"; //assigning cookie name
		$t=date('Ymdhis'); //taking timestamp factor 
		$random_no=mt_rand(10000,10000000000); //random number betw set min ad max values.
		
		$cookie_value = $t.$random_no; //setting a unique cookie value by combining time and random number.
		
		$visitorid=$cookie_value; //cookie value is the same as the visitorid.
		
		setcookie($cookie_name, $cookie_value, time() + (60*60*24 * 7), "/"); 
		
		}
//End of $_COOKIE check

include ('includes/databaseset.php');

?>

<!DOCTYPE html5>
<html>
   <head>
   
   <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
 <title> MagiSide: Where All The Magic Begins</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  
	   <!--The code includes jquery code -->
	<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
	<!-- End of jquery file inclusion -->
	
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

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
						<a href='about.php' style=''>About Us</a>
						<a href='contacts.php' style=''>Contacts</a>
						<a href='checkout.php' style='float:right;'>View Cart</a>
						  
			</div>	  
	  </div>
	  </div>
						  <div class="row"> <!-- Start of padding row -->
							  <div class='col-md-12' style='padding-top:15px'>
							  </div>
						  </div> <!-- End of padding row -->