<?php include 'header.php';?>
    
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
$iHomeTeam = $_POST['iHomeTeam'];
$iAwayTeam = $_POST['iAwayTeam'];
$iHomeTeamGoals = $_POST['iHomeTeamGoals'];
$iAwayTeamGoals = $_POST['iAwayTeamGoals'];
$iMatchday = $_POST['iMatchday'];

$sql = "insert into Matches (HomeTeam, AwayTeam, HomeTeamGoals, AwayTeamGoals, Matchday) value (?,?,?,?,?)";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiii", $iClub, $iStandings, $iHomeTeamGoals, $iAwayTeamGoals, $iMatchday);
    $stmt->execute();
?>
    
    <h1>Add Match</h1>
<div class="alert alert-success" role="alert">
  New match added.
</div>
<div>
    <a href="matches.php" class="btn btn-primary">Go back</a>
    <a href="matches-add.php" class="btn btn-primary">Add New</a>
</div>
    
<?php include 'footers.php';?>