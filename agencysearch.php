<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);

?>
<html lang="en">
     <head>
          <meta charset="utf-8" />
          <title>Search Results</title>
          <link rel="stylesheet" type="text/css" href="assignment7.css" />
          <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
     </head>

<body>
 <?php 
  include('/home/jyh298/authFile/jyhconfig.php');

  $city = $_GET['city'];
  $agencytype = $_GET['agencytype'];
  $order = $_GET['order'];

  $query = "SELECT agency_name,agency_site,agency_logo
            FROM agencies
            WHERE agency_city = \"$city\"
            AND agency_type = \"$agencytype\"
            ORDER BY agency_name $order;";

  $db_link=new mysqli($db_server, $db_user, $db_password, $db_name);
  if ($db_link->connect_errno)
     print("Connection error!");

  $result = mysqli_query($db_link, $query);

  $rows = mysqli_num_rows($result);

print("<h1>Agencies in $city (category : $agencytype)</h1>");

  if ($rows == 0) {
    print ("<p>Sorry, no records found. Please try again!</p>");
  }

 print("\n<table>
      \n\t<tr>
      \n\t\t<th>Agency Name</th>
      \n\t\t<th>Logo</th>
      \n\t</tr>");

  while ($table_row = mysqli_fetch_array($result)) {
      print("\t<tr>");
      print("\n\t\t<td><a href=\"http://$table_row[1]\" target=\"_blank\">$table_row[0]</a></td>");
      print("\n\t\t<td><img src=\"http://$table_row[2]\" height=\"30\"></td>");
      print("\n\t</tr>");
  }

print("</table>");


mysqli_free_result($result);

mysqli_close($db_link); 


 ?>

</body>
</html>