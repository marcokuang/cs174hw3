<html>
<head>
  <title>Add Todo</title>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="contents">
<header id="header" class="header">
<h1 align="center"> SJSU Scheduler </h1>
<h3 align="center"> Adding ToDo Item: </h3>
</header><!-- /header -->



<section id="result" align="center">


  <form action="AddToDo.php" method="post" align="center">
    <p>
        <label>ClassID:</label>
        <input name="ClassID" type="text"/>
    </p>
    <p>
        <label>ToDo:</label>
        <input name="ToDo" type="text"/>
    </p>
  <?php
    $var_value = $_POST['StudentID'];
    print "<input name=\"StudentID\" type=\"hidden\" value=\"$var_value\"/>";
    $var_value2 = $_POST['Password'];
    print "<input name=\"Password\" type=\"hidden\" value=\"$var_value2\"/>";
  ?>


    <p>
        <input type="submit" value="Submit" />
    </p>
  </form>
  </section>


  </div>
</body>

</html>
