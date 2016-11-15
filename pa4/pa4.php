<!-- db-starter.php
     A PHP script to demonstrate database programming.
-->
<html>
<head>
    <title> Database Programming with PHP </title>
    <style type = "text/css">
    td, th, table {border: thin solid black;}
    </style>
</head>
<body>

<?php
   
// Get input data
    $id = $_POST["id"];
    $first = $_POST["first"];
    $last = $_POST["last"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $action = $_POST["action"];
    $statement = $_POST["statement"];
    
    // If any of numerical values are blank, set them to zero
    if ($id == "") $id = 0;
    if ($miles == "") $miles = 0.0;
    if ($year == "") $year = 0;
    if ($state == "") $state = 0;

// Connect to MySQL
$db = mysql_connect("db1.cs.uakron.edu:3306", "sb205", "elengomat");
if (!$db) {
     print "Error - Could not connect to MySQL";
     exit;
}

// Select the database
$er = mysql_select_db("ISP_sb205");
if (!$er) {
    print "Error - Could not select the database";
    exit;
}

// print "<b> The action is: </b> $action <br />";

//var_dump( $_POST );
//print "action: " . $action;
if($action == "display")
    $query = "";
else if ($action == "insert")
    $query = "insert into friends values($id, '$first', '$last', $phone, '$address')";
else if ($action == "update")
    $query = "update friends set first = '$first', last = $last, phone = $phone, address = $address where id = $id";
else if ($action == "delete")
    $query = "delete from friends where id = $id";
else if ($action == "user")
    $query = $statement;


if(true){
    trim($query);
    $query_html = htmlspecialchars($query);
    print "<b> The query is: </b> " . $query_html . "<br />";
    
    $result = mysql_query($query);
    if (!$result) {
        print "Error - the query could not be executed";
        $error = mysql_error();
        print "<p>" . $error . "</p>";
    }
}
    
// Final Display of All Entries
$query = "SELECT * FROM friends";
$result = mysql_query($query);
if (!$result) {
    print "Error - the query could not be executed";
    $error = mysql_error();
    print "<p>" . $error . "</p>";
    exit;
}

// Get the number of rows in the result, as well as the first row
//  and the number of fields in the rows
$num_rows = mysql_num_rows($result);
//print "Number of rows = $num_rows <br />";

print "<table><caption> <h2> Friends ($num_rows) </h2> </caption>";
print "<tr align = 'center'>";

$row = mysql_fetch_array($result);
$num_fields = mysql_num_fields($result);

// Produce the column labels
$keys = array_keys($row);
for ($index = 0; $index < $num_fields; $index++) 
    print "<th>" . $keys[2 * $index + 1] . "</th>";
print "</tr>";
    
// Output the values of the fields in the rows
for ($row_num = 0; $row_num < $num_rows; $row_num++) {
    print "<tr align = 'center'>";
    $values = array_values($row);
    for ($index = 0; $index < $num_fields; $index++){
        $value = htmlspecialchars($values[2 * $index + 1]);
        print "<th>" . $value . "</th> ";
    }
    print "</tr>";
    $row = mysql_fetch_array($result);
}
print "</table>";

?>
</body>
</html>
