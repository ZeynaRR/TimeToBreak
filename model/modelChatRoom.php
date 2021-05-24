<?php

function dataBaseConnection(){
    $bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
    return $bdd;
}

function affSalonsDeDiscussions() {
    $bdd = dataBaseConnection();

    $sqlSelectRooms = 'SELECT * FROM room';
    $queryRooms = $bdd->query($sqlSelectRooms);

    $queryUsersBelong = $bdd->prepare('SELECT * FROM belong WHERE idRoom = :idRoom');

    if ($queryRooms != false){
        foreach ($queryRooms as $row) {
            $queryUsersBelong->bindParam(':idRoom',$row["idRoom"], PDO::PARAM_INT );
            $queryUsersBelong->execute();
            $numberOfUsers = 0;
            if ($queryUsersBelong != false) {
                $numberOfUsers = $queryUsersBelong->rowCount();
            }
            echo("
           <div class='exempleSalon'>
               <a href='chatRoom?idRoom=". $row["idRoom"] . "'><div class='nomSalon'>Salon " . $row["nameOfTheRoom"] . " >  </div></a>
                <div class='affMembreSalon'>Membre : " . $numberOfUsers . " </div>
            </div>
            ");
      }
    }
    $bdd = null;
}

function getRoomInfo() {
    $bdd = dataBaseConnection();
    $idRoom = htmlspecialchars($_GET['idRoom']);
    $sqlSelectRoom = 'SELECT * FROM room WHERE idRoom = "'.$idRoom.'"';
    $queryRoom = $bdd->query($sqlSelectRoom);

    if ($queryRoom != false) {
        $row = $queryRoom->fetch();
        $bdd = null;
        return $row["nameOfTheRoom"];
    }
    $bdd = null;
    return "NoNameFound";
}

function getMessages($idActualUser) {
    $bdd = dataBaseConnection();
    $idRoom = htmlspecialchars($_GET['idRoom']);
    $sqlSelectMessages = 'SELECT * FROM message WHERE idRoom = "'. $idRoom .'"';
    $queryMessage = $bdd->query($sqlSelectMessages);

    $queryUsersBelong = $bdd->prepare('SELECT * FROM user WHERE idUser = :idUser');

    if ($queryMessage != false) {
        foreach ($queryMessage as $row) {

            $queryUsersBelong->bindParam(':idUser',$row["idUser"], PDO::PARAM_INT );
            $queryUsersBelong->execute();
            $rowUser = $queryUsersBelong->fetch();

            if ($row["idUser"] == $idActualUser)
                $messageClass = 'myMessages';
            else
                $messageClass = 'othersMessages';

            echo("<div class='". $messageClass ."'>
                    ". $row['contentOfTheMessage'] ."
                    <div class='peudo'>". $rowUser['pseudoUser'] ."</div>
                    <div class='time'>". $row['datetimeSendMessage'] ."</div>
                  </div>");
        }
    }
}

function sendMessage($content, $idRoom, $idUser) {
    $bdd = dataBaseConnection();
    $sqlInsertMessage = 'INSERT INTO message (idRoom, idUser, contentOfTheMessage) VALUES (?,?,?)';
    $queryInsertMessage = $bdd->prepare($sqlInsertMessage);
    $queryInsertMessage->execute( [$idRoom, $idUser, $content]);
}

?>

