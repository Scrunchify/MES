<?php
class UserAuth {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $userData['password'])) {
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['email'] = $userData['email'];
                header("Location: dashboard.php");
                exit;
            } else {
                return "Falsches Passwort.";
            }
        } else {
            return "Benutzer nicht gefunden.";
        }
    }

    public function signup($email, $password, $confirmPassword) {
        if ($password !== $confirmPassword) {
            return "Passwörter stimmen nicht überein.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            return "Account erfolgreich erstellt.";
        } else {
            return "Fehler beim Erstellen des Accounts.";
        }
    }

    public function forgotPassword($email) {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Hier kannst du den E-Mail-Versand zur Passwort-Wiederherstellung einfügen
            return "Anweisungen zum Zurücksetzen des Passworts wurden gesendet.";
        } else {
            return "Benutzer nicht gefunden.";
        }
    }
}
?>
