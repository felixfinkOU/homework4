<?php include 'header.php';?>

    <h1>Managers</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>CoachID</th>
      <th>FirstName</th>
      <th>LastName</th>
      <th>Club</th>

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

$sql = "SELECT * from SoccerManagers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["CoachID"]?></td>
    <td><?=$row["FirstName"]?></td>
    <td><?=$row["LastName"]?></td>
    <td><?=$row["Club"]?></td>
    <td>
      <form method="post" action="soccer_managers-edit.php">
        <input type="hidden" name="iCoachID" value="<?=$row["CoachID"]?>" />
        <input type="hidden" name="iFirstName" value="<?=$row["FirstName"]?>" />
        <input type="hidden" name="iLastName" value="<?=$row["LastName"]?>" />
        <input type="hidden" name="iClub" value="<?=$row["Club"]?>" />
        <input type="submit" value="Edit" class="btn" />
      </form>
    </td>
    <td>
      <form method="post" action="soccer_managers-delete-save.php">
        <input type="hidden" name="iCoachID" value="<?=$row["CoachID"]?>" />
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
<a href="soccer_managers-add.php" class="btn btn-primary">Add New</a>

<?php include 'footer.php';?>