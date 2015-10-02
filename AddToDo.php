<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="contents">
		<header id="header" class="header">
			<h1>Add New Classes</h1>
			<a href="addEntry.php">Show ToDoTable</a>
			</header><!-- /header -->
			<section id="result" align="center">
				<?php
					$StudentID = filter_input(INPUT_POST, "StudentID");
					$ClassID = filter_input(INPUT_POST, "ClassID");
					$ToDo = filter_input(INPUT_POST, "ToDo");
					$Password = filter_input(INPUT_POST, "Password");
					print $StudentID;
					print $ClassID;
					print $ToDo;
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
							"INSERT INTO ToDoTable
							(StudentID, ClassID, ToDo)
							VALUES ($StudentID, '$ClassID', '$ToDo')";
					// use exec() because no results are returned
						$data = $con->exec($query);
						echo "New record created successfully";
					}
					catch(PDOException $e) {
						echo $query . "<br>" . $e->getMessage();
				} $con = null;
					
					//header('Location: CheckLogIn.php');
					print "<form method=\"post\" action=\"CheckLogIn.php\">";
						print "<input type=\"hidden\" name=\"StudentID\" value=\"$StudentID\">";
						print "<input type=\"hidden\" name=\"Password\" value=\"$Password\">";
						print "<input type=\"submit\" value=\"Return\">";
					print "</form>";
				?>
			</p>
		</section>
	</div>
</body>
</html>