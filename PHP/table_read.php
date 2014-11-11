<!DOCTYPE html>
<html>
<head>
<title>Read a Table from a MySQL Database</title>
</head>
<body>

<?php
echo "Hello, PHP :-P";

$host = "";
$username = "dthorne0_fa14";
$password = "";
$database = "dthorne0_fa14";

$mysqli = new mysqli( $host, $username, $password,  $database);

if( mysqli_connect_errno())
{
  echo "<div>";
  echo "ERROR: ".mysqli_connect_errno();
  echo "</div>";
}
else
{
  echo "<div>Connected Successfully :-P</div>";

  $query = "select * from People;";

  $result = $mysqli->query($query);

  if( $result)
  {
    // use the result
    echo "Query worked :-P";

    $numrows = $result->num_rows;
    $numcols = $result->field_count;
    $fields = $result->fetch_fields(); // returns an array

    echo "<div>";
    echo "numrows: ".$numrows;
    echo "</div>";

    echo "<div>";
    echo "numcols: ".$numcols;
    echo "</div>";

    echo "<table border='1' cellpadding='4' cellspacing='0'>";

    echo "<tr>";
    for( $i=0; $i<$numcols; $i++)
    {
      echo "<th>";
      echo $fields[$i]->name;
      echo "</th>";
    }
    echo "</tr>";

    // fetch_row returns an array containing the
    // values in the next row if there is another row
    // and "false" otherwise.
    while( $row = $result->fetch_row())
    {
      echo "<tr>";

      for( $i=0; $i<$numcols; $i++)
      {
        echo "<td>";
        echo $row[$i];
        echo "</td>";
      }

      echo "</tr>";
    }

    echo "</table>";

  }
  else
  {
    // error
    echo "ERROR: ".$mysqli->error;
  }

  $result->free();

  $mysqli->close();
}


?>

</body>
</html>
