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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Navbar.css">
    <link rel="stylesheet" href="../CSS/Forum.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<?php
include "Navbar.php"
?>
<div class="maincontent">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-3 margin"></div>
        <div class="col-xs-10 col-sm-10 col-md-6 forumcontent">
            <ul>
                <?php
                $requete2 = $bdd->query('SELECT moderator.idTopics, topic.label, moderator.idUser, user.pseudo FROM moderator INNER JOIN topic ON moderator.idTopics = topic.idTopics INNER JOIN user ON moderator.idUser = user.idUser ORDER BY moderator.idTopics ASC');
                $donnees2 = $requete2->fetchAll();
                $topic = 0;
                $mods = "";
                foreach ($donnees2 as $value) {
                    if ($value['idTopics'] != $topic && $topic != 0) {
                        $mods = rtrim($mods, ", ");
                        echo '<li class="well"><a href="Topic.php?topic=' . $topic . '">' . $label . '</a><p>Modérateurs : ' . $mods . '</p></li>';
                        $mods = "";
                    }
                    $topic = $value['idTopics'];
                    $label = $value['label'];
                    $mods .= $value['pseudo'] . ", ";
                }
                $mods = rtrim($mods, ", ");
                echo '<li class="well"><a href="Topic.php?topic=' . $topic . '">' . $label . '</a><p>Modérateurs : ' . $mods . '</p></li>';
                ?>
            </ul>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-3"></div>
    </div>
</div>
</body>
</html>
