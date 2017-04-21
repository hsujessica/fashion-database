<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="utf-8" />
          <title>Search for Creatives</title>
          <link rel="stylesheet" type="text/css" href="assignment7.css" />
          <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

     </head>

     <body>
      <div id="container">
      <br />

          <h1>Jessica Hsu - Database Design and Web Implementation Spring 2014</h1>
          <h2>Assignment #7 - “Front End” of LAMP project </h2>
          <br /><br /><br /><br /><br />

          <p>Search for industry creatives.</p>

          <form action="creativessearch.php" id="form" method="get">
    
          <?php

          include('/home/jyh298/authFile/jyhconfig.php');

          $db_link=new mysqli($db_server, $db_user, $db_password, $db_name);
          if ($db_link->connect_errno)
          print("Connection error!");

          print("<select name=name>");

          $query = "SELECT people_name FROM people ORDER BY people_name; ";

          $result = mysqli_query($db_link,$query);

          while ($table_row = mysqli_fetch_array($result))   {
          print("<option value=\"$table_row[0]\">$table_row[0]</option>\n");
          }

          print("</select>");

          ?>

    <input type="submit" value="submit" name="submit" id="submit">
    
    </form>


      
      <br /><br /><br /><br /><br /><br /><br />
      <a href="assignment7.html">Back to Options</a>
      <br /><br />
</div>
</body>
</html>
