<?php include 'header.php';?>

    <h1>Managers</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Attribute</th>
      <th>Current Value</th>
      <th>New Value</th>
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

$sql = "SELECT * from SoccerManagers where CoachID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['iCoachID']);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td>First Name</td>
    <td><?=$row["FirstName"]?></td>
    <td>
      <form action="soccer_managers-edit-save.php" method="post">
        <input type="text" name="iFirstName"><input type="submit" value="Edit">
        <input type="hidden" name="iCoachID" value="<?=$row["CoachID"]?>" />
      </form>
    </td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><?=$row["LastName"]?></td>
    <td>
      <form action="soccer_managers-edit-save.php" method="post">
        <input type="text" name="iLastName"><input type="submit" value="Edit">
        <input type="hidden" name="iCoachID" value="<?=$row["CoachID"]?>" />
      </form>
    </td>
  </tr>
  <tr>
    <td>Club</td>
    <td><?=$row["Club"]?></td>
    <td>
      <form action="soccer_managers-edit-save.php" method="post">
        <input type="text" name="iClub"><input type="submit" value="Edit">
        <input type="hidden" name="iCoachID" value="<?=$row["CoachID"]?>" />
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
<div>
    <a class="btn btn-primary" type="button" href="soccer_managers.php">Go Back</a>
</div>

<?php include 'footer.php';?>