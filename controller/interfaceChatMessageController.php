<?php
include "../model/model.php";

function createAndSendMessage()
{
    $messageContent = htmlspecialchars($_POST['messageInput']);
    $idRoom = htmlspecialchars($_POST['idRoom']);
    $idUser = 14; //TODO with session
    sendMessage($messageContent, $idRoom, $idUser);
    header('Location: ../view/chatRoom?idRoom=' . $idRoom . '');
    }

    createAndSendMessage();
?>