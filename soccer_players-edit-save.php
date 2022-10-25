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

if (isset($_POST['iFirstName'])) {
    $iFirstName = $_POST['iFirstName'];
    $sql = "UPDATE SoccerPlayer set FirstName=? where PlayerID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iFirstName, $_POST['iPlayerID']);
    $stmt->execute();
}
elseif (isset($_POST['iLastName'])){
    $LastName = $_POST['iLastName'];
    $sql = "update SoccerPlayer set LastName=? where PlayerID=?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iLastName, $_POST['iPlayerID']);
    $stmt->execute();   
}
elseif (isset($_POST['iClub'])){
    $Club = $_POST['iClub'];
    $sql = "update SoccerPlayer set Club=? where PlayerID=?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iClub, $_POST['iPlayerID']);
    $stmt->execute();   
}
elseif (isset($_POST['iPosition'])){
    $iPosition = $_POST['iPosition'];
    $sql = "update SoccerPlayer set Position=? where PlayerID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iPosition, $_POST['iPlayerID']);
    $stmt->execute();     
}
elseif (isset($_POST['iNationality'])){
    $Nationality = $_POST['iNationality'];
    $sql = "update SoccerPlayer set Nationality=? where PlayerID=?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iNationality, $_POST['iPlayerID']);
    $stmt->execute();      
}
else {
    $sql = "update SoccerPlayer set Nationality=? where PlayerID=?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", "Arsch", $_POST['iPlayerID']);
    $stmt->execute(); 
}
?>
    
    <h1>Edit Player</h1>
<div class="alert alert-success" role="alert">
  Player edited.
</div>

<a href="soccer_players.php" class="btn btn-primary">Go back</a>
    
<?php include 'footer.php';?>