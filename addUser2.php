<?php
require_once('./funcs.php');



var_dump($_POST);
d($_POST);
//get fields data
$fname = isset($_POST['fname']) && !empty($_POST['fname']) ? $_POST['fname'] : '';
$lname = isset($_POST['lname']) && !empty($_POST['lname']) ? $_POST['lname'] : '';
$gender = isset($_POST['gender']) && !empty($_POST['gender']) ? $_POST['gender'] : '';
$country = isset($_POST['country']) && !empty($_POST['country']) ? $_POST['country'] : '';
$hobby = isset($_POST['hobby']) && !empty($_POST['hobby']) ? $_POST['hobby'] : '';

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
echo "<hr>";
d($hobby);
echo "<hr>";
$query = "
    INSERT INTO form
    (fname,lname,gender,country,hobby)
    VALUES
    ('$fname','$lname','$gender','$country','$hobby')
";
$result = $conn->query($query);

$conn->close();

// header('Location: https://form.touriya.ir/index.php');