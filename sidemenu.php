<div class='col-md-3' style='padding-top:0px; '> <!-- Left vertical menu -->
				  
					<form name='formsearch' method='GET' action='search.php' >
					<br />
					
					<p><input type='text'  name='search' placeholder='Search'  maxlength='50' required />
					<input type = 'submit' name = 'searching' value = 'Search'>
					</form>
					
					<h4 style='color:blue;' >Filtered Search </h4>
					
					<form name="form_custom_search" method="GET" action="customsearch.php" >
					<label> Price </label>
					<select  name='searchprice' >
					<option value="20">Less than 20</option>
					<option value="100">Less than 100</option>
					<option value="200">Less than 200</option>
					<option value="500">Less than 500</option>
					<option value="1000">Less than 1,000</option>
					<option value="5000">Less than 5,000</option>
					<option value="50000">Less than 50,000</option>
					<option value="greaterThan">Greater than 50,000</option>
					</select>
					
					<p><label> Category </label>
					<select  name='searchcategory' >
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
					
					<label> Product Condition </label>
					<select  name='productcondition' >
					<option value="new">New Products</option>
					<option value="second_hand">Second Hand Products</option>
					<option value="featured">Featured New Products</option>
					
					</select>
					
					<p style='text-align:center;' > <input type = "submit" name = "customsearch" value = "Apply Filter" /> </p>
					</form>

						
				  
				  </div>