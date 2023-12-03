let myForm = document.getElementById("myForm");
let faction = document.getElementById("faction");
let errorFaction = document.getElementById("errorFaction");
let firstName = document.getElementById("first_name");
let lastName = document.getElementById("last_name");
let errorName = document.getElementById("errorName");
let username = document.getElementById("username");
let errorUser = document.getElementById("errorUser");
let email = document.getElementById("email");
let errorEmail = document.getElementById("errorEmail");
let password = document.getElementById("password");
let passwordConfirm = document.getElementById("passwordConfirm");
let errorPassword = document.getElementById("errorPassword");
let submitBtn = document.getElementById("submitBtn");
let message = document.getElementById("message");

//flags for the status of the user inputs
let usernameValid = "no";
let emailValid = "no";
let passwordValid = "no";

//function check if both fields are valid
function checkValid() {
  if (usernameValid == "yes" && passwordValid == "yes" && emailValid == "yes") {
    submitBtn.disabled = false;
  } else {
    submitBtn.disabled = true;
  }
}

//check if username exists
username.addEventListener("keyup", (event) => {
  let formData = new FormData();
  formData.append("username", username.value);
  formData.append("userTestCheck", "userTestCheck");
  if (username.value.length >= 3) {
    fetch("class/FormClass.php", {
      method: "post",
      body: formData,
    })
      .then((res) => res.json())
      .then(function (data) {
        console.log(data);
        // Von PHP wird true oder false gesendet
        if (data) {
          //user dont exist
          const successful = `<div id="successful" class="alert alert-success w-100 p-1 m-auto" role="alert">
                    This Username is Available!
                    </div>`;
          errorUser.innerHTML = successful;
          usernameValid = "yes";
          checkValid();
        } else {
          //user dont exist
          //user exist
          const failure = `<div id="failure" class="alert alert-danger w-100 p-1 m-auto" role="alert">
                           <strong>Sorry!</strong> This Username is already taken!
                           </div>`;
          errorUser.innerHTML = failure;
          usernameValid = "no";
          checkValid();
        }
      })
      .catch((error) => console.log(error));
  }
});

// checks if email exists
email.addEventListener("blur", (event) => {
  let formData = new FormData();
  formData.append("email", email.value);
  formData.append("emailTestCheck", "emailTestCheck");
  fetch("class/FormClass.php", {
    method: "post",
    body: formData,
  })
    .then((res) => res.json())
    .then(function (data) {
      console.log(data);
      // Von PHP wird true oder false gesendet
      if (data) {
        const successful = `<div id="successful" class="alert alert-success w-100 p-1 m-auto" role="alert">
                            This Email is Available!
                            </div>`;
        errorEmail.innerHTML = successful;
        emailValid = "yes";
      } else {
        const failure = `<div id="failure" class="alert alert-danger w-100 p-1 m-auto" role="alert">
        <strong>Sorry!</strong> This Email is already taken!
        </div>`;
        errorEmail.innerHTML = failure;
        emailValid = "no";
      }
    })
    .catch((error) => console.log(error));
});

//check is password is in regex form
password.addEventListener("keyup", (event) => {
  let formData = new FormData();
  formData.append("password", password.value);
  formData.append("passwordTestCheck", "passwordTestCheck");
  fetch("class/FormClass.php", {
    method: "post",
    body: formData,
  })
    //.then((res) => console.log(res.json()))
    .then((res) => res.json())
    .then(function (data) {
      console.log(data);
      if (data) {
        const successful = `<div id="successful" class="alert alert-success w-100 p-1 m-auto" role="alert">
                              This Password is valid!
                              </div>`;
        errorPassword.innerHTML = successful;
        passwordValid = "yes";
        checkValid();
      } else {
        const failure = `<div id="failure" class="alert alert-danger w-100 p-1 m-auto" role="alert">
                           <small>Mix of uppercase, lowercase & numbers</small>
                           </div>`;
        errorPassword.innerHTML = failure;
        passwordValid = "no";
        checkValid();
      }
    })
    .catch((error) => console.log(error));
});

// insert data in db
myForm.addEventListener("submit", function (event) {
  event.preventDefault();
  let formData = new FormData();
  formData.append("faction", faction.value);
  formData.append("first_name", firstName.value);
  formData.append("last_name", lastName.value);
  formData.append("username", username.value);
  formData.append("email", email.value);
  formData.append("password", password.value);
  formData.append("submitBtn", submitBtn.value);
  formData.append("createTestCheck", "createTestCheck");
  fetch("class/FormClass.php", {
    method: "post",
    body: formData,
  })
    .then((res) => res.json())
    .then(function (data) {
      console.log(data);
      if (data) {
        let displayEmail = document.getElementById("email").value;
        myForm.classList.add("d-none");
        const successful = `
                          <p>&nbsp;</p><div id="successful" class="alert alert-success w-50 m-auto" role="alert">
                          <strong>Congrats!</strong> Your registration was successful! <br>
                          Verification Email is sent to ${displayEmail}
                          </div> <br>
                          <p>&nbsp;</p><div class="w-25 m-auto"><a href="login.php" class="btn btn-about w-100 m-auto">Login</a></div>`;
        message.innerHTML = successful;
      } else {
        const failure = `
                        <p>&nbsp;</p><div id="failure" class="alert alert-danger w-100 m-auto" role="alert">
                        <strong>Sorry!</strong> Your registration has failed!
                        </div>`;
        message.innerHTML = failure;
      }
    })
    .catch((error) => console.log(error));
});
