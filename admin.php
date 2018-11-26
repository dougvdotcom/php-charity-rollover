<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] != 'true') {
	header("Location: login.php");
}

if(isset($_POST['submit'])) {
	if(trim($_POST['name']) == "") {
		$message = "<p><strong>Please enter a donor name!</strong></p>\n";
	}
	else if(!preg_match('/^[0-9\.]{1,6}$/', $_POST['amount'])) {
		$message = "<p><strong>Please enter a properly formatted donation amount!</strong></p>\n";
	}
	else if(!preg_match('/^[0-9]{1,5}$/', $_POST['x'])) {
		$message = "<p><strong>Please enter a properly formatted image column!</strong></p>\n";
	}
	else if(!preg_match('/^[0-9]{1,5}$/', $_POST['y'])) {
		$message = "<p><strong>Please enter a properly formatted image row!</strong></p>\n";
	}
	else {
		$message = "<p><strong>Donation added.</strong></p>\n";
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
		<title>A Charity Donation Recognition System Using PHP, MySQL, JavaScript And DOM Admin Page</title>
		<link href="../demo.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			function checkForm() {
				if(document.form1.x.value == "" || isNaN(document.form1.x.value)) {
					alert('Please enter a proper image column value!');
					document.form1.x.focus();
					return false;
				}
				
				if(document.form1.y.value == "" || isNaN(document.form1.y.value)) {
					alert('Please enter a proper image row value!');
					document.form1.y.focus();
					return false;
				}
				
				if(document.form1.name.value == "") {
					alert('Please enter a donor name!');
					document.form1.name.focus();
					return false;
				}
				
				if(document.form1.amount.value == "" || isNaN(document.form1.amount.value)) {
					alert('Please enter a proper donation amount!');
					document.form1.amount.focus();
					return false;
				}
				
				return true;
			}
		</script>
	</head>
	<body>
		<h1>
			A Charity Donation Recognition System<br />
			Using PHP, MySQL, JavaScript And DOM<br />
			Admin Page
		</h1>
		<?php echo $message; ?>
		<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return checkForm()">
			<p>
				<label for="x">Image Column: </label>
				<input name="x" type="text" id="x" value="<?php echo $_POST['x']; ?>" size="5" maxlength="5" />
			</p>
			<p>
				<label for="y">Image Row: </label>
				<input name="y" type="text" id="y" value="<?php echo $_POST['y']; ?>" size="5" maxlength="5" />
			</p>
			<p>
			  <label for="name">Donor Name: </label>
				<input name="name" type="text" id="name" value="<?php echo $_POST['name']; ?>" size="50" maxlength="150" />
			</p>
			<p>
				<label for="amount">Donation Amount: </label>
				<input name="amount" type="text" id="amount" value="<?php echo $_POST['amount']; ?>" size="7" maxlength="6" />
			</p>
			<p>
			  	<label for="message">Donor Message: </label>
			  	<textarea name="message" cols="40" rows="5" id="message"><?php echo $_POST['message']; ?></textarea>
			</p>
			<p>
				<input name="submit" type="submit" id="submit" value="Submit" />
			</p>
		</form>
		<p><a href="http://www.dougv.com/blog/2007/11/21/a-charity-donation-recognition-system-using-php-mysql-javascript-and-dom/">A Charity Donation Recognition System Using PHP, MySQL, JavaScript And DOM</a></p>
		<p><a href="twocolor.php">Example 1: Two-Color Image</a></p>
		<p><a href="index.php">Example 2: Standard Image</a></p>
		<p>&nbsp;</p>
	</body>
</html>
