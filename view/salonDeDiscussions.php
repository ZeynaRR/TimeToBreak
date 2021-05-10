<?php include "../model/model.php"?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../ressources/css/generalCss.css">
    <link rel="stylesheet" type="text/css" href="../ressources/css/salonDeDiscussion.css">
</head>

<body>
<h1> Salons de Discussions </h1>
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
</body>
</html>
