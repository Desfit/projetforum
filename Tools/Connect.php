<?php
try //on se connecte à MySQL
{
    $bdd = new PDO('mysql:host=localhost;dbname=dbforum', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}