<?php include "../model/model.php"?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../ressources/css/generalCss.css">
    <link rel="stylesheet" type="text/css" href="../ressources/css/chatRoom.css">
</head>

<body>
<h1> <?php echo getRoomInfo() ?> </h1>
<div id="main">
    <div id="chatBox">
        <div id="messages">
            <?php getMessages(15);?>
        </div>
        <form id="sendMessage" method="post" action="../controller/sendChatMessageController.php">
            <input type="hidden" value="<?php echo htmlspecialchars($_GET['idRoom'])?>" name="idRoom" id="idRoom">
            <input type="text" name="messageInput" id="messageInput">
            <input type="submit" value="Submit" id="submitButton">
        </form>
    </div>
</div>
</body>
</html>

<script
