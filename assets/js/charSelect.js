//Global Variables
var player = "DeathKnight";
var enemy = "DeathKnight";

//Ready
$(document).ready(function () {
  //Start button
  $("#start").click(function () {
    window.location.href = "layout.php?play=do&p=" + player + "&e=" + enemy;
  });
  //Player selector
  $("#playertitle").change(function () {
    player = $(this).val();
    $("#player").css(
      "background-image",
      "url(assets/img/battle/" + player + ".jpg)"
    );
    $("#title").text(player + " - " + enemy);
  });

  //Enemy selector
  $("#enemytitle").change(function () {
    enemy = $(this).val();
    $("#enemy").css(
      "background-image",
      "url(assets/img/battle/" + enemy + ".jpg)"
    );
    $("#title").text(player + " - " + enemy);
  });
});
