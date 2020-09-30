<?PHP  /* This page destroys the session which was set in login page. It then redirects the user 
to login page. */

session_start();
session_destroy();

?>
<?PHP  /* This php code checks if the user has logged in by checking the session whether it has a value or it is
			null. This code must be put before any html otherwise error messages will be displayed*/

		session_start();

		if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

			header ("location: adminlogin.php");

		}

			?>