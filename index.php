<?php include 'header.php';?>

<h1>Teams</h1>
<div>
  <a class="btn btn-primary" type="button" href="matches.php">Show Matches</a>
  <a class="btn btn-primary" type="button" href="soccer_managers.php">Show Managers</a>
  <a class="btn btn-primary" type="button" href="soccer_players.php">Show Players</a>
  <!-- <a class="btn btn-primary" type="button" href="managers-matches.php">Show Managers-Matches Join</a> -->
  <!-- <a class="btn btn-primary" type="button" href="club-cards.php">Show Club-Cards</a> -->
</div>
<br></br>
<div>
  <strong>Filter players by position:</strong>
  <form action="soccer_players.php" method="post">
  Position: <input type="text" name="position"><br>
  <input type="submit">
  </form>
</div>
<br></br>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Club</th>
      <th>Standings</th>
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

$sql = "SELECT Club, Standings FROM Teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><a href="matches.php?Team=<?=$row["Club"]?>"><?=$row["Club"]?></a></td>
    <td><?=$row["Standings"]?></td>
    <!-- <td>
      <form method="post" action="club-edit.php">
        <input type="hidden" name="iClub" value="<?=$row["Club"]?>" />
        <input type="submit" value="Edit" class="btn" />
      </form>
    </td> -->
    <td>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editClub<?=$row["Club"]?>">
        Edit
      </button>
      <div class="modal fade" id="editClub<?=$row["Club"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editClub<?=$row["Club"]?>Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editClub<?=$row["Club"]?>Label">Edit Club</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="club-edit-save.php">
                <div class="mb-3">
                  <label for="editClub<?=$row["Club"]?>Name" class="form-label">Standings</label>
                  <input type="text" class="form-control" id="editClub<?=$row["Club"]?>Name" aria-describedby="editClub<?=$row["Club"]?>Help" name="iStandings" value="<?=$row['Standings']?>">
                  <div id="editClub<?=$row["Club"]?>Help" class="form-text">Enter the Club's current standings.</div>
                </div>
                <input type="hidden" name="iClub" value="<?=$row['Club']?>">
                <input type="hidden" name="saveType" value="Edit">
                <input type="submit" class="btn btn-primary" value="Submit">
              </form>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td>
      <form method="post" action="club-delete-save.php">
        <input type="hidden" name="iClub" value="<?=$row["Club"]?>" />
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
    <a href="club-add.php" class="btn btn-primary">Add New</a>

<?php include 'footer.php';?>
