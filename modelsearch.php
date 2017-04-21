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


  $name = $_GET['mname'];

  $query = "SELECT m.model_name,m.model_mother,m.model_newyork,m.model_london,m.model_milan,m.model_paris,m.model_nationality,m.model_bio,a.agency_site, n.agency_site,l.agency_site,b.agency_site,p.agency_site
            FROM models m
            LEFT JOIN agencies a ON m.model_mother = a.agency_name
            LEFT JOIN agencies n ON m.model_newyork = n.agency_name
            LEFT JOIN agencies l ON m.model_london = l.agency_name
            LEFT JOIN agencies b ON m.model_milan = b.agency_name
            LEFT JOIN agencies p ON m.model_paris = p.agency_name
            WHERE model_name=\"$name\";";

  $db_link=new mysqli($db_server, $db_user, $db_password, $db_name);
  if ($db_link->connect_errno) 
    print("Connection error.");
  
  $result = mysqli_query($db_link, $query);

  $rows = mysqli_num_rows($result);

  if ($rows == 0) {
    print("\n\t<h1>$name</h1>");
    print ("<p>Sorry, this person does not exist in the database yet. Please try again!</p>");
    print("\n\t<h3>AGENCIES<h3>");
    print("\n\n\t<h3>BIO</h3>");
}
  while ($table_row = mysqli_fetch_array($result)) {
    print("\n\t<h1>$table_row[0]<h1>");
    print("\n\t<h3>AGENCIES</h3>");
    print("\n\t<p>Mother Agency : <a href=\"http://$table_row[8]\" target=\"_blank\">$table_row[1]</a></p>");
    print("\n\t<p>New York : <a href=\"http://$table_row[9]\" target=\"_blank\">$table_row[2]</a></p>");
    print("\n\t<p>London : <a href=\"http://$table_row[10]\" target=\"_blank\">$table_row[3]</a></p>");
    print("\n\t<p>Milan : <a href=\"http://$table_row[11]\" target=\"_blank\">$table_row[4]</a></p>");
    print("\n\t<p>Paris : <a href=\"http://$table_row[12]\" target=\"_blank\">$table_row[5]</a></p>");
    print("\n\n\t<h3>BIO</h3>");
    print("\n\t<p>Nationality/Background : $table_row[6]</p>");
    print("\n\t<p>$table_row[7]</p>");
  }

mysqli_free_result($result);

$query_2 = "SELECT r.runway_client,r.runway_season,r.runway_city,r.runway_image
            FROM models m
            INNER JOIN runway r
            ON m.model_name = r.model_name
            WHERE m. model_name =\"$name\";";

$result_2 = mysqli_query($db_link, $query_2);

$rows_2 = mysqli_num_rows($result_2);

if ($rows_2 == 0) {
    print("\n\t<h3>RUNWAY<h3>");
    print ("<p>No runway records yet.</p>");
}

while ($table_2_row = mysqli_fetch_array($result_2)) {
    print("\n\t<h3>RUNWAY<h3>");
    print("\n\t<p>$table_2_row[0] $table_2_row[1]<p>");
    print("\n\t<p>$table_2_row[2]<p>");
    print("\n\t</p><img src=\"$table_2_row[3]\" height=\"150\"></p>");
    print("\n<br />");
  }

mysqli_free_result($result_2);

$query_3 = "SELECT w.work_client,w.work_season,w.work_type,w.work_photog,w.work_stylist,w.work_image
            FROM models m
            INNER JOIN work w
            ON m.model_name = w.work_model
            WHERE m.model_name =\"$name\";";

$result_3 = mysqli_query($db_link, $query_3);

$rows_3 = mysqli_num_rows($result_3);

if ($rows_3 == 0) {
    print("\n\t<h3>PRINT WORK<h3>");
    print ("<p>No print work records yet.</p>");
}

while ($table_3_row = mysqli_fetch_array($result_3)) {
    print("\n\t<h3>PRINT WORK</h3>");
    print("\n\t<p>$table_3_row[0] $table_3_row[1] $table_2_row[2]</p>");
    print("\n\t<p>Photographer : $table_3_row[3]</p>");
    print("\n\t<p>Stylist : $table_3_row[4]</p>");
    print("\n\t<p><img src=\"$table_3_row[5]\" height=\"150\"></p>");
    print("\n<br />");

  }

mysqli_free_result($result_3);


mysqli_close($db_link); 

?>

 </body>
</html>