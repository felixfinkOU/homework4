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

if (isset($_POST['iHomeTeam'])) {
    $iHomeTeam = $_POST['iHomeTeam'];
    $sql = "UPDATE Matches set HomeTeam=? where MatchID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iHomeTeam, $iMatchID);
    $stmt->execute();
}
elseif (isset($_POST['iAwayTeam'])){
    $iAwayTeam = $_POST['iAwayTeam'];
    $sql = "UPDATE Matches set AwayTeam=? where MatchID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iAwayTeam, $iMatchID);
    $stmt->execute();   
}
elseif (isset($_POST['iHomeTeamGoals'])){
    $iHomeTeamGoals = $_POST['iHomeTeamGoals'];
    $sql = "UPDATE Matches set HomeTeamGoals=? where MatchID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $iHomeTeamGoals, $iMatchID);
    $stmt->execute(); 
}
elseif (isset($_POST['iAwayTeamGoals'])){
    $iAwayTeamGoals = $_POST['iAwayTeamGoals'];
    $sql = "UPDATE Matches set AwayTeamGoals=? where MatchID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $iAwayTeamGoals, $iMatchID);
    $stmt->execute();
}
elseif (isset($_POST['iMatchday'])){
    $iMatchday = $_POST['iMatchday'];
    $sql = "UPDATE Matches set Matchday=? where MatchID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $iMatchday, $iMatchID);
    $stmt->execute();    
}
?>
    
    <h1>Edit Match</h1>
<div class="alert alert-success" role="alert">
  Match edited.
</div>

<a href="matches.php" class="btn btn-primary">Go back</a>
    
<?php include 'footer.php';?>