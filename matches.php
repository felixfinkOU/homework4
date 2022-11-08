<?php include 'header.php';?>

    <h1>Matches</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>MatchID</th>
      <th>HomeTeam</th>
      <th>AwayTeam</th>
      <th>HomeTeamGoals</th>
      <th>AwayTeamGoals</th>
      <th>Matchday</th>
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

if (isset($_GET['Team'])) {
    $var = $_GET['Team'];
    $sql = "SELECT * from Matches where HomeTeam='$var' OR AwayTeam='$var'";
}
else {
    $sql = "SELECT * from Matches";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["MatchID"]?></td>
    <td><?=$row["HomeTeam"]?></td>
    <td><?=$row["AwayTeam"]?></td>
    <td><?=$row["HomeTeamGoals"]?></td>
    <td><?=$row["AwayTeamGoals"]?></td>
    <td><?=$row["Matchday"]?></td>
    <td>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editMatch<?=$row["MatchID"]?>">
        Edit
      </button>
      <div class="modal fade" id="editMatch<?=$row["MatchID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editMatch<?=$row["MatchID"]?>Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editMatch<?=$row["MatchID"]?>Label">Edit Match</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="matches-edit-save.php">
                <div class="mb-3">
                  <label for="editMatch<?=$row["MatchID"]?>HomeTeam" class="form-label">Home Team</label>
                  <select class="form-select" id="editMatch<?=$row["MatchID"]?>HomeTeam" aria-label="Select HomeTeam" name="iHomeTeam" value="<?=$row['HomeTeam']?>">
                  <?php
                      $clubSql = "select * from Teams order by Club";
                      $clubResult = $conn->query($clubSql);
                      while($clubRow = $clubResult->fetch_assoc()) {
                        if ($clubRow['Club'] == $row['Club']) {
                          $selText = " selected";
                        } else {
                          $selText = "";
                        }
                  ?>
                    <option value="<?=$clubRow['Club']?>"<?=$selText?>><?=$clubRow['Club']?></option>
                  <?php
                      }
                  ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="editMatch<?=$row["MatchID"]?>AwayTeam" class="form-label">Away Team</label>
                  <select class="form-select" id="editMatch<?=$row["MatchID"]?>AwayTeam" aria-label="Select AwayTeam" name="iAwayTeam" value="<?=$row['AwayTeam']?>">
                  <?php
                      $clubSql = "select * from Teams order by Club";
                      $clubResult = $conn->query($clubSql);
                      while($clubRow = $clubResult->fetch_assoc()) {
                        if ($clubRow['Club'] == $row['Club']) {
                          $selText = " selected";
                        } else {
                          $selText = "";
                        }
                  ?>
                    <option value="<?=$clubRow['Club']?>"<?=$selText?>><?=$clubRow['Club']?></option>
                  <?php
                      }
                  ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="editMatch<?=$row["MatchID"]?>HomeTeamGoals" class="form-label">HomeTeamGoals</label>
                  <input type="text" class="form-control" id="editMatch<?=$row["MatchID"]?>HomeTeamGoals" aria-describedby="editMatch<?=$row["MatchID"]?>Help" name="iHomeTeamGoals" value="<?=$row['HomeTeamGoals']?>">
                  <div id="editMatch<?=$row["MatchID"]?>Help" class="form-text">Enter the Home Team's Goals.</div>
                </div>
                <div class="mb-3">
                  <label for="editMatch<?=$row["MatchID"]?>AwayTeamGoals" class="form-label">AwayTeamGoals</label>
                  <input type="text" class="form-control" id="editMatch<?=$row["MatchID"]?>AwayTeamGoals" aria-describedby="editMatch<?=$row["MatchID"]?>Help" name="iAwayTeamGoals" value="<?=$row['AwayTeamGoals']?>">
                  <div id="editMatch<?=$row["MatchID"]?>Help" class="form-text">Enter the Away Team's Goals.</div>
                </div>
                <div class="mb-3">
                  <label for="editMatch<?=$row["MatchID"]?>Matchday" class="form-label">Matchday</label>
                  <input type="text" class="form-control" id="editMatch<?=$row["MatchID"]?>Matchday" aria-describedby="editMatch<?=$row["MatchID"]?>Help" name="iMatchday" value="<?=$row['Matchday']?>">
                  <div id="editMatch<?=$row["MatchID"]?>Help" class="form-text">Enter the Matchday.</div>
                </div>
                <input type="hidden" name="iMatchID" value="<?=$row['MatchID']?>">
                <input type="hidden" name="saveType" value="Edit">
                <input type="submit" class="btn btn-primary" value="Submit">
              </form>
            </div> 
          </div>
        </div>
      </div>
    </td>
    <td>
      <form method="post" action="matches-delete-save.php">
        <input type="hidden" name="iMatchID" value="<?=$row["MatchID"]?>" />
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
<a href="matches-add.php" class="btn btn-primary">Add New</a>

<?php include 'footer.php';?>