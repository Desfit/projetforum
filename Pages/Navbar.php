<?php
$navigatorLanguage = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
$navigatorLanguage = strtolower((substr(chop($navigatorLanguage[0]), 0, 2)));
if ($navigatorLanguage == 'fr') {
    include '../Lang/fr.php';
} else {
    include '../Lang/en.php';
}
?>

<div class="row">
    <div class="col-sm-0 col-md-2"></div>
    <div id="imgpresentation" class="col-sm-12 col-md-8"></div>
    <div class="col-sm-0 col-md-2"></div>
</div>
<div class="row">
    <div class="col-sm-0 col-md-2"></div>
    <nav class="navbar navbar-default col-sm-12 col-md-8">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="#">BTN1</a></li>
                <li><a href="#">BTN2</a></li>
                <li><a href="#">BTN3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=""><?php echo "" . BTN_SIGNIN . ""; ?></a></li>
                <li><a href=""><?php echo "" . BTN_LOGIN . ""; ?></a></li>
                <li><a href="Index.php" class="btnav"><?php echo BTN_HOME; ?></a></li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="col-sm-0 col-md-2 marginright"></div>
</div>

<!--<form action="" method="post">
    <input type="text" name="pseudo" class="txtinput">
    <input type="password" name="password" class="txtinput">
    <input type="submit" value=<?php
    //echo "\"" . BTN_LOGIN . "\"";
    ?> class="btnco">
</form> --!>
