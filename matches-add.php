<?php include 'header.php';?>

    <h1>Add Match</h1>
<form method="post" action="matches-add-save.php">
  <div class="mb-3">
    <label for="HomeTeam" class="form-label">Home Team</label>
    <input type="text" class="form-control" id="HomeTeam" aria-describedby="homeTeamHelp" name="iHomeTeam">
    <div id="homeTeamHelp" class="form-text">Enter the Home Team.</div>
  </div>
  <div class="mb-3">
    <label for="AwayTeam" class="form-label">Away Team</label>
    <input type="text" class="form-control" id="AwayTeam" aria-describedby="awayTeamHelp" name="iAwayTeam">
    <div id="awayTeamHelp" class="form-text">Enter the Away Team.</div>
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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include 'footers.php';?>