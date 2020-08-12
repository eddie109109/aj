<?php
require_once("header.php");// the header file contains the database connection

$accountObj = new AccountClass($conn);
?>



<p>database</p>
<table>
  <tr>
    <th>Name</th>
    <th>11 to 11:30</th>
    <th>11:30 to 12</th>
    <th>12 to 12:30</th>
    <th>12:30 to 1</th>
    <th>1 to 1:30</th>
    <th>1:30 to 2</th>
    <th>2 to 2:30</th>
    <th>2:30 to 3</th>
    <th>3 to 3:30</th>
    <th>3:30 to 4</th>
    <th>4 to 4:30</th>
    <th>4:30 to 5</th>
    <th>5 to 5:30</th>
    <th>5:30 to 6</th>
    <th>6 to 6:30</th>
    <th>6:30 to 7</th>
  </tr>
  <tr>
    <td>Allen</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
  </tr>
  <tr>
    <td><?php
      $accountObj->printSchedules("jacky");
    ?></td>
    <!-- <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td>
    <td>N</td> -->
  </tr>
<table>
