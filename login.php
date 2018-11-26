<?php
session_start();

$username = "banana";
$password = "12orange34";

if(isset($_POST['submit'])) {
	if(trim($_POST['username']) == "") {
		$message = "<p><strong>Please provide a user name!</strong></p>\n";
	}
	else if(trim($_POST['password']) == "") {
		$message = "<p><strong>Please provide a password!</strong></p>\n";
	}
	else {
		if($_POST['username'] == $username && $_POST['password'] == $password) {
			$_SESSION['login'] = 'true';
			header("Location: admin.php");
			exit;
		}
		else {
			$message = "<p><strong>Sorry, the user name and password you entered were incorrect.</strong> Please try again. Note that your user name and password are case-sensitive.</p>\n";	
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--
		A Charity Donation Recognition System Using PHP, MySQL, JavaScript And DOM
		Copyright 2007 Doug Vanderweide, dba Rescue-ME

		This program is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 3 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program.  If not, see <http://www.gnu.org/licenses/>.
	-->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>A Charity Donation Recognition System Using PHP, MySQL, JavaScript And DOM Login Page</title>
		<link href="../demo.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>
			A Charity Donation Recognition System<br />
			Using PHP, MySQL, JavaScript And DOM<br />
			Login Page
		</h1>
		<p>The demo user name is <span style="color: #00f;">banana</span> and the demo password is <span style="color: #00f;">12orange34</span></p>
		<?php echo $message; ?>
		<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<p>
				<label for="username">User Name: </label>
				<input name="username" type="text" id="username" size="20" maxlength="20" value="<?php echo $_POST['username']; ?>" />
			</p>
			<p>
				<label for="password">Password: </label>
				<input name="password" type="password" id="password" size="20" maxlength="20" />
			</p>
			<p>
		  	  	<input name="submit" type="submit" id="submit" value="Submit" />
			</p>
		</form>
		<p><a href="http://www.dougv.com/blog/2007/11/21/a-charity-donation-recognition-system-using-php-mysql-javascript-and-dom/">A Charity Donation Recognition System Using PHP, MySQL, JavaScript And DOM</a></p>
	    <p><a href="twocolor.php">Example 1: Two-Color Image</a></p>
	    <p><a href="index.php">Example 2: Standard Image</a></p>
	</body>
</html>