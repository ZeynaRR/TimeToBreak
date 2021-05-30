<?php
function getAllUsers()
{
    $bdd = dbConnect();
    return $bdd->query('SELECT mailUser, passwordUser FROM user');
}

function getUserByMail(String $mail) {
    $bdd = dbConnect();
    $req = $bdd->prepare('SELECT * FROM user WHERE mailUser = ?');
    $req->execute(
        array(
            $mail
        )
    );
    return $req->fetch();
}

?>
