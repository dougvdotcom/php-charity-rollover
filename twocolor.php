<?php
define('IMG_ROWS', 5);
define('IMG_COLS', 5);

$dbhost = "localhost";
$dbuser = "dbuser";
$dbpass = "dbpass";
$dbname = "database";

$link = mysql_connect($dbhost, $dbuser, $dbpass) or die('Cannot connect to database server');
mysql_select_db($dbname) or die('Cannot select database');

$sql = "SELECT r.rollover_id, r.rollover_x, r.rollover_y, d.donor_id, d.donor_name, d.donor_amount, d.donor_message FROM php_charity_rollover AS r LEFT JOIN php_charity_donors d ON r.donor_id = d.donor_id ORDER BY r.rollover_x, r.rollover_y";
$rs = mysql_query($sql) or die('Cannot execute query');

$items = array();
while($row = mysql_fetch_assoc($rs)) {
	$items[] = $row;
}

$table = "<table id=\"rollover\" cellspacing=\"0\" cellpadding=\"1\">\n";

for($y = 1; $y <= IMG_ROWS; $y++) {
	$table .= "\t<tr>\n";
	for($x = 1; $x <= IMG_COLS; $x++) {
		$table .= "\t\t<td><img id=\"r" . $y . "_c" . $x . "\" src=\"block";
		foreach($items as $item) {
			$detail = "";
			if($item['rollover_y'] == $y && $item['rollover_x'] == $x) {
				$table .= "_reverse";
				$detail = " onmouseover=\"displayDetail('" . str_replace("'", "\'", $item['donor_name']) . "', '" . number_format($item['donor_amount'], 2) . "', '" . str_replace("'", "\'", nl2br($item['donor_message'])) . "')\" onmouseout=\"HideContent('donationDetail')\"";
				break;
			}
		}
		$table .= ".jpg\"";
		$table .= $detail;
		$table .= " alt=\"\" /></td>\n";
	}
	$table .= "\t</tr>\n";
}

$table .= "</table>\n";
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
		<title>A Charity Donation Recognition System Using PHP, MySQL, JavaScript And DOM</title>
	    <link href="../demo.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			table, td, img {
				border: none;
			}
			
			table.rollover {
				 width: 360px;
			}
			
			div#donationDetail {
				display: none;
				position: absolute;
				width: 200px;
				background: #fff;
				color: #000;
				font: normal normal normal 10px verdana,arial,helvetica,sans-serif;
				padding: 5px;
				border: 1px solid #000;
				margin: 10px;
			}
		</style>
		
		<script type="text/javascript" src="displaydiv.js"></script>
		<script type="text/javascript">		
			function displayDetail(name, amount, message) {
				var theText = '<strong>Donor Name:</strong>&nbsp;' + name + '<br />';
				theText += '<strong>Amount:</strong> $' + amount + '<br />';
				theText += '<strong>Donor Message:</strong> ' + message;
				document.getElementById('donationDetail').innerHTML = theText;
				ShowContent('donationDetail');
			}
		</script>
	</head>
	<body>
		<h1>
			A Charity Donation Recognition System<br />
			Using PHP, MySQL, JavaScript And DOM<br />
			Example 1: Two-Color Image
		</h1>
		<?php echo $table; ?>
		<div id="donationDetail"></div>
		<p><a href="http://www.dougv.com/blog/2007/11/21/a-charity-donation-recognition-system-using-php-mysql-javascript-and-dom/">A Charity Donation Recognition System Using PHP, MySQL, JavaScript And DOM</a></p>
		<p><a href="index.php">Example 2: Standard Image</a></p>
		<p><a href="login.php">Admin Login Page</a></p>
		<p>&nbsp;</p>
	</body>
</html>
