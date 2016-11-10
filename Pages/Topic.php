<?php

require_once('../Tools/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Forum Name</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Navbar.css">
    <link rel="stylesheet" href="../CSS/Forum.css">
</head>
<body>
<?php
include('Navbar.php');

$requete = $bdd->query('SELECT label FROM topic WHERE idTopics ='. $_GET["topic"]);
$donnees = $requete->fetch()
?>
<div class="row">
    <div class="col-sm-1 col-md-3 margin"></div>
    <div class="col-sm-10 col-md-6 forumcontent">
        <ul>
            <li><h2><?php echo $donnees["label"] ?></h2></li>
<?php
$requete = $bdd->query('SELECT * FROM post WHERE idTopic ='. $_GET["topic"]);

while ($donnees = $requete->fetch()) {
    echo '<li><a href="Post.php?topic=' . $_GET["topic"] .'&post='. $donnees['idTopic'] . '">' . $donnees['titre'] . '</a></li>';
}
?>
        </ul>
    </div>
    <div class="col-sm-1 col-md-3"></div>
</div>

</body>
</html>