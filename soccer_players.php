<?php include 'header.php';?>

    <h1>Players</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>PlayerID</th>
      <th>FirstName</th>
      <th>LastName</th>
      <th>Club</th>
      <th>Position</th>
      <th>Nationality</th>
    </tr>
  </thead>
  <tbody>
  <?php
$servername = "localhost";
$username = "felixfin_user2";
$password = "O-,GXdw4e3QG";
$dbname = "felixfin_homework3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['position'])) {
    $var = $_POST['position'];
    $sql = "SELECT * from SoccerPlayer where Position='$var'";
}
else {
    $sql = "SELECT * from SoccerPlayer";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["PlayerID"]?></td>
    <td><?=$row["FirstName"]?></td>
    <td><?=$row["LastName"]?></td>
    <td><?=$row["Club"]?></td>
    <td><?=$row["Position"]?></td>
    <td><?=$row["Nationality"]?></td>
    <td>
      <form method="post" action="soccer_players-edit.php">
        <input type="hidden" name="iPlayerID" value="<?=$row["PlayerID"]?>" />
        <input type="hidden" name="iFirstName" value="<?=$row["FirstName"]?>" />
        <input type="hidden" name="iLastName" value="<?=$row["LastName"]?>" />
        <input type="hidden" name="iClub" value="<?=$row["Club"]?>" />
        <input type="hidden" name="iPosition" value="<?=$row["Position"]?>" />
        <input type="hidden" name="iNationality" value="<?=$row["Nationality"]?>" />
        <input type="submit" value="Edit" class="btn" />
      </form>
    </td>
    <td>
      <form method="post" action="soccer_players-delete-save.php">
        <input type="hidden" name="iPlayerID" value="<?=$row["PlayerID"]?>" />
        <input type="submit" value="Delete" class="btn" />
      </form>
    </td>
  </tr>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </tbody>
    </table>

<a class="btn btn-primary" type="button" href="index.php">Go Back</a>
<a href="soccer_players-add.php" class="btn btn-primary">Add New</a>

<?php include 'footer.php';?>