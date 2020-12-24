

<?php
 
    
    define('__CONFIG__', true);

    require_once "../inc/config.php";

    //$return = [];

    //$return['test'] = ['one','two','three',$_SERVER['REQUEST_METHOD']];
    //echo json_encode($return, JSON_PRETTY_PRINT);

 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        
        //header('Content-Type: application/json');
       
        $return = [];
    
        $email = $_POST['email'];

        $user_found = User::Find($email);
        if ($user_found) {
            //user exists
            $return['error']='You already have an account';
            $return['is_logged_in'] = false;
        } else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $addUser = $con->prepare("INSERT INTO users (email, password) VALUES(LOWER(:email), :password)");
            $addUser->bindParam(':email', $email, PDO::PARAM_STR);
            $addUser->bindParam(':password', $password, PDO::PARAM_STR);
            $addUser->execute();

            $user_id = $con->lastInsertId();

            $_SESSION['user_id'] = (int) $user_id;
            $return['redirect'] = '/dashboard.php?message=welcome';
            $return['is_logged_in'] = true;
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        //exit;
    } else {
        exit('Invalid URL');
    }
    
    

    
?>