<?php
function getAllUsers()
{
    $bdd = dataBaseConnection();
    return $bdd->query('SELECT mailUser, passwordUser FROM user');
}

function getUserByMail(String $mail) {
    $bdd = dataBaseConnection();
    $req = $bdd->prepare('SELECT * FROM user WHERE mailUser = ?');
    $req->execute(
        array(
            $mail
        )
    );
    return $req->fetch();
}

?>
