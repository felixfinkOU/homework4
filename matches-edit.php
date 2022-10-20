<?php include 'header.php';?>

    <h1>Edit Matches</h1>
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

$sql = "SELECT * from Matches where MatchID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['iMatchID']);
$stmt->execute();
$result = $stmt->get_result();
$oHomeTeam = $_POST['oHomeTeam'];

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="matches-edit-save.php">
  <div class="mb-3">
    <label for="HomeTeam" class="form-label">HomeTeam</label>
    <select class="form-select" aria-label="Select HomeTeam" id="HomeTeam" name="iHomeTeam">
    <?php
        $homeTeamSql = "select * from Teams order by Club";
        $homeTeamResult = $conn->query($homeTeamSql);
        while($homeTeamRow = $homeTeamResult->fetch_assoc()) {
          if ($homeTeamRow['Club'] == $row['Club']) {
            $selText = " selected";
          } else {
            $selText = "";
          }
    ?>
      <option value="<?=$homeTeamRow['Club']?>"<?=$selText?>><?=$homeTeamRow['Club']?></option>
    <?php
        }
    ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="AwayTeam" class="form-label">AwayTeam</label>
    <select class="form-select" aria-label="Select AwayTeam" id="AwayTeam" name="iAwayTeam">
    <?php
        $awayTeamSql = "select * from Teams order by Club";
        $awayTeamResult = $conn->query($awayTeamSql);
        while($awayTeamRow = $awayTeamResult->fetch_assoc()) {
          if ($awayTeamRow['Club'] == $row['Club']) {
            $selText = " selected";
          } else {
            $selText = "";
          }
    ?>
      <option value="<?=$awayTeamRow['Club']?>"<?=$selText?>><?=$awayTeamRow['Club']?></option>
    <?php
        }
    ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="HomeTeamGoals" class="form-label">Home Team Goals</label>
    <input type="text" class="form-control" id="HomeTeamGoals" aria-describedby="homeTeamGoalsHelp" name="iHomeTeamGoals">
    <div id="homeTeamGoalsHelp" class="form-text">Enter the how many goals the home team scored.</div>
  </div>
  <div class="mb-3">
    <label for="AwayTeamGoals" class="form-label">Away Team Goals</label>
    <input type="text" class="form-control" id="AwayTeamGoals" aria-describedby="awayTeamGoalsHelp" name="iAwayTeamGoals">
    <div id="awayTeamGoalsHelp" class="form-text">Enter the how many goals the away twam scored.</div>
  </div>
  <div class="mb-3">
    <label for="Matchday" class="form-label">Matchday</label>
    <input type="text" class="form-control" id="Matchday" aria-describedby="matchdayHelp" name="iMatchday">
    <div id="matchdayHelp" class="form-text">Enter the matchday of the game. (The week the game took place)</div>
  </div>
  <input type="hidden" name="iMatchID" value="<?=$row['MatchID']?>">
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
