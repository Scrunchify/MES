<?php

include("./connectDB.php");   
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MES</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  </head>
  <body>
    <header class="header">
      <nav class="nav">
        <a href="#" class="nav_logo">MES</a>
        <ul class="nav_items">
          <li class="nav_item">
            <a href="#" class="nav_link">Home</a>
            <a href="#" class="nav_link">Produkt</a>
            <a href="#" class="nav_link">Kontakt</a>
          </li>
        </ul>
        <button class="button" id="form-open">Anmelden</button>
      </nav>
    </header>

    <section class="home">
      <div class="form_container">
        <!-- Anmeldeformular -->
        <i class="uil uil-times form_close"></i>
        <div class="form login_form active">  <!-- Hier die Klasse 'active' hinzufügen -->
          <form action="#">
            <h2>Anmelden</h2>
            <div class="input_box">
              <input type="email" name="email" placeholder="Email eingeben" required />
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" name ="password" placeholder="Passwort eingeben" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Daten merken</label>
              </span>
              <div class="login_signup"><a href="#" id="newPassword">Passwort vergessen?</a></div>
            </div>
            <button class="button">Jetzt einloggen</button>
            <div class="login_signup">Noch keinen Account? <a href="#" id="signup">Account erstellen</a></div>
          </form>
        </div>    

        <!-- Formular für Account erstellen -->
        <div class="form signup_form">
          <form action="#">
            <h2>Account erstellen</h2>
            <div class="input_box">
              <input type="email" name ="email" placeholder="Email eingeben" required />
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" name="password" placeholder="Passwort erstellen" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Passwort bestätigen" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <button class="button">Jetzt Account erstellen</button>
            <div class="login_signup">Bereits einen Account? <a href="#" id="login">Anmelden</a></div>
          </form>
        </div>

        <!-- Formular für Passwort vergessen -->
        <div class="form forgot_password_form">
          <form action="#">
            <h2>Passwort vergessen</h2>
            <div class="input_box">
              <input type="email" placeholder="Email eingeben" required />
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <button class="button">Email senden</button>
            <div class="login_signup">Erinnert? <a href="#" id="backToLogin">Zurück zur Anmeldung</a></div>
          </form>
        </div>
      </div>
    </section>    

    
    <script src="script.js"></script>
  </body>
</html>