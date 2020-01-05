<!DOCTYPE html>
<html>
<head>
	<title>php</title>
</head>
<body>
	hello
<form method="post" action="<?php $SERVER["PHP_SELF"] ?>">
	NAME: <input type="text" name="name">
	Gender:
		Male ee<input type="radio" name="gender" value="male">
		Female <input type="radio" name="gender" value="female">
	<input type="submit"/>
</form>
<?php
 $name=$_POST["name"];
 echo $name;

 ?>
</body>
</html>