<?php

    require_once ('init.php');

    if(isset($_GET['as'], $_GET['todo'])) { 
        $as = $_GET['as'];
        $todo = $_GET['todo'];

        switch($as) {
            case 'delete':
                $doneQuery = $pdo->prepare("
                    DELETE FROM todos
                    WHERE id = :todo
                    AND user = :user
                    ");

                $doneQuery->execute([
                    'todo' => $todo,
                    'user' => $_SESSION['user_id']
                ]);
            break;
        }
    }

    header('Location: homepage.php');

?>