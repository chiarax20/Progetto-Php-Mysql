<?php

    require_once ('init.php');

    if(isset($_POST['name'])) {
        $name =trim( $_POST['name']);

        if(!empty($name)){
            $addedQuery = $pdo->prepare("
                INSERT INTO todos (name,user,done,created,run)
                VALUES (:name, :user, 0, NOW(),0)
            ");

            $addedQuery->execute([
                'name'=> $name,
                'user'=> $_SESSION['user_id']
            ]);
        }
    }

    header('Location: homepage.php');

?>