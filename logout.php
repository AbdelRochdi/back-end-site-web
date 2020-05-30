<?php include "db.php" ?>
<?php ob_start() ?>
<?php session_start() ?>

<?php 
    $_SESSION['id'] = null;
    $_SESSION['fname'] = null;
    $_SESSION['lname'] = null;

    header('Location: index.php');
?>