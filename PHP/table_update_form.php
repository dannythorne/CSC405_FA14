<!DOCTYPE html>
<html>
<head>
<title>Update a Row in a Table</title>
</head>
<body>

<h1>Update a Person in the People Table</h1>

<?php
$id = $_GET["id"];

$host = "";
$username = "dthorne0_fa14";
$password = "";
$database = "dthorne0_fa14";

$mysqli = new mysqli( $host, $username, $password,  $database);

if( mysqli_connect_errno())
{
  echo "Error connecting...";
}
else
{
  $query = "select * from People where id=".$id.";";

  $result = $mysqli->query($query);

  if( $result)
  {
    if( $result->num_rows > 1)
    {
      echo "Unhandled case: Multiple rows returned!";
    }
    else
    {
      $row = $result->fetch_row();
      $name = $row[1];
      $age = $row[2];

      echo '<form action="table_update.php">';

      echo "<input type='hidden' name='id' value='".$id."' />";
      echo '<div>';
      echo 'Name: ';
      echo '<input type="text" name="name" value="'.$name.'" />';
      echo '</div>';
      echo '<div>';
      echo 'Age:  ';
      echo '<input type="text" name="age" value="'.$age.'" />';
      echo '</div>';

      echo '<div><input type="submit" value="Add"/></div>';

      echo '</form>';

    }
  }
  else
  {
    echo "Error querying...";
  }

  $result->free();

  $mysqli->close();
}

?>

</body>
</html>
