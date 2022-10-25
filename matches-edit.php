<?php include 'header.php';?>

    <h1>Edit Matches</h1>
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

$sql = "SELECT * from Matches where MatchID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['iMatchID']);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td>Home Team</td>
    <td><?=$row["HomeTeam"]?></td>
    <td>
      <form action="matches-edit-save.php" method="post">
        <input type="text" name="iHomeTeam"><input type="submit" value="Edit">
        <input type="hidden" name="iMatchID" value="<?=$row["MatchID"]?>" />
      </form>
    </td>
  </tr>
  <tr>
    <td>Away Team</td>
    <td><?=$row["AwayTeam"]?></td>
    <td>
      <form action="matches-edit-save.php" method="post">
        <input type="text" name="iAwayTeam"><input type="submit" value="Edit">
        <input type="hidden" name="iMatchID" value="<?=$row["MatchID"]?>" />
      </form>
    </td>
  </tr>
  <tr>
    <td>Home Team Goals</td>
    <td><?=$row["HomeTeamGoals"]?></td>
    <td>
      <form action="matches-edit-save.php" method="post">
        <input type="text" name="iHomeTeamGoals"><input type="submit" value="Edit">
        <input type="hidden" name="iMatchID" value="<?=$row["MatchID"]?>" />
      </form>
    </td>
  </tr>
  <tr>
    <td>Away Team Goals</td>
    <td><?=$row["AwayTeamGoals"]?></td>
    <td>
      <form action="matches-edit-save.php" method="post">
        <input type="text" name="iAwayTeamGoals"><input type="submit" value="Edit">
        <input type="hidden" name="iMatchID" value="<?=$row["MatchID"]?>" />
      </form>
    </td>
  </tr>
  <tr>
    <td>Matchday</td>
    <td><?=$row["Matchday"]?></td>
    <td>
      <form action="matches-edit-save.php" method="post">
        <input type="text" name="iMatchday"><input type="submit" value="Edit">
        <input type="hidden" name="iMatchID" value="<?=$row["MatchID"]?>" />
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
    <a class="btn btn-primary" type="button" href="matches.php">Go Back</a>
</div>

<?php include 'footer.php';?>