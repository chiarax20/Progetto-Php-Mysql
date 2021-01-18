<?php
                if(isset($_POST['logout'])){
                   session_start();
                   header ('location: index.php');
                }
?>