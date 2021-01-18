<?php
$username = $_POST['username'];
$password = $_POST['password'];
if($username == '' || $password == ''){
    $empty = "Devi compilare tutti i campi";
    echo $empty;
}else {

    $query = $pdo->prepare("SELECT COUNT(`id`) FROM `user` WHERE `username` = '$username' AND `password` = '$password'");
    $query -> execute();
    $count = $query -> fetchColumn();

    if($count == "1"){
        $_SESSION['username'] = $username;

        $queryid = $pdo->prepare("SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'");
        $queryid -> execute();
        $user_id  = $queryid -> fetchColumn();

        $_SESSION['user_id']=$user_id ;
        header ('location: homepage.php');
    }else {
        echo "Username o Password errati!";
        }
}
?>