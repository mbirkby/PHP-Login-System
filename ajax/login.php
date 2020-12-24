
<?php
 
    
 define('__CONFIG__', true);

 require_once "../inc/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     
     
     //header('Content-Type: application/json');
    
     $return = [];
     
    
     $email = $_POST['email'];
     $password = $_POST['password'];

     $user = User::Find($email,true);
     
    
    if ($user) {
        
        //user exists
         
        $user_id = (int) $user['user_id'] ;
        $hash = (string) $user['password'];

        
        if (password_verify($password, $hash)) {
            //user has signed in
            $return['redirect'] = '/dashboard.php';
            $_SESSION['user_id'] = $user_id;
        }
        else {
            //invalid email/ password            
            $return['error'] = "Invalid password";
        }            
    }
    else {
        $return['error'] = "You do not have an account - register at <a href='/register.php'>Create one now</a>";
    }
    
    echo json_encode($return, JSON_PRETTY_PRINT);
} else {
    exit('Invalid URL');    
}

    
 
?>