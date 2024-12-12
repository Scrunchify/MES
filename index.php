<?php
$formAction = isset($_GET['action']) ? $_GET['action'] : 'login'; // Standardformular ist 'login'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
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
            <a href="index.php?action=login" class="button">Anmelden</a>
        </nav>
    </header>

    <section class="home">
        <div class="form_container">
            <?php if ($formAction === 'login') { ?>
                <!-- Login-Formular -->
                <form action="index.php?action=login" method="POST">
                    <h2>Anmelden</h2>
                    <div class="input_box">
                        <input type="email" name="email" placeholder="Email eingeben" required />
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" name="password" placeholder="Passwort eingeben" required />
                        <i class="uil uil-lock password"></i>
                    </div>
                    <button class="button">Jetzt einloggen</button>
                    <div class="login_signup">Noch keinen Account? <a href="index.php?action=signup">Account erstellen</a></div>
                    <div class="login_signup"><a href="index.php?action=forgot_password">Passwort vergessen?</a></div>
                </form>
            <?php } elseif ($formAction === 'signup') { ?>
                <!-- Signup-Formular -->
                <form action="index.php?action=signup" method="POST">
                    <h2>Account erstellen</h2>
                    <div class="input_box">
                        <input type="email" name="email" placeholder="Email eingeben" required />
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" name="password" placeholder="Passwort erstellen" required />
                        <i class="uil uil-lock password"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" name="confirm_password" placeholder="Passwort bestätigen" required />
                        <i class="uil uil-lock password"></i>
                    </div>
                    <button class="button">Jetzt Account erstellen</button>
                    <div class="login_signup">Bereits einen Account? <a href="index.php?action=login">Anmelden</a></div>
                </form>
            <?php } elseif ($formAction === 'forgot_password') { ?>
                <!-- Passwort vergessen Formular -->
                <form action="index.php?action=forgot_password" method="POST">
                    <h2>Passwort vergessen</h2>
                    <div class="input_box">
                        <input type="email" name="email" placeholder="Email eingeben" required />
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <button class="button">Email senden</button>
                    <div class="login_signup">Erinnert? <a href="index.php?action=login">Zurück zur Anmeldung</a></div>
                </form>
            <?php } ?>
        </div>
    </section>
</body>
</html>