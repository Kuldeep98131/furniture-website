<?php
// Database credentials
                        $user_name = "root";
						$pass_word = "";
						$database = "ncenafic_commerce";
						$server = "127.0.0.1";  /* connecting to the database */
						$db_handle = mysqli_connect($server, $user_name, $pass_word, $database);
						$db_found = mysqli_select_db($db_handle, $database);
						$conn = mysqli_connect($server,$user_name,$pass_word,$database);
						?> 