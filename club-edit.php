<?php include 'header.php';?>

    <h1>Edit Club</h1>
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

$sql = "SELECT * from Teams where Club=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_POST['iClub']);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td>Standings</td>
    <td><?=$row["Standings"]?></td>
    <td>
      <form action="club-edit-save.php" method="post">
        <input type="text" name="iStandings"><input type="submit" value="Edit">
        <input type="hidden" name="iClub" value="<?=$row["Club"]?>" />
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
    <a class="btn btn-primary" type="button" href="index.php">Go Back</a>
</div>

<?php include 'footer.php';?>