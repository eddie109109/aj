<?php
require_once("Constants.php");


class AccountClass {
  private $conn;
  private $errorArray = array();
  private $sqlData;

  public function __construct($conn) {
    $this->conn = $conn;

  }

  public function userSignIn($userName, $password) {
      $query = $this->conn->prepare("SELECT * FROM Users WHERE userName = :userName");
      $query->bindParam(":userName", $userName);
      $query->execute();

      if ($query->rowCount() == 0) {
        array_push($this->errorArray, Constants::$invalidUserName);
        return false;
      } // if the username does not match, we return false no need for further checking

      // if it can get here that means the user name exists, then we can check the password

      $password = hash("sha512",$password); // hash the password

      $query = $this->conn->prepare("SELECT * FROM Users WHERE userName = :userName AND password = :password");
      $query->bindParam(":userName", $userName);
      $query->bindParam(":password", $password);
      $query->execute();

      if ($query->rowCount() == 0) {
        array_push($this->errorArray, Constants::$invalidPassword);
        return false;
      }

      return true; // this means that the user has entered the correct username and password

    }

    public function printErrorMessage() {
      echo $this->errorArray[0];
    }

    public function getError($error) {
      if (in_array($error, $this->errorArray)) {
        return "<span class='errorMessage'>$error</span>";
      }
    }


    public function printSchedules($userName) {
      $query = $this->conn->prepare("SELECT * FROM TimeTable WHERE userName = :userName");
      $query->bindParam(":userName",$userName);
      $query->execute();
      $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
      $elevenToHalf = $this->sqlData['elevenToHalf'];
      $halfToTwelve = $this->sqlData['halfToTwelve'];
      $twelveToHalf = $this->sqlData['twelveToHalf'];
      $halfToOne = $this->sqlData['halfToOne'];
      $oneToHalf = $this->sqlData['oneToHalf'];
      $halfToTwo = $this->sqlData['halfToTwo'];
      $twoToHalf = $this->sqlData['twoToHalf'];
      $halfToThree = $this->sqlData['halfToThree'];
      $threeToHalf = $this->sqlData['threeToHalf'];
      $halfToFour = $this->sqlData['halfToFour'];
      $fourToHalf = $this->sqlData['fourToHalf'];
      $halfToFive = $this->sqlData['halfToFive'];
      $fiveToHalf = $this->sqlData['fiveToHalf'];
      $halfToSix = $this->sqlData['halfToSix'];
      $sixToHalf = $this->sqlData['sixToHalf'];
      $halfToSeven = $this->sqlData['halfToSeven'];
      echo $this->sqlData["userName"];
      echo "<td> $elevenToHalf</td>
            <td> $halfToTwelve</td>
            <td> $twelveToHalf</td>
            <td> $halfToOne</td>
            <td> $oneToHalf</td>
            <td> $halfToTwo</td>
            <td> $twoToHalf</td>
            <td> $halfToThree</td>
            <td> $threeToHalf</td>
            <td> $halfToFour</td>
            <td> $fourToHalf</td>
            <td> $halfToFive</td>
            <td> $fiveToHalf</td>
            <td> $halfToSix</td>
            <td> $sixToHalf</td>
            <td> $halfToSeven</td>";
    }


}

?>
