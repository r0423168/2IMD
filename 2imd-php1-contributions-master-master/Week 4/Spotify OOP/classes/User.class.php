<?php 
    class User{
        private $email;
        private $password;
        private $passwordConfirmation;
        private $id;
        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of passwordConfirmation
         */ 
        public function getPasswordConfirmation()
        {
                return $this->passwordConfirmation;
        }

        /**
         * Set the value of passwordConfirmation
         *
         * @return  self
         */ 
        public function setPasswordConfirmation($passwordConfirmation)
        {
                $this->passwordConfirmation = $passwordConfirmation;

                return $this;
        }
        public function register(){
            $err ="Geen probleem";
            if(!Security::compare($this->password, $this->passwordConfirmation)){
                $err = "Wachtwoorden komen niet overeen";
                return $err;
            } else if(!Security::isPasswordSecure($this->password)){
                $err = "Wachtwoord moet minstens 8 tekens hebben";
                return $err;
            } else if(!Security::isValidEmail($this->email)){
                $err = "Ongeldig e-mail adres";
                return $err;
            } else if(Security::emailExists($this->email)){
                $err = "Er is al een gebruiker met dit e-mailadres";
                return $err;
            } else{
                $password = Security::hash($this->password);
                try{
                    $conn = new PDO("mysql:host=localhost;dbname=spotify_faker", "root", "root");
                    $statement = $conn->prepare("insert into users (email, password) values (:email, :password);");
                    $statement->bindParam(":email", $this->email);
                    $statement->bindParam(":password", $password);
                    $result = $statement->execute();
                    $this->canLogin();
                }
                catch( Throwable $t ){
                    return $t;
                }
            }
        }
        public function login(){
            $_SESSION["id"] = $this->email;
            header("location: index.php");
        }
        public function canLogin(){
            if(Security::isValidEmail($this->email)){
                try{
                    $conn = new PDO("mysql:host=localhost;dbname=spotify_faker", "root", "root");
                    $statement = $conn->prepare("SELECT password FROM users WHERE email= :email;");
                    $statement->bindParam(":email", $this->email);
                    $statement->execute();
                    $result = $statement->fetch(PDO::FETCH_ASSOC);
                    if(password_verify($this->password, $result['password'])){
                        $this->id = $result['id'];
                        $this->login();
                    } else{
                        $err = "Foute logingegevens!";
                        return $err;
                    }
                }
                catch( Throwable $t ){
                    return $t;
                }
            } else{
                $err = "E-mail adres klopt niet";
                return $err;
            }
        }
    }
