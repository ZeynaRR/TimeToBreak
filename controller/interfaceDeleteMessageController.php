<?php
include "../model/model.php";

function deleteMessageController()
{
    $messageId= htmlspecialchars($_GET['messageId']);
    $idRoom = htmlspecialchars($_GET['idRoom']);
    deleteMessage($messageId);
    header('Location: ../view/chatRoom?idRoom=' . $idRoom . '');
}

deleteMessageController();


?>