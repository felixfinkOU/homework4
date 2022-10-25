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


$var = $_POST['iPlayerID'];
$sql = "SELECT * from SoccerPlayer where PlayerID='$var'";

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
    <!-- A button to open the popup form -->
    <button class="open-button" onclick="openForm()">Edit First Name</button>

    <!-- The form -->
    <div class="form-popup" id="myForm">
    <form method= "post" action="soccer_players-edit-save.php" class="form-container">
        <h1>Edit First Name</h1>

        <label for="FirstName"><b>FirstName</b></label>
        <input type="text" placeholder="Enter First Name" name="iFirstName" required>
        

        <button type="submit" class="btn">Submit</button>
    </form>
    </div>
</div>
<div>
    <a class="btn btn-primary" type="button" href="index.php">Go Back</a>
</div>

<?php include 'footer.php';?>