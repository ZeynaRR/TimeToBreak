<?php


function validateAuthentication()
{
    $isUser = false;
    $req = getUsers();
    if (isset($_POST["login"]) && isset($_POST["password"])) {
        $login = htmlspecialchars($_POST["login"]);
        $password = htmlspecialchars($_POST["password"]);
        while ($donnees = $req->fetch()) {
            if ($donnees['mailUser'] == $login && password_verify($password, $donnees['passwordUser'])) {
                $isUser = true;
            }
        }
        if(isBanned($login)){
            $isUser = false;
        }
    }
    return $isUser;
}
function connection() {
    require("../view/connexion.php");
}
function connect() {
    if (validateAuthentication()) {

        $login = htmlspecialchars($_POST['login']);

        $user = getUserByMail($login);

        $_SESSION['id'] = $user['idUser'];
        $_SESSION['pseudo'] = $user['pseudoUser'];
        $_SESSION['mail'] = $user['mailUser'];
        $_SESSION['status'] = $user['credentialUser'];

        header("Location: ?action=tdb");

    } else {
        $login = htmlspecialchars($_POST['login']);
        if(isBanned($login)){
            $error = "Vous avez été banni de la plateforme en raison du non respect des conditions d'utilisation, votre compte à été désactivé.";
            deleteUserByMail($login);
        }
        else{
            $error = "Votre adresse mail ou votre mot de passe sont incorrects";
        }
        require("../view/connexion.php");
    }
}
?>