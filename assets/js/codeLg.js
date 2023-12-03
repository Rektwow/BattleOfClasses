let myFormLg = document.getElementById("myFormLg");
let messageLg = document.getElementById("messageLg");
let usernameLg = document.getElementById("usernameLg");
let passwordLg = document.getElementById("passwordLg");
let submitBtnLg = document.getElementById("submitBtnLg");
let sessionLg = document.getElementById("sessionLg");
let loginLg = document.getElementById("loginLg");
let playLg = document.getElementById("playLg");
let logoutLg = document.getElementById("logoutLg");

//login
myFormLg.addEventListener("submit", function (event) {
  event.preventDefault();
  let formData = new FormData();
  formData.append("usernameLg", usernameLg.value);
  formData.append("passwordLg", passwordLg.value);
  formData.append("submitBtnLg", submitBtnLg.value);
  formData.append("loginTestCheck", "loginTestCheck");
  fetch("class/FormClass.php", {
    method: "post",
    body: formData,
  })
    .then((res) => res.json())
    .then(function (data) {
      console.log(data);
      if (data) {
        myFormLg.classList.add("d-none");
        const successful = `
                           <p>&nbsp;</p><div id="successful" class="alert alert-success w-75 m-auto" role="alert">
                           <strong>Congrats!</strong> Your login was successful!
                           </div>
                           <p>&nbsp;</p><div class="w-25 m-auto"><a href="play.php" class="btn btn-about w-100 m-auto">Play</a></div>`;
        messageLg.innerHTML = successful;

        sessionLg.innerHTML = usernameLg.value;
        loginLg.classList.remove("d-block");
        loginLg.classList.add("d-none");
        playLg.classList.remove("d-none");
        playLg.classList.add("d-block");
        logoutLg.classList.remove("d-none");
        logoutLg.classList.add("d-block");
      } else {
        const failure = `
                           <p>&nbsp;</p><div id="failure" class="alert alert-danger w-100 m-auto" role="alert">
                           <strong>Sorry!</strong> Your login has failed!
                           </div>`;
        messageLg.innerHTML = failure;
      }
    })
    .catch((error) => console.log(error));
});
