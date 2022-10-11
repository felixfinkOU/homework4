<?php include 'header.php';?>

    <h1>Edit Club</h1>
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

$sql = "SELECT Club, Standings from Teams where Club=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_POST['iClub']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="club-edit-save.php">
  <div class="mb-3">
    <label for="Standings" class="form-label">Club Standings</label>
    <input type="text" class="form-control" id="Standings" aria-describedby="standingsHelp" 
        name="iStandings" value="<?=$row['Standings']?>">
    <div id="standingsHelp" class="form-text">Enter the Club's current standing in the league.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<?php include 'footer.php';?>
