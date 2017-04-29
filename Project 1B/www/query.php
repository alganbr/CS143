<html>
<head>
  <title>Project 1A Query Page</title>
</head>
<body>
  <h1>
    Project 1A
  </h1>
  <p>
    Name: <b>Algan Binggi Rustinya</b><br>
    UID: <b>604670111</b>
  </p>
  <p>
    Name: <b>Frederick Kennedy</b><br>
    UID: <b>404667930</b>
  </p>
  <p>
    Input your query in the following text area:
  </p>
<form action="query.php" method="GET">
  <textarea name="query" cols="60" rows="8"></textarea>
  <br>
  <input type="submit" value="Submit">
</form>
</table>
<?php
   $db_connection = mysql_connect("localhost", "cs143", "");
   mysql_select_db("CS143", $db_connection);
   if($_GET["query"]){
     $query = $_GET["query"];
     $rs = mysql_query($query, $db_connection);
     if(!$rs) {
       die("Query failed: " . mysql_error());
     }
     echo "<table border=\"1\" cellspacing=\"1\" cellpadding=\"2\">";
     echo "<tr align=\"center\">";
     while($meta = mysql_fetch_field($rs)) {
       echo "<td>" . $meta->name . "</td>";
     }
     echo "</tr>";
     while($row = mysql_fetch_row($rs)) {
       echo "<tr align=\"center\">";
       foreach($row as $col) {
         if(!$col) {
           echo "<td>N/A</td>";
         }
         else {
           echo "<td>" . $col . "</td>";
         }
       }
       echo "</tr>";
     }
     echo "</table>";
   }
   mysql_close($db_connection);
?>
</body>
</html>
