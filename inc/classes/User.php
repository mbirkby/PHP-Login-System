

<?php
    if (!defined('__CONFIG__')) {
        exit("You do not have a config file");        
    }

    class User {

        private $con;
        public $user_id;
        public $email;
        public $reg_time;

        public function __construct(int $user_id) {
            $this->con = DB::getConnection();

            $user_id = Filter::Int($user_id);
            
            $usersql = $this->con->prepare("SELECT user_id, email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
            $usersql->bindParam(':user_id',$user_id,PDO::PARAM_INT);
            $usersql->execute();

            if ($usersql->rowCount() == 1) {
                $user  = $usersql->fetch(PDO::FETCH_OBJ);
                $this->user_id = (int) $user->user_id;
                $this->email = (string) $user->email;
                $this->reg_time = (string) $user->reg_time;
            }
            else {
                header("Location: /logout.php");
                exit;
            }

        }
        
        
        public static function Find($email, $return_assoc = false) {
            $con = DB::getConnection();
            
            $email = Filter::String($email);
        
            // Make sure user (email) does not exist
            $findUser = $con->prepare("SELECT user_id, password from users WHERE email = LOWER(:email) LIMIT 1");
            $findUser->bindParam(':email',$email,PDO::PARAM_STR);
            $findUser->execute();

            if($return_assoc) {
                return $findUser->fetch(PDO::FETCH_ASSOC);
            }
            
            $user_found = (boolean) $findUser->rowCount();

            return $user_found;


        }
    }
?>