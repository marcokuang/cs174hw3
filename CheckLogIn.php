<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="contents">
<header id="header" class="header">
	<h1  align="center">Class Result</h1>
</header><!-- /header -->

<nav id="nav" role="navigation">
    <ul id="menu">
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="sample.html">Sample</a></li>
    </ul>
</nav>

<section id="result" align="center">
<?php

	$StudentID = filter_input(INPUT_POST, "StudentID");
	$Password = filter_input(INPUT_POST, "Password");
	print("<h3> Showing results for Student ID: ");

	print $StudentID;
	print("</h3>");

	define("HOSTNAME", "localhost");
	define("DATABASENAME", "Developers");
	define("DATABASEUSER", "root");
	define("PASSWORD", "Marco1991");

	try {
	// Create connection
		$con = new PDO("mysql:host=".HOSTNAME.";dbname=".DATABASENAME,DATABASEUSER,PASSWORD);
	// set the PDO error mode to exception
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$query = 
			"SELECT ClassID, ToDo
			FROM ToDoTable, UserTable
			WHERE ToDoTable.StudentID = UserTable.StudentID AND UserTable.StudentID = '$StudentID' 
			AND UserTable.Password = '$Password'";

		$result = $con->query($query);
		$row = $result->fetch(PDO::FETCH_ASSOC);

		print "<table id=\"resultTable\"border='1'>\n";
		
		//construct the header row of the HTML table
		print "
		<tr>
		\n";
		//$count = 1;
		print "<th>Item #</th>";
		foreach ($row as $field => $value) {
			print "
			<//th>$count</th>\n
	 		<th>$field</th>\n";
	 		$count++;
	 	}
	 	print "
	 	<tr>\n";

			
		//Fetch the matching database table rows
		$data = $con->query($query);
		$data -> setFetchMode(PDO::FETCH_ASSOC);

			// constructed the HTML table row by row
			foreach ($data as $row) {
				print "<tr>
				\n";
				foreach ($row as $name => $value) {
					print"
					<td>$value</td>\n";
				}
				print "
				</tr>\n";
			}
			print"</table>\n";
		}
		catch(PDOException $e){
			echo 'ERROR:'.$e->getMessage();
		
		}
		print("<div id = \"addButton\">");

	print "<form method=\"post\" action=\"addEntry.php\">";
	print "<input type=\"hidden\" name=\"StudentID\" value=\"$StudentID\">";
	print "<input type=\"hidden\" name=\"Password\" value=\"$Password\">";
	print "<input type=\"submit\" value=\"Add ToDo\">";
	print "</form>";
	print "<div>";

	?>
</p>
</section>


</div>
</body>
</html>