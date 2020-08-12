<?php
require_once("header.php");
require_once("config/connectToDatabase.php");
require_once("class/AccountClass.php");
require_once("class/Constants.php");
require_once("class/FormSanitizer.php");

$accountObj = new AccountClass($conn); // set up an AccountClass and use its function to validate input
// here i will only add one username and password and shared by the owner,
// if requested, more users can be added
if(isset($_POST['submit'])) { // if the name field of the submit button matches

  $userName = FormSanitizer::sanitizeFormUsername($_POST["userName"]); // santize the input
  $password = FormSanitizer::sanitizeFormUsername($_POST["password"]);
  // default userName = ajhair
  // default password = 123456
  // $password = hash("sha512",$password); // hash the password
  // $query =$conn->prepare("INSERT INTO Users (id,userName,password)VALUES (NULL,:userName, :password)");
  // $query->bindParam(":userName", $userName);
  // $query->bindParam(":password", $password);
  // $query->execute();

  $wasSuccessful = $accountObj->userSignIn($userName,$password);
  if ($wasSuccessful) {
    header("Location: staffPage.php");
  } else {
    echo "Failed to sign in"; // if any of the input is not matching, print out to the user
  }

}


 ?>

 <div class="g">
   <p>Enter your information/输入登录信息</p>
 </div>

<!-- the english version -->
<!-- <div class="staffLoginForm">
  <form class="" action="formHandler/loginHandler.php" method="post">
    <input type="text" name="userName" placeholder="userName" required>
    <input type="password" name="password" placeholder="password" required>
    <button type="submit" name="submit">Login</button>
  </form>
</div> -->

<!-- the bilingual version -->
<div class="staffLoginForm">
  <form class="" action="staffLogin.php" method="post">

    <input type="text" name="userName" placeholder="userName/用户名" required autocomplete="off">

    <input type="password" name="password" placeholder="password/密码" required autocomplete="off">

    <button type="submit" name="submit">Login/登入</button>
    <?php
      echo $accountObj->getError(Constants::$invalidUserName);
    ?>
    <?php
      echo $accountObj->getError(Constants::$invalidPassword);
    ?>
  </form>
</div>

</div>
<!-- this is for the end of wrapper class -->
