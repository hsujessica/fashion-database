<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
?>
<html lang="en">
     <head>
          <meta charset="utf-8" />
          <title>Add Model Results</title>
          <link rel="stylesheet" type="text/css" href="assignment7.css" />
          <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
     </head>

<body>
      <div id="container">
      <br />

          <h1>Results of Add Model</h1>
          <br /><br /><br /><br /><br />

<?php

    include('/home/jyh298/authFile/jyhconfig.php');
    $db_link=new mysqli($db_server, $db_user, $db_password, $db_name);
    if ($db_link->connect_errno) {
    print("Connection error!");
  }

    $mname = mysqli_real_escape_string($db_link,$_POST['mname']);
    $gender = mysqli_real_escape_string($db_link,$_POST['gender']);
    $nationality = mysqli_real_escape_string($db_link,$_POST['nationality']);
    $mother = mysqli_real_escape_string($db_link,$_POST['mother']);
    $newyork = mysqli_real_escape_string($db_link,$_POST['newyork']);
    $london = mysqli_real_escape_string($db_link,$_POST['london']);
    $milan = mysqli_real_escape_string($db_link,$_POST['milan']);
    $paris = mysqli_real_escape_string($db_link,$_POST['paris']);
    $bio  = mysqli_real_escape_string($db_link,$_POST['bio']);
    $datacheck = 1;


if (empty ($mname)) {
    print("<p>A name is required.</p>");
    $datacheck = 0;
    }

if (empty ($nationality)) {
   $nationality = "NULL";
   }
if (empty ($mother)) {
   $mother = "NULL";
   }
if (empty ($newyork)) {
   $newyork = "NULL";
   }
if (empty ($london)) {
   $london = "NULL";
   }
if (empty ($milan)) {
   $milan = "NULL";
   }
if (empty ($paris)) {
   $paris = "NULL";
   }
if (empty ($bio)){
    $bio = "NULL";
    }


if ($datacheck > 0) {
      print("<h2>New Model Added</h2>");
      print("\n\t<h2>Name : $mname</h2>");
      print("\n\t<p>Gender : $gender</p>");
      print("\n\t<p>Nationality : $nationality</p>");
      print("\n\t<h2>Agencies</h2>");
      print("\n\t<p>Mother Agency : $mother</p>");
      print("\n\t<p>New York : $newyork</p>");
      print("\n\t<p>London : $london</p>");
      print("\n\t<p>Milan : $milan</p>");
      print("\n\t<p>Paris : $paris</p>");
      print("\n\t<br/><br/><p>Bio : $bio</p>");

      
      $query1 = "INSERT INTO models (model_name,model_sex,model_nationality,model_mother,model_newyork,model_london,model_milan,model_paris,model_bio) VALUES (\"$mname\",\"$gender\",\"$nationality\",\"$mother\",\"$newyork\",\"$london\",\"$milan\",\"$paris\",\"$bio\");"; 

      if ($stmt = $db_link->prepare("INSERT INTO models (model_name,model_sex,model_nationality,model_mother,model_newyork,model_london,model_milan,model_paris,model_bio) VALUES (?,?,?,?,?,?,?,?)")) {
        $stmt->bind_param("sssssssss",$name,$gender,$nationality,$mother,$newyork,$london,$milan,$paris);
        $stmt->execute();
        $stmt->close();
        }

mysqli_close($db_link); 

}

?>

</div>
</body>
</html>


