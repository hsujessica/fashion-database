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

  $name = $_GET['name'];

  $query = "SELECT p.people_name,p.people_role,p.people_agency,a.agency_name,a.agency_site
            FROM people p
            LEFT JOIN agencies a
            ON p.people_agency = a.agency_name
            WHERE p.people_name = \"$name\";";

  $db_link=new mysqli($db_server, $db_user, $db_password, $db_name);
  if ($db_link->connect_errno)
     print("Connection error!");

  $result = mysqli_query($db_link, $query);

  $rows = mysqli_num_rows($result);


  while ($table_row = mysqli_fetch_array($result)) {
      print("\n\t<h1>$table_row[0]<h1>");
      print("\n\t<h2>$table_row[1]<h2>");
      print("\n\t<h3>AGENCIES</h3>");
      print("\n\t<p><a href=\"http://$table_row[4]\" target=\"_blank\">$table_row[3]</a></p>");
  }    

mysqli_close($db_link); 

 ?>

</body>
</html>