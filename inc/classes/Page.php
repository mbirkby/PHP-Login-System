<?php


    class Page {

        public static function forceLogin() {
            if(isset($_SESSION['user_id'])) {

            }
            else {
                header("Location: /login.php");
                exit;
            }
        }

        public static function forceDashboard() {
            if(isset($_SESSION['user_id'])) {
                header("Location: /dashboard.php");
                exit;
            }
            else {
                
            }
        }
    }


?>