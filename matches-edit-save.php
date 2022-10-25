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

$iMatchID = $_POST['iMatchID'];
$iHomeTeam = $_POST['iHomeTeam'];
$iAwayTeam = $_POST['iAwayTeam'];
$iHomeTeamGoals = $_POST['iHomeTeamGoals'];
$iAwayTeamGoals = $_POST['iAwayTeamGoals'];
$iMatchday = $_POST['iMatchday']; 

$sql = "UPDATE Matches set HomeTeam=?, AwayTeam=?, HomeTeamGoals=?, AwayTeamGoals=?, Matchday=? where MatchID=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiis", $iHomeTeam, $iAwayTeam, $iHomeTeamGoals, $iAwayTeamGoals, $iMatchday, $iMatchID);
    $stmt->execute();
?>
    
    <h1>Edit Match</h1>
<div class="alert alert-success" role="alert">
  Match edited.
</div>
    <a href="matches.php" class="btn btn-primary">Go back</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>