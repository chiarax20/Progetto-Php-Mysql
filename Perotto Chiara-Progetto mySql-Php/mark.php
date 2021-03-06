<?php

    require_once ('init.php');

    if(isset($_GET['as'], $_GET['todo'])) { 
        $as = $_GET['as'];
        $todo = $_GET['todo'];

        switch($as) {
            case 'done':
                $doneQuery = $pdo->prepare("
                    UPDATE todos
                    SET done = 1,
                    run = 0
                    WHERE id = :todo
                    AND user = :user
                   
                ");

                $doneQuery->execute([
                    'todo' => $todo,
                    'user' => $_SESSION['user_id']
                ]);
            break;
            case 'notdone':
                $doneQuery = $pdo->prepare("
                    UPDATE todos
                    SET done = 0
                    WHERE id = :todo
                    AND user = :user
                    ");

                $doneQuery->execute([
                    'todo' => $todo,
                    'user' => $_SESSION['user_id']
                ]);
            break;
            case 'run':
                $runQuery = $pdo->prepare("
                    UPDATE todos
                    SET run = 1,
                    done = 0
                    WHERE id = :todo
                    AND user = :user
                    ");

                $runQuery->execute([
                    'todo' => $todo,
                    'user' => $_SESSION['user_id']
                ]);
            break;
            case 'notrun':
                $runQuery = $pdo->prepare("
                    UPDATE todos
                    SET run = 0
                    WHERE id = :todo
                    AND user = :user
                    ");

                $runQuery->execute([
                    'todo' => $todo,
                    'user' => $_SESSION['user_id']
                ]);
            break;
        }
    }

    header('Location: homepage.php');

?>