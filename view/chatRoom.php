

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/generalCss.css">
    <link rel="stylesheet" type="text/css" href="css/chatRoom.css">
</head>

<body>
<?php if (isset($_SESSION['id'])) {
    include("header.php");
}
?>
<h1> <?php echo getRoomInfo() ?> </h1>
<div id="main" class="container content">
    <div id="chatBox">
        <div id="messages">
            <?php getMessages(htmlspecialchars($_GET['idRoom'])); ?>
        </div>
        <form id="sendMessage" method="post" action="?action=sendMessage">
            <input type="hidden" value="<?php echo htmlspecialchars($_GET['idRoom'])?>" name="idRoom" id="idRoom">
            <input type="text" name="messageInput" id="messageInput" maxlength="255">
            <input type="submit" value="Submit" id="submitButton">
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
<?php include("footer.php");?>
</html>
