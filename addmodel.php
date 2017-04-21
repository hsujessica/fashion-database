<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
?>
<html lang="en">
     <head>
          <meta charset="utf-8" />
          <title>Add Model to Database</title>
          <link rel="stylesheet" type="text/css" href="assignment7.css" />
          <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
     </head>

<body>
      <div id="container">
      <br />

          <h1>Add a Model to the Database</h1>
          <br /><br /><br /><br /><br />

          <form action="addmodelresults.php" id="form" method="post">

          <h4>Name : <input type="text" name="mname" id="mname" /></h4>
          <br />    
          <h4>Gender : 
          <select name="gender">
          <option value="F">Female</option>
          <option value="M">Male</option>
          </select>
          </h4>
          <br />  


          <?php

          include('/home/jyh298/authFile/jyhconfig.php');

          $db_link=new mysqli($db_server, $db_user, $db_password, $db_name);
          if ($db_link->connect_errno)
          print("Connection error!");

          print("<h4>Nationality : ");
          print("<select name=\"nationality\">");
          $query1 = "SELECT model_nationality FROM models GROUP BY model_nationality ORDER BY model_nationality; ";
          $result1 = mysqli_query($db_link,$query1);
          print("<option value=\"\">UNKNOWN</option>\n");
          while ($table_row1 = mysqli_fetch_array($result1))   {
          print("<option value=\"$table_row1[0]\">$table_row1[0]</option>\n");
          }
          print("</select></h4><br /><br /><br />");
          mysqli_free_result($result1);



          print("<h4>Agencies</h4><br />");

          print("<h4>Mother Agency : ");
          print("<select name=\"mother\">");
          $query2 = "SELECT agency_name FROM agencies WHERE agency_type=\"models\" ORDER BY agency_name; ";
          $result2 = mysqli_query($db_link,$query2);
          print("<option value=\"\">UNKNOWN/NONE</option>\n");
          while ($table_row2 = mysqli_fetch_array($result2))   {
          print("<option value=\"$table_row2[0]\">$table_row2[0]</option>\n");
          }
          print("</select></h4><br />");

          mysqli_free_result($result2);
        
          print("<h4>New York Agency : ");
          print("<select name=\"newyork\">");
          $query3 = "SELECT agency_name FROM agencies WHERE agency_city=\"New York\" AND agency_type=\"models\" ORDER BY agency_name; ";
          $result3 = mysqli_query($db_link,$query3);
          print("<option value=\"\">UNKNOWN/NONE</option>\n");
          while ($table_row3 = mysqli_fetch_array($result3))   {
          print("<option value=\"$table_row3[0]\">$table_row3[0]</option>\n");
          }
          print("</select></h4><br />");
          mysqli_free_result($result3);

          print("<h4>London Agency : "); 
          print("<select name=\"london\">");
          $query4 = "SELECT agency_name FROM agencies WHERE agency_city=\"London\" AND agency_type=\"models\" ORDER BY agency_name; ";
          $result4 = mysqli_query($db_link,$query4);
          print("<option value=\"\">UNKNOWN/NONE</option>\n");
          while ($table_row4 = mysqli_fetch_array($result4))   {
          print("<option value=\"$table_row4[0]\">$table_row4[0]</option>\n");
          }
          print("</select></h4><br />");
          mysqli_free_result($result4);

          print("<h4>Milan Agency : ");
          print("<select name=\"milan\">");
          $query5 = "SELECT agency_name FROM agencies WHERE agency_city=\"Milan\" AND agency_type=\"models\" ORDER BY agency_name; ";
          $result5 = mysqli_query($db_link,$query5);
          print("<option value=\"\">UNKNOWN/NONE</option>\n");
          while ($table_row5 = mysqli_fetch_array($result5))   {
          print("<option value=\"$table_row5[0]\">$table_row5[0]</option>\n");
          }
          print("</select></h4><br />");
          mysqli_free_result($result5);

          print("<h4>Paris Agency : ");
          print("<select name=\"paris\">");
          $query6 = "SELECT agency_name FROM agencies WHERE agency_city=\"Paris\" AND agency_type=\"models\" ORDER BY agency_name; ";
          $result6 = mysqli_query($db_link,$query6);
          print("<option value=\"\">UNKNOWN/NONE</option>\n");
          while ($table_row6 = mysqli_fetch_array($result6))   {
          print("<option value=\"$table_row6[0]\">$table_row6[0]</option>\n");
          }
          print("</select></h4><br />");
          mysqli_free_result($result6); 
          
          mysqli_close($db_link);

          ?>

    <h4>Bio : 
    <textarea name="bio" rows ="4" columns ="40"></textarea>
    <br /><br />
    <input type="submit" value="submit" name="submit" id="submit">
    </h4>
    
    </form>


      
      <br /><br /><br /><br /><br /><br /><br />
      <a href="assignment7.html">Back to Options</a>
      <br /><br />
</div>
</body>
</html>
