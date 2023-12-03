<?php
require('config/Connect.php');
class FetchClass extends Connect{

  // displays classes in classes.php
  public function DisplayClasses(){
   $query = "SELECT * FROM battle";
   $stmt = $this -> prepare($query);
   $stmt -> execute();
   while($row = $stmt->fetch()){
      $name_class=$row["name_class"];
      $img_class=$row["img_class"];	
      $description=$row["description"];	
      $ability1=$row["ability1"];	
      $ability2=$row["ability2"];	
      $ability3=$row["ability3"];	
      $health=$row["health"];	
      $armor=$row["armor"];	
      $offense=$row["offense"];	
      $defense=$row["defense"];	
      $speed=$row["speed"];
      $color=$row["color"];
      echo "    <div class='flip-card'>
      <div class='flip-card-front' style=\"background-image:url('assets/img/battle/$img_class')\">
        <div class='inner'>
          <h3>$name_class</h3>
         <p>$description</p>
        </div>
      </div>
      <div class='flip-card-back' style=\"background-image:url('assets/img/battle/$img_class')\">
        <div class='inner'>
          <h3>Attributes</h3>
          <table class='table'>
          <thead>
            <tr>
               <th scope='col'>Stats</th>
               <th scope='col'>Weights</th>
            </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>Health</td>
                    <td>$health</td>
                  </tr>
                  <tr>
                    <td>Armor</td>
                    <td>$armor</td>
                  </tr>
                  <tr>
                    <td>Offense</td>
                    <td>$offense</td>
                  </tr>
                  </tr>
                  <tr>
                    <td>Defense</td>
                    <td>$defense</td>
                  </tr>
                  <tr>
                    <td>Speed</td>
                    <td>$speed</td>
                  </tr>
              </tbody>
          </table>
          <div class='text-center mt-3'>
            <button type='button' class='btn btn-secondary w-75 m-1 text-dark' style='background: $color;'>$ability1</button>
            <button type='button' class='btn btn-secondary w-75 m-1 text-dark' style='background: $color;'>$ability2</button>
            <button type='button' class='btn btn-secondary w-75 m-1 text-dark' style='background: $color;'>$ability3</button>
         </div>
        </div>
      </div>
    </div>";
   }
  }
  // Select Options in play.php
  public function PrepareBattle(){
    $query = "SELECT * FROM battle";
    $stmt = $this -> prepare($query);
    $stmt -> execute();
    while($row = $stmt->fetch()){
       $id_battle=$row["id_battle"];
       $name_class=$row["name_class"];
       $img_class=$row["img_class"];	
       $color=$row["color"];
       echo "<option id='$id_battle' value='$name_class' style='background: $color;'>$name_class</option>";
      }
    }

  //get player data
	public function PlayerData($valPlayer) {
		$query = "SELECT * FROM battle WHERE name_class = :name_class";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':name_class', $valPlayer);
		$stmt -> execute();
		while($row = $stmt -> fetch()){
      $id_battle=$row["id_battle"];
      $name_class=$row["name_class"];
      $img_class=$row["img_class"];	
      $description=$row["description"];	
      $ability1=$row["ability1"];	
      $ability2=$row["ability2"];	
      $ability3=$row["ability3"];	
      $health=$row["health"];	
      $armor=$row["armor"];	
      $offense=$row["offense"];	
      $defense=$row["defense"];	
      $speed=$row["speed"];
      $color=$row["color"];
    echo "<div id='protagonist' class='d-flex flex-column align-self-end'>
          <h3 class='text-center' id='playerName' name='playerName'>$name_class</h3>
          <div class='progress bg-dark mb-3' style='height: 30px;'>
          <div id='proBar' class='progress-bar progress-bar-striped progress-bar-animated bg-success' role='progressbar' aria-label='Animated striped example' aria-valuemin='0' aria-valuemax='$health' style='width: 100%'>100%</div>
          </div>
          <img src='assets/img/battle/$img_class' alt='' class='rounded-circle my-2' style='width: 300px;'>
          <button type='submit' id='pro1' class='btn btn-secondary text-dark my-1 w-75 m-auto rounded-pill' style='background: $color;'>$ability1</button>
          <button type='submit' id='pro2' class='btn btn-secondary text-dark my-1 w-75 m-auto rounded-pill' style='background: $color;'>$ability2</button>
          <button type='submit' id='pro3' class='btn btn-secondary text-dark my-1 w-75 m-auto rounded-pill' style='background: $color;'>$ability3</button>
          </div>";
	  }
  }
  //get enemy data 
	public function EnemyData($valEnemy) {
		$query = "SELECT * FROM battle WHERE name_class = :name_class";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':name_class', $valEnemy);
		$stmt -> execute();
		while($row = $stmt -> fetch()){
      $id_battle=$row["id_battle"];
      $name_class=$row["name_class"];
      $img_class=$row["img_class"];	
      $description=$row["description"];	
      $ability1=$row["ability1"];	
      $ability2=$row["ability2"];	
      $ability3=$row["ability3"];	
      $health=$row["health"];	
      $armor=$row["armor"];	
      $offense=$row["offense"];	
      $defense=$row["defense"];	
      $speed=$row["speed"];
      $color=$row["color"];
      echo "<div id='enemy'  class='d-flex flex-column align-self-end'>
            <h3 class='text-center' id='enemyName' name='enemyName'>$name_class</h3>
            <div class='progress bg-dark mb-3' style='height: 30px;'>
            <div id='eneBar' class='progress-bar progress-bar-striped progress-bar-animated bg-success' role='progressbar' aria-label='Animated striped example' aria-valuemin='0' aria-valuemax='$health' style='width: 100%'>100%</div>
            </div>
            <img src='assets/img/battle/$img_class' alt='' class='rounded-circle my-2' style='width: 300px;'>
            <button id='ene1' class='btn btn-secondary text-dark my-1 w-75 m-auto rounded-pill' style='background: $color;'>$ability1</button>
            <button id='ene2' class='btn btn-secondary text-dark my-1 w-75 m-auto rounded-pill' style='background: $color;'>$ability2</button>
            <button id='ene3' class='btn btn-secondary text-dark my-1 w-75 m-auto rounded-pill' style='background: $color;'>$ability3</button>
            </div>";
    }
	}

  //convert mysql data into json
   public function Conversion(){
    $json=[];
    $json2=[];
    $query = "SELECT * FROM battle";
    $stmt = $this -> prepare($query);
    $stmt -> execute();
    while($row = $stmt->fetch()){
      $json[]=$row;
    }
    header('Content-Type: application/json');
    $jsn = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents("api/data.json",$jsn); 
  } 



  public function ScoreData() {
    $username =$_SESSION["username"];
    $query = "SELECT * FROM score WHERE username = :username ORDER BY id_score DESC;";
    $stmt = $this -> prepare($query);
    $stmt -> bindParam(':username', $username);
    $stmt -> execute();
    while($row = $stmt -> fetch()){
    $player=$row["player"];
    $enemy=$row["enemy"];
    $result=$row["result"];	
    echo "<tr>
          <td>$player</td>
          <td>$enemy</td>
          <td>$result</td>
          </tr>";
    }
 }
} 
?>