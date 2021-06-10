<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../ressources/css/generalCss.css">
    <link rel="stylesheet" type="text/css" href="../ressources/css/selectChatRoom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
<?php if (isset($_SESSION['id'])) {
    include("header.php");
}
?>
<h1> Salons de Discussions </h1>
<div class="container-fluid">
<div id="main">
    <div class="search-container">
      <form action="">
          <button type="submit"><img id="searchIcon" src="../ressources/images/searchIcon.png" alt="Search"></button>
          <input type="text" placeholder="Search.." name="search">
       </form>
    </div>
    <div id="DivSalons">
       <?php affSalonsDeDiscussions();?>
    </div>
</div>
</div>
</body>
</html>
