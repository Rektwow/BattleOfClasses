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
import data from "./api/data.json" assert { type: "json" };

const queryString = window.location.search;
const parameters = new URLSearchParams(queryString);
const playerType = parameters.get("p");
const enemyType = parameters.get("e");

const player = data.find((o) => o.name_class === playerType);
const enemy = data.find((o) => o.name_class === enemyType);

let pro1 = document.getElementById("pro1");
let pro2 = document.getElementById("pro2");
let pro3 = document.getElementById("pro3");

function PercentageHealth(dmg, HealthTotal) {
  let percdmg = (dmg * 100) / HealthTotal;
  return percdmg;
}

function PercentageHeal(health, totalHealth) {
  return (health * 100) / totalHealth;
}
var combatStatut = document.getElementById("battleMessage");
var playerHealth = player.health;
var enemyHealth = enemy.health;
var playerDefense = player.defense;
var enemyDefense = enemy.defense;
var playerSpeed = player.speed;
var enemySpeed = enemy.speed;
var PercentPlayer = 100;
var PercentEnemy = 100;

pro2.addEventListener("click", function () {
  if (randomEnnemiePlay() == "attaque") {
    document.getElementById("pro1").setAttribute("disabled", "");
    document.getElementById("pro2").setAttribute("disabled", "");
    console.log("ok");
    let random = random12();
    if (playerHealth == player.health) {
      document.getElementById("battleMessage").innerHTML =
        "you are at full health";
    } else {
      playerHealth += player.defense / random;
      document.getElementById("battleMessage").innerHTML =
        "you used " +
        player.ability2 +
        " and healed for" +
        player.defense / random;
      let percent = PercentageHealth(playerHealth, player.health);
      document.getElementById("proBar").style.width = percent + "%";

      document.getElementById("proBar").textContent = playerHealth;
    }

    setTimeout(function () {
      document.getElementById("battleMessage").innerHTML = "Ennemie Attacking";

      //  playerHealth=playerHealth-damage2;
    }, 2000);
    let damage2 = enemy.offense * 3 - (playerDefense + player.armor);

    if (damage2 <= 0) {
      setTimeout(function () {
        document.getElementById("battleMessage").innerHTML =
          "Enemy used " +
          document.getElementById("ene1").textContent +
          " but it failed";
        document.getElementById("pro1").removeAttribute("disabled");
        document.getElementById("pro2").removeAttribute("disabled");
      }, 4000);
    }

    if (damage2 > 1000) {
      setTimeout(function () {
        document.getElementById("battleMessage").innerHTML =
          "Critical Hit! he used " +
          document.getElementById("ene1").textContent +
          " you took 999 damage";
        playerHealth -= 999;
        document.getElementById("proBar").textContent = playerHealth;
        document.getElementById("pro1").removeAttribute("disabled");

        document.getElementById("pro2").removeAttribute("disabled");
      }, 4000);
    } else {
      setTimeout(function () {
        document.getElementById("battleMessage").innerHTML =
          "Enemy used" +
          document.getElementById("ene1").textContent +
          " you took " +
          damage2 +
          " damage";
        playerHealth -= damage2;
        document.getElementById("proBar").textContent = playerHealth;
        document.getElementById("pro1").removeAttribute("disabled");
        document.getElementById("pro2").removeAttribute("disabled");
      }, 4000);
    }
  } else {
    document.getElementById("pro1").setAttribute("disabled", "");
    document.getElementById("pro2").setAttribute("disabled", "");
    if (playerSpeed > enemySpeed) {
      console.log("ok");
      let random = random12();
      if (playerHealth >= player.health) {
        document.getElementById("battleMessage").innerHTML =
          "you are at full health";
      } else {
        playerHealth += player.defense / random;
        if (playerHealth > player.health) {
          playerHealth = player.health;
        }
        document.getElementById("battleMessage").innerHTML =
          "you used " +
          player.ability2 +
          " and healed for" +
          player.defense / random;
        let percent = PercentageHealth(playerHealth, player.health);
        document.getElementById("proBar").style.width = percent + "%";

        document.getElementById("proBar").textContent = playerHealth;
      }

      setTimeout(function () {
        document.getElementById("battleMessage").innerHTML = "Ennemie Healing";

        //  playerHealth=playerHealth-damage2;
      }, 2000);

      setTimeout(function () {
        let random2 = random12();
        if (enemyHealth >= enemy.health) {
          document.getElementById("battleMessage").innerHTML =
            "Enemy at full health";
          document.getElementById("pro1").removeAttribute("disabled");
          document.getElementById("pro2").removeAttribute("disabled");
        } else {
          enemyHealth += enemy.defense / random2;
          if (enemyHealth > enemy.health) {
            enemyHealth = enemy.health;
          }
          document.getElementById("battleMessage").innerHTML =
            "Enemy used " +
            enemy.ability2 +
            " and healed for" +
            enemy.defense / random2;
          let percent2 = PercentageHealth(enemyHealth, enemy.health);
          document.getElementById("eneBar").style.width = percent2 + "%";

          document.getElementById("eneBar").textContent = enemyHealth;
          document.getElementById("pro1").removeAttribute("disabled");
          document.getElementById("pro2").removeAttribute("disabled");
        }
      }, 4000);
    } else {
      let random2 = random12();
      if (enemyHealth == enemy.health) {
        document.getElementById("battleMessage").innerHTML =
          "Enemy at full health";
        document.getElementById("pro1").removeAttribute("disabled");
        document.getElementById("pro2").removeAttribute("disabled");
      } else {
        enemyHealth += enemy.defense / random2;
        if (enemyHealth > enemy.health) {
          enemyHealth = enemy.health;
        }
        document.getElementById("battleMessage").innerHTML =
          "Enemy used " +
          enemy.ability2 +
          " and healed for" +
          enemy.defense / random2;
        let percent2 = PercentageHealth(enemyHealth, enemy.health);
        document.getElementById("eneBar").style.width = percent2 + "%";

        document.getElementById("eneBar").textContent = enemyHealth;
        document.getElementById("pro1").removeAttribute("disabled");
        document.getElementById("pro2").removeAttribute("disabled");
      }

      setTimeout(function () {
        document.getElementById("battleMessage").innerHTML = "Player Healing";

        //  playerHealth=playerHealth-damage2;
      }, 2000);

      setTimeout(function () {
        let random = random12();
        if (playerHealth == player.health) {
          document.getElementById("battleMessage").innerHTML =
            "you are at full health";
        } else {
          playerHealth += player.defense / random;
          if (playerHealth > player.health) {
            playerHealth = player.health;
          }
          document.getElementById("battleMessage").innerHTML =
            "you used " +
            player.ability2 +
            " and healed for" +
            player.defense / random;
          let percent = PercentageHealth(playerHealth, player.health);
          document.getElementById("proBar").style.width = percent + "%";

          document.getElementById("proBar").textContent = playerHealth;
        }
      }, 4000);
    }
  }
});

function randomEnnemiePlay() {
  let value = Math.floor(Math.random() * (2 - 1 + 1) + 1);

  if (value == 2) return "attaque";
  else return "heal";
}

function random12() {
  let value = Math.floor(Math.random() * (2 - 1 + 1) + 1);
  return value;
}
var timerId = setInterval(function () {
  if (enemyHealth <= 0) {
    document.getElementById("pro1").setAttribute("disabled", "");
    document.getElementById("pro2").setAttribute("disabled", "");
    document.getElementById("battleEnd").textContent = "Victory";

    document.getElementById("eneBar").style.width = "1%";
    console.log(document.getElementById("proBar").style.width);
    clearInterval(timerId);
  }
  if (playerHealth <= 0) {
    document.getElementById("pro1").setAttribute("disabled", "");
    document.getElementById("pro2").setAttribute("disabled", "");
    document.getElementById("battleEnd").textContent = "Defeat";
    playerHealth = 0;
    document.getElementById("proBar").style.width = "1%";
  }
}, 2000);

//Attack function

pro1.addEventListener("click", function () {
  document.getElementById("pro1").setAttribute("disabled", "");
  document.getElementById("pro2").setAttribute("disabled", "");

  if (randomEnnemiePlay() == "heal") {
    console.log("we are no case of enemy helling and im attacking");
    let random = random12();

    document.getElementById("battleMessage").innerHTML =
      "Enemy use " + document.getElementById("ene2").textContent;
    if (enemyHealth != enemy.health) {
      enemyHealth += enemyDefense * random;

      if (enemyHealth > enemy.health) {
        enemyHealth = enemy.health;
      } else {
        PercentEnemy = PercentageHeal(enemyHealth, enemy.health);
        console.log("width : " + document.getElementById("eneBar").style.width);

        document.getElementById("eneBar").style.width = PercentEnemy + "%";
      }
      if (enemyHealth < 0) {
        enemyHealth = 0;
      }
      document.getElementById("eneBar").textContent = enemyHealth;
    }
    setTimeout(function () {
      document.getElementById("battleMessage").innerHTML =
        player.name_class + " Attacking";
    }, 2000);

    let damage = player.offense * 3 - (enemyDefense + enemy.armor);
    console.log("damage 1 " + damage);

    if (damage <= 0) {
      setTimeout(function () {
        document.getElementById("battleMessage").innerHTML =
          "you used " +
          document.getElementById("pro1").textContent +
          " but it failed";
        document.getElementById("pro1").removeAttribute("disabled");
        document.getElementById("pro2").removeAttribute("disabled");
      }, 4000);
    }
    if (damage > 1000) {
      setTimeout(function () {
        document.getElementById("battleMessage").innerHTML =
          "Critical Hit! you used " +
          document.getElementById("pro1").textContent +
          " Enemy took 999 damage";
        enemyHealth -= 999;

        PercentEnemy -= PercentageHealth(parseInt(damage), enemy.health);

        document.getElementById("eneBar").style.width = PercentEnemy + "%";
        if (enemyHealth < 0) {
          enemyHealth = 0;
        }
        document.getElementById("eneBar").textContent = enemyHealth;
        document.getElementById("pro1").removeAttribute("disabled");

        document.getElementById("pro2").removeAttribute("disabled");
      }, 4000);
    } else {
      setTimeout(function () {
        document.getElementById("battleMessage").innerHTML =
          "you used" +
          document.getElementById("pro1").textContent +
          " enemy took " +
          damage +
          " damage";
        enemyHealth -= damage;
        PercentEnemy -= PercentageHealth(parseInt(damage), enemy.health);

        document.getElementById("eneBar").style.width = PercentEnemy + "%";
        if (enemyHealth < 0) {
          enemyHealth = 0;
        }
        document.getElementById("eneBar").textContent = enemyHealth;
        document.getElementById("pro1").removeAttribute("disabled");
        document.getElementById("pro2").removeAttribute("disabled");
      }, 4000);
    }
  } else {
    if (playerSpeed > enemySpeed) {
      console.log("2 attacking and im better on speed");

      document.getElementById("battleMessage").innerHTML =
        player.name_class + " Attacking";
      let damage = player.offense * 3 - (enemyDefense + enemy.armor);
      console.log("damage 1 " + damage);

      if (damage <= 0) {
        setTimeout(function () {
          document.getElementById("battleMessage").innerHTML =
            "you used " +
            document.getElementById("pro1").textContent +
            " but it failed";
        }, 2000);
      }
      if (damage > 1000) {
        setTimeout(function () {
          document.getElementById("battleMessage").innerHTML =
            "Critical Hit! you used " +
            document.getElementById("pro1").textContent +
            " Enemy took 999 damage";
          enemyHealth -= 999;
          PercentEnemy -= PercentageHealth(parseInt(damage), enemy.health);

          document.getElementById("eneBar").style.width = PercentEnemy + "%";
          if (enemyHealth < 0) {
            enemyHealth = 0;
          }
          document.getElementById("eneBar").textContent = enemyHealth;
        }, 2000);
        enemyHealth -= 999;
      } else {
        setTimeout(function () {
          document.getElementById("battleMessage").innerHTML =
            "you used" +
            document.getElementById("pro1").textContent +
            " enemy took " +
            damage +
            " damage";

          PercentEnemy -= PercentageHealth(parseInt(damage), enemy.health);

          document.getElementById("eneBar").style.width = PercentEnemy + "%";
          if (enemyHealth < 0) {
            enemyHealth = 0;
          }
          document.getElementById("eneBar").textContent = enemyHealth;
        }, 2000);
        enemyHealth -= damage;
      }
      if (enemyHealth > 0) {
        console.log("enemy >0");
        setTimeout(function () {
          document.getElementById("battleMessage").innerHTML =
            "Enemy Attacking";
        }, 4000);

        let damage2 = enemy.offense * 3 - (playerDefense + player.armor);
        console.log("damage 2 " + damage2);

        if (damage2 <= 0) {
          setTimeout(function () {
            document.getElementById("battleMessage").innerHTML =
              "Enemy used " +
              document.getElementById("ene1").textContent +
              " but it failed";
            document.getElementById("pro1").removeAttribute("disabled");
            document.getElementById("pro2").removeAttribute("disabled");
          }, 6000);
        } else {
          if (damage2 > 1000) {
            setTimeout(function () {
              document.getElementById("battleMessage").innerHTML =
                "Critical Hit! Enemy used " +
                document.getElementById("ene1").textContent +
                " you took 999 damage";
              playerHealth -= 999;
              PercentPlayer -= PercentageHealth(
                parseInt(damage2),
                player.health
              );

              document.getElementById("proBar").style.width =
                PercentPlayer + "%";
              console.log(PercentPlayer);
              document.getElementById("proBar").textContent = playerHealth;
              document.getElementById("pro1").removeAttribute("disabled");
              document.getElementById("pro2").removeAttribute("disabled");
            }, 6000);
          } else {
            setTimeout(function () {
              document.getElementById("battleMessage").innerHTML =
                "Enemy used " +
                document.getElementById("ene1").textContent +
                " you took " +
                damage2 +
                " damage";
              playerHealth = playerHealth - damage2;
              PercentPlayer -= PercentageHealth(
                parseInt(damage2),
                player.health
              );

              document.getElementById("proBar").style.width =
                PercentPlayer + "%";
              document.getElementById("proBar").textContent = playerHealth;
              document.getElementById("pro1").removeAttribute("disabled");
              document.getElementById("pro2").removeAttribute("disabled");
            }, 6000);
          }
        }
      }
    } else {
      console.log("enemy attacking first");
      document.getElementById("battleMessage").innerHTML = "Enemy Attacking!";
      let damage3 = enemy.offense * 3 - (playerDefense + player.armor);

      if (damage3 <= 0) {
        setTimeout(function () {
          document.getElementById("battleMessage").innerHTML =
            "Enemy used " +
            document.getElementById("ene1").textContent +
            " but it failed";
          document.getElementById("pro1").removeAttribute("disabled");
          document.getElementById("pro2").removeAttribute("disabled");
        }, 2000);
      } else {
        if (damage3 > 1000) {
          setTimeout(function () {
            document.getElementById("battleMessage").innerHTML =
              "Critical Hit! Enemy used " +
              document.getElementById("ene1").textContent +
              " you took 999 damage";
            playerHealth -= 999;
            PercentPlayer -= PercentageHealth(parseInt(damage3), player.health);

            document.getElementById("proBar").style.width = PercentPlayer + "%";
            console.log(PercentPlayer);
            document.getElementById("proBar").textContent = playerHealth;
            document.getElementById("pro1").removeAttribute("disabled");
            document.getElementById("pro2").removeAttribute("disabled");
          }, 2000);
          playerHealth -= 999;
        } else {
          setTimeout(function () {
            document.getElementById("battleMessage").innerHTML =
              "Enemy used " +
              document.getElementById("ene1").textContent +
              " you took " +
              damage3 +
              " damage";

            PercentPlayer -= PercentageHealth(parseInt(damage3), player.health);

            document.getElementById("proBar").style.width = PercentPlayer + "%";
            document.getElementById("proBar").textContent = playerHealth;
            document.getElementById("pro1").removeAttribute("disabled");
            document.getElementById("pro2").removeAttribute("disabled");
          }, 2000);

          playerHealth = playerHealth - damage3;
        }
        if (playerHealth > 0) {
          console.log("playerHelth>0 " + playerHealth);
          setTimeout(function () {
            document.getElementById("battleMessage").innerHTML =
              player.name_class + " Attacking";
          }, 4000);

          let damage = player.offense * 3 - (enemyDefense + enemy.armor);
          console.log("damage 1 " + damage);

          if (damage <= 0) {
            setTimeout(function () {
              document.getElementById("battleMessage").innerHTML =
                "you used " +
                document.getElementById("pro1").textContent +
                " but it failed";
            }, 6000);
          }
          if (damage > 1000) {
            setTimeout(function () {
              document.getElementById("battleMessage").innerHTML =
                "Critical Hit! you used " +
                document.getElementById("pro1").textContent +
                " Enemy took 999 damage";
              enemyHealth -= 999;
              PercentEnemy -= PercentageHealth(parseInt(damage), enemy.health);

              document.getElementById("eneBar").style.width =
                PercentEnemy + "%";
              if (enemyHealth < 0) {
                enemyHealth = 0;
              }
              document.getElementById("eneBar").textContent = enemyHealth;
            }, 6000);
          } else {
            setTimeout(function () {
              document.getElementById("battleMessage").innerHTML =
                "you used" +
                document.getElementById("pro1").textContent +
                " enemy took " +
                damage +
                " damage";
              enemyHealth -= damage;
              PercentEnemy -= PercentageHealth(parseInt(damage), enemy.health);

              document.getElementById("eneBar").style.width =
                PercentEnemy + "%";
              if (enemyHealth < 0) {
                enemyHealth = 0;
              }
              document.getElementById("eneBar").textContent = enemyHealth;
            }, 6000);
          }
        }
      }
    }
  }
});
