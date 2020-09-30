<?PHP
include ('databaseset.php');

$newcategory=$_POST['newcategory']; //get details

	$conn1 = new mysqli($server, $user_name, $pass_word, $database);
	if ($conn1->connect_error)
		{
		die("Connection failed: " . $conn1->connect_error);
		}
		// prepare and bind
	$statement = $conn1->prepare("INSERT INTO categories (category)
	VALUES (?)");
	$statement->bind_param("s", $newcategory);

	$statement->execute();

	$statement->close();
	$conn1->close();

	echo "<h2> You have successfully created  '$newcategory' category. </h2>";
	
?>




 <button id='continue1' ><a href=''> Back to Categories Interface  </a></button>
 
<br />