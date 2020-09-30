<?php
//To delete a cookie, you will need to set it to past time.
// set the expiration date to one hour ago (time which has laready past. 
setcookie("user", "", time() - 3600);
?>
<html>
<body>

<?php
echo "Cookie 'user' is deleted.";
echo "Value is: " . $_COOKIE['user'];
?>

</body>
</html>