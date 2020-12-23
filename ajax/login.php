
<?php
 
    
 define('__CONFIG__', true);

 require_once "../inc/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     
     
     //header('Content-Type: application/json');
    
     $return = [];
     
    
     $email = Filter::String($_POST['email']);
     $password = $_POST['password'];

    
     // Make sure user (email) does not exist
     $findUser = $con->prepare("SELECT user_id, password from users WHERE email = LOWER(:email) LIMIT 1");
     $findUser->bindParam(':email',$email,PDO::PARAM_STR);
     $findUser->execute();

    
    if ($findUser->rowCount() == 1) {
        
        //user exists
        $User = $findUser->fetch(PDO::FETCH_ASSOC);    
        $user_id = (int) $User['user_id'] ;
        $hash = (string) $User['password'];

        
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