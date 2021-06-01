<?php
/*
function dataBaseConnection(){
    $bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
    return $bdd;
}
*/
require("../model/connexionModel.php");

function validateAuthentication()
{
    $isUser = false;
    $req = getAllUsers();
    if (isset($_POST["login"]) && isset($_POST["password"])) {
        $login = htmlspecialchars($_POST["login"]);
        $password = htmlspecialchars($_POST["password"]);
        while ($donnees = $req->fetch()) {
            if ($donnees['mailUser'] == $login && password_verify($password, $donnees['passwordUser'])) {
                $isUser = true;
            }
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
        $error = "Votre adresse mail ou votre mot de passe sont incorrects";
        require("../view/connexion.php");
    }
}
?>