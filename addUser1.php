<?php
require_once('./funcs.php');



var_dump($_GET);
d($_GET);
//get fields data
$fname = isset($_GET['fname']) && !empty($_GET['fname']) ? $_GET['fname'] : '';
$lname = isset($_GET['lname']) && !empty($_GET['lname']) ? $_GET['lname'] : '';
$gender = isset($_GET['gender']) && !empty($_GET['gender']) ? $_GET['gender'] : '';
$country = isset($_GET['country']) && !empty($_GET['country']) ? $_GET['country'] : '';
$hobby = isset($_GET['hobby']) && !empty($_GET['hobby']) ? $_GET['hobby'] : '';

echo "<hr>";
d($fname);
d($lname);
d($gender);
d($country);
d($hobby);


//database setting
$conn = new mysqli(
  "localhost",
  'touriya_form',
  'ZKW47jhjsbNF',
  'touriya_form'
);


$hobby = json_encode($hobby);
$query = "
    INSERT INTO form
    (fname,lname,gender,country,hobby)
    VALUES
    ('$fname','$lname','$gender','$country','$hobby')
";
$result = $conn->query($query);

$conn->close();

// header('Location: https://form.touriya.ir/index.php');