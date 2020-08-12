<?php
require_once("../config/connectToDatabase.php");
require_once("../class/AccountClass.php");
// here i will only add one username and password and shared by the owner,
// if requested, more users can be added
if(isset($_POST['submit'])) { // if the name field of the submit button matches

  $userName = FormSanitizer::sanitizeFormUsername($_POST["userName"]);
  $password = FormSanitizer::sanitizeFormUsername($_POST["password"]);
  // default userName = ajhair
  // default password = 123456
  $password = hash("sha512",$password); // hash the password
  $query =$conn->prepare("INSERT INTO Users (id,userName,password)VALUES (NULL,:userName, :password)");
  $query->bindParam(":userName", $userName);
  $query->bindParam(":password", $password);
  $query->excute();
  // $accountObj = new AccountClass($conn); // set up an AccountClass and use its function to validate input
  //
  // $wasSuccessful = $accountObj->userSignIn($userName,$password);
  // if ($wasSuccessful) {
  //   header("Location: index.php");
  // } else {
  //   echo "Failed to sign in"; // if any of the input is not matching, print out to the user
  // }

}
?>
