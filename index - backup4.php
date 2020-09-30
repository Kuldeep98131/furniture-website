<?PHP
include ('/includes/databaseset.php');

?>

<!DOCTYPE html5>
<html>
   <head>
   
   <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
 <title> MagiSide: Where All The Magic Begins</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
					<h4 style='text-align:center;'>Latest Products </h4>
					
					<?PHP
					$SQL = "SELECT * FROM products ORDER BY productid DESC ";
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
												die;	
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
					if($counter==1 || $counter==4)//insert row at the beginning and after 3 columns are filled.
					{
					echo "<div class='row'>";
					}
					
					echo "<div class='col-md-4' style='padding:10px'>";//product 1-3
					
					$imagelink=$row['imagelink']; //fetching the image link from db.
					
					echo "<img src='$imagelink'   alt='image' width='100%' />";
					
					echo "<button>View Details</button> <button>Add to cart</button>";
					
					echo "</div>";
					
					if($counter==3 || $counter==6) //After row one is filled with 3 images or the 2 rows are filled.
					{
						echo "</div>"; //close the row division
					}
					
					$counter++; //incrementing the counter.
						}
				
						}
								
								?>
				
				<h4 style='text-align:center;'>Top Selling </h4>
					
					<?PHP
					$SQL = "SELECT * FROM products ORDER BY productid DESC ";
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
												die;	
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
					if($counter==1 || $counter==4)//insert row at the beginning and after 3 columns are filled.
					{
					echo "<div class='row'>";
					}
					
					echo "<div class='col-md-4' style='padding:10px'>";//product 1-3
					
					$imagelink=$row['imagelink']; //fetching the image link from db.
					
					echo "<img src='$imagelink'   alt='image' width='100%' />";
					
					echo "<button>View Details</button> <button>Add to cart</button>";
					
					echo "</div>";
					
					if($counter==3 || $counter==6) //After row one is filled with 3 images or the 2 rows are filled.
					{
						echo "</div>"; //close the row division
					}
					
					$counter++; //incrementing the counter.
						}
				
						}
								
								?>
								
			<h4 style='text-align:center;'>Featured Products </h4>
					
					<?PHP
					$SQL = "SELECT * FROM products ORDER BY productid DESC ";
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
												die;	
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
					if($counter==1 || $counter==4)//insert row at the beginning and after 3 columns are filled.
					{
					echo "<div class='row'>";
					}
					
					echo "<div class='col-md-4' style='padding:10px'>";//product 1-3
					
					$imagelink=$row['imagelink']; //fetching the image link from db.
					
					echo "<img src='$imagelink'   alt='image' width='100%' />";
					
					echo "<button>View Details</button> <button>Add to cart</button>";
					
					echo "</div>";
					
					if($counter==3 || $counter==6) //After row one is filled with 3 images or the 2 rows are filled.
					{
						echo "</div>"; //close the row division
					}
					
					$counter++; //incrementing the counter.
						}
				
						}
								
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