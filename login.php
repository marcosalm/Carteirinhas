<?php 

//Connects to your Database 
 mysql_connect("localhost", "root", "acerola") or die(mysql_error()); 
 mysql_select_db("carteirinha") or die(mysql_error());
$username = $_POST['username']; 

$pass = $_POST['password'];


 if (isset($_POST)) { // if form has been submitted


 // makes sure they filled it in

 	if(!$_POST['username'] | !$_POST['password']) {

 		die('You did not fill in a required field.');

 	}

 	// checks it against the database



 	if (!get_magic_quotes_gpc()) {

 		$_POST['email'] = addslashes($_POST['email']);

 	}

 	$check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());



 //Gives error if user dosen't exist

 $check2 = mysql_num_rows($check);

 if ($check2 == 0) {

 		die('That user does not exist in our database. <a href=add.php>Click Here to Register</a>');

 				}

 while($info = mysql_fetch_array( $check )) 	

 {

 $_POST['password'] = stripslashes($_POST['password']);

 	$info['password'] = stripslashes($info['password']);

 	$pass = md5($_POST['password']);



 //gives error if the password is wrong

 	if ($pass != $info['password']) {

 		die('Incorrect password, please try again.');

 	}
 else 

 { 

 
 // if login is ok then we add a cookie 

$_POST['username'] = stripslashes($_POST['username']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['username'], $hour); 
setcookie(Key_my_site, $pass, $hour);	 
 
//then redirect them to the members area 
header("Location: index.php"); 
 } 
} 
} 

else 

{	 

 

 // if they are not logged in 

 ?> 

 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 

 <table border="0"> 

 <tr><td colspan=2><h1>Login</h1></td></tr> 

 <tr><td>Username:</td><td> 

 <input type="text" name="username" maxlength="40"> 

 </td></tr> 

 <tr><td>Password:</td><td> 

 <input type="password" name="pass" maxlength="50"> 

 </td></tr> 

 <tr><td colspan="2" align="right"> 

 <input type="submit" name="submit" value="Login"> 

 </td></tr> 

 </table> 

 </form> 

 <?php 

 } 

 

 ?> 
