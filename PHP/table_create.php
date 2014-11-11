<!DOCTYPE html>
<html>
<head>
<title>Add Row to Table</title>
</head>
<body>

<?php

$name = $_GET["name"];
$age = $_GET["age"];

echo "<div>";
echo "Name: <strong>".$name."</strong>";
echo "</div>";

echo "<div>";
echo "Age: <strong>".$age."</strong>";
echo "</div>";

$host = "";
$username = "dthorne0_fa14";
$password = "";
$database = "dthorne0_fa14";

$mysqli = new mysqli($host,$username,$password,$database);

if( mysqli_connect_errno())
{
  echo "ERROR: Error connecting to the database!";
}
else
{
  // Interact with database here.
  $query =        "insert into People values(0,";
  $query = $query."'";
  $query = $query.$name;
  $query = $query."'";
  $query = $query.",";
  $query = $query.$age;
  $query = $query.");";

  echo "<div>";
  echo $query;
  echo "</div>";

  $result = $mysqli->query($query);

  if( $result)
  {
    echo "SUCCESS!";
    echo "<div><a href='./table_read.php'>Show Table</a></div>";
  }
  else
  {
    echo "ERROR: Error inserting row!";
  }
}

$mysqli->close();

?>

</body>
</html>
