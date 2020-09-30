<?PHP
include ('../includes/adminheader.php'); //the upper part of the website. 

?>	 
			
				<div class="row" style='background-color:silver;' >
				  <div class='col-md-3' style='padding-top:0px; '> <!-- Left vertical menu -->
				  
				  
				  </div>
				  
				  <div class='col-md-9' style='padding-bottom:300px; background-color:white;'> <!-- right side with products -->
				  
			<?php
$token=0; //This variable will be checked before the file link is inserted as a comment			
$target_dir ="../uploads/"; /*This variable stores the address of the location of uploaded files in relation to the admin folder    */
$display_dir ="uploads/"; /*This variable stores the address of the location of uploaded files in relation to the root folder    */

$_SESSION['filename'] = ''; /*This session takes care of error displays which appear when no file has been uploaded   */
$uploadOk = 1;
					$x='0';
				while($x=='0') /* This loop encloses all the php code. This is intended to help when their is an error, the break command
to go to the end of the loop.*/
				{
					
					/*These message session variables are intented to assign different messages at different instances. The sessions are
				better since they are global, not local*/
				$_SESSION['message1']='';
				$_SESSION['message2']='';
				$_SESSION['message3']='';
				$_SESSION['message4']='';
				$_SESSION['message5']='';
				
				$x++; /*This code is part of the while loop*/
			if (isset($_POST['submit3'])) {
				
				
// Check if image file is a actual image or fake image

	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); 
	
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    


// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    
	$_SESSION['message1']="File not uploaded. Your file is too large. <br /> <a href='' > Click here to go back </a>";
    $uploadOk = 0;
	break;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "jpeg" 
&& $imageFileType !="" )

 /*The last file type here with empty file type ie 
$imageFileType="" works wonders. It helps reject other file types and at the same time avoid only jpg,png messages being displayed when
 the order does not have a file  */  
		 {
			
			$_SESSION['message2']="Your file was not submitted. Only JPG and PNG image file types are allowed. <br /> <a href='' > Click here to go back </a>";
			$uploadOk = 0;
			break;  /* This makes the flow of execution to move out of the loop. So if this is encountered no file is submitted  */
		}
		// Check if $uploadOk is set to 0 by an error

	else {
		
		//giving $target_file a new variable 
		$rename=date('Ymdhis');
		$new_target_file=$target_dir . $rename. basename($_FILES["fileToUpload"]["name"]);   //the new variable 
		
		$image_address=$display_dir . $rename. basename($_FILES["fileToUpload"]["name"]); 
		
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_target_file)) 
	{
       
		$token=1; //The token is enabled at this point. It can be checked outside the loop for further processing.
		$file=basename( $_FILES["fileToUpload"]["name"]);
		
		$filename = str_replace(" ","%20", $file);  /* The function str_replace is used to join whitespaces. In my case
I have joined the white space with %20 used to address spaced filename*/
		
		$new_filename=str_replace(" ","%20", $new_target_file);  //creating the new file address-address from admin folder
		
		$full_image_address=str_replace(" ","%20", $image_address); //this is file address from root folder
		
		
		$_SESSION['filename'] = $filename;
		
		$_SESSION['message4']="<a href='$new_filename'> Your order with image file  $file was uploaded successfully</a>
		<br /> <a href='' > Click here to go back </a>";
		
		$filelink="$full_image_address";  //This image display code is what will be stored in db.
		
		
    }
	else //In case the file fails to be uploaded.
	{
	$_SESSION['message1']="Failed. No product image was uploaded. Be sure to select a product image
	<br /> <a href='' > Click here to go back </a>";	
	}	
		}
		

$filename=$_SESSION['filename'];
/*Block code below checks whether any file was uploaded and assign correct statement to filelink variable*/
$uLength = strlen($filename); /* This function counts the number of characters*/

				if ($uLength <=1) 
				{
				//$filelink='No extra files';	
					
				}
				else
				{
//$filelink="<a href=uploads/$filename>Click to download</a>";
				}
//end of block code to check if any file was uploaded.         

				}
				}
		
?>


<?PHP  //Start of Insert product Details
			if($token==1)
			{
				$offerprice=''; //This is initially set to null.
			
				$productname=$_POST['productname']; 
				$description=$_POST['description']; 
				$price = $_POST['price'];
				$offerprice= $_POST['offerprice'];
				$category=$_POST['category'];
				$productcondition=$_POST['productcondition'];
				
				$imagelink=$filelink; //This has been captured in the file upload section.
				$extraimages='';			

				$conn1 = new mysqli($server, $user_name, $pass_word, $database);
							if ($conn1->connect_error)
						{
						die("Connection failed: " . $conn1->connect_error);
						}
						// prepare and bind
				$statement = $conn1->prepare("INSERT INTO products (productname, description, price, offerprice, imagelink, extraimages, category, productcondition)
				VALUES (?,?, ?,?,?,?, ?, ?)");
					$statement->bind_param("ssssssss", $productname, $description, $price, $offerprice, $imagelink, $extraimages, $category, $productcondition);
				
							
							$statement->execute();

					$statement->close();
						$conn1->close();
			}

		//End of Insert product Details
?>
					<form name="form1" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
					<br />
					
					<p>Product Name: <input type='text'  name='productname' placeholder='Product name' required  /> </p>
			
					<p>Regular Price: <input type='number'  name='price' placeholder='Price' value=''  /> </p>
			
					<p> Offer Price: <input type='number'  name='offerprice' placeholder='Offer price' value=''   /> </p>
					
					<p><i><strong> Note: </strong> Offer price should be less than the regular price. If you only want to enter a single price, fill the offer price field and ignore regular price field.   </i> </p>
					
					<p><label> Category </label>
					<select  name='category' >
					<?PHP
					$SQL = "SELECT * FROM categories WHERE status !='removed' ORDER BY categoryid DESC ";
					$result1 = mysqli_query($conn, $SQL);
						if(!$result1)//checking whether the database connection has been successful
							{
								echo 'Database error';
									die;	
							}
						$num_rows1 = mysqli_num_rows($result1);
												
						if ($num_rows1 < 1)
							{
							//echo "<p style='color: red;'>No category found.</p>";
							die;	
							}

						else
							{
							
							while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))   
		
							{
							$categoryid=$row['categoryid'];
							$category=$row['category'];	
							
							echo "<option value='$category'> $category</option>";
						
							}
							}
						?>					
					
					</select> </p>
					
					<p><label> Product Condition </label>
					<select  name='productcondition' >
					    
					 <option value='new'> New Product</option> 
					 <option value='second_hand'> Second-hand Product</option> 
					 <option value='featured'> Featured Product</option> 
					    
					</select> </p>
					
					<p>					
					<br />
					<strong>Product Description:</strong> <br />
					<textarea name='description' style='width:400px;height:200px;'> </textarea>   
					</p>
					<input type="file" name="fileToUpload" id="fileToUpload"> <br />
					<br />
					<input type = "Submit" name = "submit3" value = "Submit Product Details">
					</form>
					
<?PHP
$message1=$_SESSION['message1'];
$message2=$_SESSION['message2'];
$message3=$_SESSION['message3'];
$message4=$_SESSION['message4'];
$message5=$_SESSION['message5'];

echo "
<div style='padding: 0px; background-color: black; color: white; position: fixed; top: 30%; left: 20%; z-index:400000; width: 60%; text-align:center; font-size:25px; ' >
$message1 $message2 $message3 $message4 $message5
 </div>
	";

?>			
				</div>  <!--End of 9 column for products -->
				  </div>
				  
				 
	<?PHP
include ('../includes/footer.php'); //the upper part of the website. 

	?>	 
	 
   </div> <!-- End of container fluid -->
   </body>
   </html>