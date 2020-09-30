<?PHP
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

include ('/includes/databaseset.php');

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
						<a href='' style=''>About Us</a>
						<a href='' style=''>Contacts</a>
						<a href='checkout.php' style='float:right;'>View Cart</a>
						  
			</div>	  
	  </div>
	  </div>
						  <div class="row"> <!-- Start of padding row -->
							  <div class='col-md-12' style='padding-top:15px'>
							  </div>
						  </div> <!-- End of padding row -->
	 
			
				<div class="row" style='background-color:silver;' >
				  <div class='col-md-3' style='padding-top:0px; '> <!-- Left vertical menu -->
				  
						<a href=''  >Search</a> <br />
						<a href='' style=''>Filter by Price</a> <br />
						<a href='' style=''>Filter by Color</a> <br />
						<a href=''  >Search</a> <br />
						<a href='' style=''>Filter by Price</a> <br />
						<a href='' style=''>Filter by Color</a> <br />
						<a href='' style=''>Categories</a> <br />
				  
				  </div>
				  
				  <div class='col-md-9' style='padding-top:0px; background-color:white;'> <!-- right side with products -->
				  
				  <?PHP //START of BLOCK 1  ?>
				  <div class='row' >
				  
					<h4 style='text-align:center;'>Latest Arrivals </h4>
					
					<?PHP
					
					$id=1; //setting the initial id value
					$combined=">=$id"; //Combining intial logic.
					
					$check=0; //initial value for check variable.
					
					if(isset($_POST['next1']))   //This checks if the next button has been clicked
					
						{
							$id=$_POST['id'];
							$combined="<=$id";
							$check=1; //this value is checked before back is displayed. If Next buton was not clicked, it's not shown.
						}
						
					if(isset($_POST['back1']))   //This checks if the back button has been clicked
					
						{
							$id=$_POST['id'];
							$combined=">=$id";
							$check=1; //this value is checked before back is displayed.
						}
					
					
					$SQL = "SELECT * FROM products WHERE productid $combined ORDER BY productid DESC ";
					$result1 = mysqli_query($conn, $SQL);
						if(!$result1)//checking whether the database connection has been successful
							{
								echo 'Database error';
									die;	
							}
						$num_rows1 = mysqli_num_rows($result1);
												
									if ($num_rows1 < 1)
												{
												echo "<p style='color: red;'>Products not found.</p>";
												//die;	
												}	
						else
						{
				$counter=1; //setting the initial value
					while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))   
	
						{
				if($counter>6) //Two rows, each of 3 columns will have been filled by this loop count value.
				{
					
					break;
				}
					
					
					echo "<div class='col-md-4' style='padding:10px'>";//column div
					
					$imagelink=$row['imagelink']; //fetching the image link from db.
					$id=$row['productid']; //fetching the last product id.
					$productid=$row['productid'];
					$productname=$row['productname'];
					$offerprice=$row['offerprice'];
					$price=$row['price'];
					
					$form1="form$productid";
					$results1="results$productid";
					$redirect="redirect$productid";
					$trend="trend$productid";
					$loading="loading$productid";
					$addbutton="add$productid";
					
					echo "<h4 style='background-color:silver;'> $productname  </h4>";
					echo "<img src='$imagelink'   alt='image' width='100%' />";
					
					echo "<strong> AUD $offerprice </strong> <br />";
					
					if($price>0) //meaning #price was set. I.e offerprice is a requirement but #price is not. so it can also have not been set.
					{
					echo "<strong> <del>AUD $price</del> </strong> <br />";
					}
					
					//Form to submit details asyncronously.
				echo"	
					<form id= '$form1' >
        <input type='hidden' name='visitorid' value=$visitorid >
        <input type='hidden' name='productid' value='$productid' >
		
		<input type='submit' name='add' id='$addbutton' value='Add to cart'>
		
	    <button><a href='view.php?productid=$productid&view=1' > View Details </a></button>
		
			<div style='padding: 0px; background-color: black; color: white; position: fixed; top: 30%; left: 20%; z-index:400000; width: 60%; text-align:center' id='$results1'> </div>		
					</form>
					";
				//End of form to submit details asynchronously.
				
				//Various displays.
		echo "<p id='$trend'style='text-align:right'></p> 
			<img src='loading.gif' id='$loading' alt='loading' style='display:none;' />
			";
				
				//End of various ajax displays.
		
		//Beginning of JavaScript
		echo"
				<script type='text/javascript'>
					//beginning of data transfer to backend PHP file
					
				$(document).ready(function(){
						
						var form1 = '$form1';
						var results1='$results1';
						var addbutton='$addbutton';
						
			//End of data transfer to backend PHP file
				
				//Beginning of hide  'Add to Cart' button
				$('#'+addbutton).click(function() 
				{
				$('#'+addbutton).hide();
				});
				
				//End of hide  'Add to Cart' button
				
					 $('#'+form1).submit(function(event){
						// Stop form from submitting normally
						event.preventDefault();
						
						/* Serialize the submitted form control values to be sent to the web server with the request */
						var formValues = $(this).serialize();
						
						// Send the form data using post
						$.post('includes/add_process.php', formValues, function(data){
							// Display the returned data in browser
							$('#'+results1).html(data);
						});
					});
				});
				
				</script>
					";
		
		//End of JavaScript
					echo "</div>"; //close column div
										
					$counter++; //incrementing the counter.
						}
				
						}
				
								
			
								?>
			</div>  <!--Enclosing row within a column -->
			
			<?PHP
			echo "<form name='form1' method='POST' action='' enctype='multipart/form-data'>
					<br />
					
					<p><input type='hidden'  name='id' value=$id  />
					<input type = 'submit' name = 'next1' value = 'Next Page>>>'>
					</form>" ;
					
					if($check==1)
					{
				echo "<form name='form1' method='POST' action='' enctype='multipart/form-data'>
					<br />
					
					<p><input type='hidden'  name='id' value=$id  />
					<input type = 'submit' name = 'back1' value = '<<<Go Back'>
					</form>" ;	
					}
			
			
			?>
			
			<?PHP
			//END of BLOCK 1
			?>
			
			 <?PHP //START of BLOCK 2  ?>
				  <div class='row' >
				  
					<h4 style='text-align:center;'>Featured Products </h4>
					
					<?PHP
					
					$id=1; //setting the initial id value
					$combined=">=$id"; //Combining intial logic.
					
					$check=0; //initial value for check variable.
					
					if(isset($_POST['next2']))   //This checks if the next button has been clicked
					
						{
							$id=$_POST['id'];
							$combined="<=$id";
							$check=1; //this value is checked before back is displayed. If Next buton was not clicked, it's not shown.
						}
						
					if(isset($_POST['back2']))   //This checks if the back button has been clicked
					
						{
							$id=$_POST['id'];
							$combined=">=$id";
							$check=1; //this value is checked before back is displayed.
						}
					
					
					$SQL = "SELECT * FROM products WHERE productid $combined ORDER BY productid DESC ";
					$result1 = mysqli_query($conn, $SQL);
						if(!$result1)//checking whether the database connection has been successful
							{
								echo 'Database error';
									die;	
							}
						$num_rows1 = mysqli_num_rows($result1);
												
									if ($num_rows1 < 1)
												{
												echo "<p style='color: red;'>Products not found.</p>";
												//die;	
												}	
						else
						{
				$counter=1; //setting the initial value
					while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))   
	
						{
				if($counter>6) //Two rows, each of 3 columns will have been filled by this loop count value.
				{
					
					break;
				}
					
					
					echo "<div class='col-md-4' style='padding:10px'>";//column div
					
					$imagelink=$row['imagelink']; //fetching the image link from db.
					$id=$row['productid']; //fetching the last product id.
					
					echo "<img src='$imagelink'   alt='image' width='100%' />";
					
					echo "<button>View Details</button> <button>Add to cart</button>";
					
					echo "</div>"; //close coulmn div
										
					$counter++; //incrementing the counter.
						}
				
						}
				
								
			
								?>
			</div>  <!--Enclosing row within a column -->
			
			<?PHP
			echo "<form name='form1' method='POST' action='' enctype='multipart/form-data'>
					<br />
					
					<p><input type='number'  name='id' value=$id  />
					<input type = 'submit' name = 'next2' value = 'Next Page'>
					</form>" ;
					
					if($check==1)
					{
				echo "<form name='form1' method='POST' action='' enctype='multipart/form-data'>
					<br />
					
					<p><input type='number'  name='id' value=$id  />
					<input type = 'submit' name = 'back2' value = 'Go Back'>
					</form>" ;	
					}
			
			
			?>
			
			<?PHP
			//END of BLOCK 2 
			?>
			
			
			 <?PHP //START of BLOCK 3  ?>
				  <div class='row' >
				  
					<h4 style='text-align:center;'>Top Selling </h4>
					
					<?PHP
					
					$id=1; //setting the initial id value
					$combined=">=$id"; //Combining intial logic.
					
					$check=0; //initial value for check variable.
					
					if(isset($_POST['next3']))   //This checks if the next button has been clicked
					
						{
							$id=$_POST['id'];
							$combined="<=$id";
							$check=1; //this value is checked before back is displayed. If Next buton was not clicked, it's not shown.
						}
						
					if(isset($_POST['back3']))   //This checks if the back button has been clicked
					
						{
							$id=$_POST['id'];
							$combined=">=$id";
							$check=1; //this value is checked before back is displayed.
						}
					
					
					$SQL = "SELECT * FROM products WHERE productid $combined ORDER BY productid DESC ";
					$result1 = mysqli_query($conn, $SQL);
						if(!$result1)//checking whether the database connection has been successful
							{
								echo 'Database error';
									die;	
							}
						$num_rows1 = mysqli_num_rows($result1);
												
									if ($num_rows1 < 1)
												{
												echo "<p style='color: red;'>Products not found.</p>";
												//die;	
												}	
						else
						{
				$counter=1; //setting the initial value
					while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))   
	
						{
				if($counter>6) //Two rows, each of 3 columns will have been filled by this loop count value.
				{
					
					break;
				}
					
					
					echo "<div class='col-md-4' style='padding:10px'>";//column div
					
					$imagelink=$row['imagelink']; //fetching the image link from db.
					$id=$row['productid']; //fetching the last product id.
					
					echo "<img src='$imagelink'   alt='image' width='100%' />";
					
					echo "<button>View Details</button> <button>Add to cart</button>";
					
					echo "</div>"; //close coulmn div
										
					$counter++; //incrementing the counter.
						}
				
						}
				
								
			
								?>
			</div>  <!--Enclosing row within a column -->
			
			<?PHP
			echo "<form name='form1' method='POST' action='' enctype='multipart/form-data'>
					<br />
					
					<p><input type='number'  name='id' value=$id  />
					<input type = 'submit' name = 'next3' value = 'Next Page'>
					</form>" ;
					
					if($check==1)
					{
				echo "<form name='form1' method='POST' action='' enctype='multipart/form-data'>
					<br />
					
					<p><input type='number'  name='id' value=$id  />
					<input type = 'submit' name = 'back3' value = 'Go Back'>
					</form>" ;	
					}
			
			
			?>
			
			<?PHP
			//END of BLOCK 3
			?>
			
			
			
				
				
										
								</div>  <!--End of 9 column for products -->
				  </div>
				  
				 
	<div class="row" style='background-color:black; color:white; padding-top:20px; padding-bottom:20px;' >
			<div class='col-md-12' >
						<p style='text-align:center;'> All Rights Reserved </p>
						<p style='text-align:center;'> Copyright (C)2020 </p>
			</div>
	</div>
	 
   </div> <!-- End of container fluid -->
   </body>
   </html>