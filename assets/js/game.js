//Description

// 13 characters available
//the player and enemy character will be selected form the URL
//example (layout.php?play=do&player=MAGE&enemy=WARRIOR)
//player = mage // enemy = warrior

//each characters has 3 abilities and different stats (health, armor, offense, defense, speed)
//>>>DONE UNTIL HERE<<<

//Player chooses an ability
//Random ability will be chosen for enemy

//there are 3 types of abilities offensive, healing and defensive

//the offensive abilities wont alter the speed of a character
//healing and defensive abilities will double the speed of a character
//And healing will always go before defensive

//then compare the speed of the characters (faster goes first)

//Types of abilities and calculation
//damage (id='pro1')  = offense     (data from JSON)
//heal   (id='pro2')  = defense     Random( /1 or /2 )
//tank   (id='pro3')  = armor       Random( /1 or /2 )
//HP    (id='proBar') = health      (data from JSON)
//same for enemy (id='ene1,2,3,bar')

//HP calculation for damage ability
//Result = (Player damage *3) - (Enemy defense + Enemy armor) 600
//if (Result >= 1000){
//Enemy Hp = Enemy Hp - 999}
//battle message ("Critical Hit! you used id='pro1', enemy took '999' damage")
//elseif (Result =< 0){
//Enemy Hp = Enemy Hp - 0}
//battle message ("you used id='pro1' but it failed")
//else{
//Enemy Hp = Enemy Hp - Result}
//battle message ("you used id='pro1', enemy took 'Result' damage")

//HP calculation for heal ability
//if(Player Hp =< Player Max Hp){
//Player Hp = Player Max Hp}
//battle message ("you are at full health")
//else{
//Player Hp = Player Hp + heal}
//battle message ("you used id='pro2' and healed for 'heal'")

//HP calculation for tank ability
//Player Hp = Player Hp + (heal /3)
//Enemy Hp = Enemy Hp - tank
//battle message ("you used id='pro3', enemy took 'tank' damage and you recovered some health")

//if (Player Hp >= 0){
//battle message ("hide")
//battle end ("Defeat!")
//Button for insert into db appears}

//if (Enemy Hp >= 0){
//battle message ("hide")
//battle end ("Victory!")
//Button for insert into db appears}

let playerName = document.getElementById("playerName");
let enemyName = document.getElementById("enemyName");
let battleEnd = document.getElementById("battleEnd");
let submitGo = document.getElementById("submitGo");
let battleMessage = document.getElementById("battleMessage");
let pro1 = document.getElementById("pro1");
let pro2 = document.getElementById("pro2");
let pro3 = document.getElementById("pro3");
let ene1 = document.getElementById("ene1");
let ene2 = document.getElementById("ene2");
let ene3 = document.getElementById("ene3");
// insert data in db
submitGo.addEventListener("click", function (event) {
  event.preventDefault();
  let formData = new FormData();
  formData.append("username", jsSession);
  formData.append("playerName", playerName.innerHTML);
  formData.append("enemyName", enemyName.innerHTML);
  formData.append("battleEnd", battleEnd.innerHTML);
  formData.append("submitGo", submitGo.value);
  fetch("class/ScoreClass.php", {
    method: "post",
    body: formData,
  })
    .then((res) => res.json())
    .then(function (data) {
      console.log(data);
      if (data) {
        submitGo.classList.add("d-none");
        pro1.classList.add("d-none");
        pro2.classList.add("d-none");
        pro3.classList.add("d-none");
        ene1.classList.add("d-none");
        ene2.classList.add("d-none");
        ene3.classList.add("d-none");
        const successful = `
        <p>&nbsp;</p><div id="successful" class="alert alert-success w-75 m-auto  fs-5" role="alert">
        <strong>Congrats!</strong> The result of the battle has been saved!
        </div>`;
        battleMessage.innerHTML = successful;
      } else {
        const failure = `
        <p>&nbsp;</p><div id="failure" class="alert alert-danger w-75 m-auto fs-5" role="alert">
        <strong>Sorry!</strong> Something went wrong, unable to save!
        </div>`;
        battleMessage.innerHTML = failure;
      }
    })
    .catch((error) => console.log(error));
});
