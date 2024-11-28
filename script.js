const home = document.querySelector(".home"),
  formContainer = document.querySelector(".form_container"),
  formCloseBtn = document.querySelector(".form_close"),
  signupBtn = document.querySelector("#signup"),
  loginBtn = document.querySelector("#login"),
  pwShowHide = document.querySelectorAll(".pw_hide"),
  newPasswordBtn = document.querySelector("#newPassword"),
  backToLoginBtn = document.querySelector("#backToLogin");

// Direkt beim Laden der Seite das Formular anzeigen
document.addEventListener("DOMContentLoaded", () => {
  home.classList.add("show");  // Zeigt das Formular direkt an
  formContainer.classList.add("active"); // Setzt die Klasse 'active', um das Login-Formular anzuzeigen
});

// Formular schließen
formCloseBtn.addEventListener("click", () => home.classList.remove("show"));

// Passwort anzeigen/verborgen machen
pwShowHide.forEach((icon) => {
  icon.addEventListener("click", () => {
    let getPwInput = icon.parentElement.querySelector("input");
    if (getPwInput.type === "password") {
      getPwInput.type = "text";
      icon.classList.replace("uil-eye-slash", "uil-eye");
    } else {
      getPwInput.type = "password";
      icon.classList.replace("uil-eye", "uil-eye-slash");
    }
  });
});

// Account erstellen Formular anzeigen
signupBtn.addEventListener("click", (e) => {
  e.preventDefault();
  formContainer.classList.add("active");  // Zeigt das "Account erstellen"-Formular
});

// Zurück zum Login-Formular
loginBtn.addEventListener("click", (e) => {
  e.preventDefault();
  formContainer.classList.remove("active");  // Zeigt das "Anmelden"-Formular
});

// Formular für Passwort vergessen anzeigen
newPasswordBtn.addEventListener("click", (e) => {
  e.preventDefault();
  formContainer.classList.add("forgot");  // Zeigt das "Passwort vergessen"-Formular
});

// Zurück zum Login-Formular
backToLoginBtn.addEventListener("click", (e) => {
  e.preventDefault();
  formContainer.classList.remove("forgot");  // Geht zurück zum Login-Formular
});