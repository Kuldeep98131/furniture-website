<?PHP
include ('databaseset.php');

$productid=$_POST['productid']; //get product ID
$visitorid=$_POST['visitorid']; //Get visitor ID 

	
	//Start of fetch product details
	$SQL = "SELECT * FROM products WHERE productid =$productid ";
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
		while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))
			{
			$imagelink=$row['imagelink'];
			$productid=$row['productid'];
			$productname=$row['productname'];
			$description=$row['description'];
			$offerprice=$row['offerprice']; 
			}
		}
		
	//End of fetch product details
	
	//Start of insert product details into orders1
	$conn1 = new mysqli($server, $user_name, $pass_word, $database);
	if ($conn1->connect_error)
		{
		die("Connection failed: " . $conn1->connect_error);
		}
		// prepare and bind
	$statement = $conn1->prepare("INSERT INTO orders1 (productid, productname, productprice, imagelink, productdescription, visitorid)
	VALUES (?,?, ?,?,?,?)");
	$statement->bind_param("ssssss", $productid, $productname, $offerprice, $imagelink, $description, $visitorid);

	$statement->execute();

	$statement->close();
	$conn1->close();
	//End of insert product details into orders1
?>


<h2> You have added an item to a cart </h2>

<button><a href='checkout.php'> Checkout    </a> </button>
<br />

 <button id='continue1' ><a href=''> Continue shopping  </a></button>
 
<br />