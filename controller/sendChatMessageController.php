<?php
include "../model/modelChatRoom.php";
$messageContent = htmlspecialchars($_POST['messageInput']);
$idRoom = htmlspecialchars($_POST['idRoom']);
$idUser = 15;
sendMessage($messageContent, $idRoom, $idUser);
header('Location: ../view/chatRoom?idRoom='. $idRoom .'')
?>