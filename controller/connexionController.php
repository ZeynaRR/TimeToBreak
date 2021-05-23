<?php
session_start();
?>

<?php
function dataBaseConnection(){
    $bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
    return $bdd;
}
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
    //header("Location: ../view/connexion.php");
    require("../view/connexion.php");
}
function connect() {
    if (validateAuthentication()) {
        $user = getUserByMail($_POST['login']);
        $_SESSION['pseudo'] = $user['pseudoUser'];
        $_SESSION['mail'] = $user['mailUser'];
        $_SESSION['status'] = $user['credentialUser'];

        header("Location: ../view/interfaceSavingPause.php");//mettre page tableau de bord

    } else {
        $error = "Votre adresse mail ou votre mot de passe sont incorrects";
        require("../view/connexion.php");
    }
}
?>