<?php 
class Security{
    public static function compare($p1, $p2){
        if($p1 == $p2){
            return true;
        }
        return false;
    }
    public static function isValidEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    public static function hash($password) {
        $options = [
            'cost' => 15
        ];
        $hash = password_hash($password, PASSWORD_DEFAULT, $options);
        return $hash;
    }
    public static function emailExists($email){
        try{
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT * FROM users WHERE email = :email;");
            $statement->bindParam(":email", $email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if(!empty($result)){
                return true;
            } 
            return false;
        }
        catch( Throwable $t ){
            return false;
        }
    }
    public static function isPasswordSecure($password){
        if(strlen($password) >= 8){
            return true;
        }
        return false;
    }
}