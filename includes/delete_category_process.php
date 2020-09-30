<?PHP
include ('databaseset.php');

$categoryid=$_POST['categoryid']; //get product ID

	$status='removed';
					
					$conn4 = new mysqli($server, $user_name, $pass_word, $database);
							if ($conn4->connect_error)
						{
						die("Connection failed: " . $conn4->connect_error);
						}
						
			if ($stmt = $conn4->prepare("UPDATE categories SET status = ? WHERE categoryid = ? ")) 
			{
 
			// Bind the variables to the parameter as strings. 
			$stmt->bind_param("ss", $status, $categoryid);
 
			// Execute the statement.
			$stmt->execute();
 
			// Close the prepared statement.
			$stmt->close();
			$conn4->close();
 
		
			}
	
?>


<h2> You have deleted the category from the database. </h2>

 <button id='continue1' ><a href=''> Back to Categories Interface  </a></button>
 
<br />