<?php

class User{

    private $id;
    private $username;
    private $email;
    private $firstname;
    private $lastname;
    private $password;
    private $currentUsername;
    private $currentEmail;
    private $currentFirstname;
    private $currentLastname;
    private $currentPassword;
    private $confirmPassword;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

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
        $conn = DB::getInstance();
        $statement = $conn->prepare( 'SELECT * FROM `users` WHERE email=? ' );
        $statement->execute( [$email] );

        $users = $statement->fetch();

        if ( empty( $email ) ) {
            throw new Exception( "this cant be empty" );
        } else if ( !preg_match( '|@student.thomasmore.be$|', $email ) ) {
            throw new Exception( 'Email must end with @student.thomasmore.be' );
        }

        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

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
        if (empty($password)) {
            throw new Exception('password cannot be empty');
        }

        if (strlen($password) < 5) {
            throw new Exception('password must be more than 5 characters');
        }

        $password = password_hash($password, PASSWORD_DEFAULT, ['cost'=>16]);
            
        $this->password = $password;

        return $this;

    }

    /**
     * Get the value of currentUsername
     */ 
    public function getCurrentUsername()
    {
        return $this->currentUsername;
    }

    /**
     * Set the value of currentUsername
     *
     * @return  self
     */ 
    public function setCurrentUsername($currentUsername)
    {
        $this->currentUsername = $currentUsername;

        return $this;
    }

    /**
     * Get the value of currentEmail
     */ 
    public function getCurrentEmail()
    {
        return $this->currentEmail;
    }

    /**
     * Set the value of currentEmail
     *
     * @return  self
     */ 
    public function setCurrentEmail($currentEmail)
    {
        $this->currentEmail = $currentEmail;

        return $this;
    }

    /**
     * Get the value of currentFirstname
     */ 
    public function getCurrentFirstname()
    {
        return $this->currentFirstname;
    }

    /**
     * Set the value of currentFirstname
     *
     * @return  self
     */ 
    public function setCurrentFirstname($currentFirstname)
    {
        $this->currentFirstname = $currentFirstname;

        return $this;
    }

    /**
     * Get the value of currentLastname
     */ 
    public function getCurrentLastname()
    {
        return $this->currentLastname;
    }

    /**
     * Set the value of currentLastname
     *
     * @return  self
     */ 
    public function setCurrentLastname($currentLastname)
    {
        $this->currentLastname = $currentLastname;

        return $this;
    }

    /**
     * Get the value of currentPassword
     */ 
    public function getCurrentPassword()
    {
        return $this->currentPassword;
    }

    /**
     * Set the value of currentPassword
     *
     * @return  self
     */ 
    public function setCurrentPassword($currentPassword)
    {
        $this->currentPassword = $currentPassword;

        return $this;
    }

    /**
     * Get the value of confirmPassword
     */ 
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * Set the value of confirmPassword
     *
     * @return  self
     */ 
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    public function save(){
        try{
            $conn = DB::getInstance();
            $statement = $conn->prepare("INSERT INTO `users` (`username`, `firstname`, `lastname`, `email`, `password`) VALUES (:username, :firstname, :lastname, :email, :password)");
            $statement->bindValue(":username", $this->username);
            $statement->bindValue(":firstname", $this->firstname);
            $statement->bindValue(":lastname", $this->lastname);
            $statement->bindValue(":email", $this->email);
            $statement->bindValue(":password", $this->password);

            $result = $statement->execute();

            return $result;
        }catch (PDOException $e) {
                print 'Error!: ' .$e->getMessage() .'<br/>';
                die();
            }
        }

        public function validLogin()
        {
            try{
                $currentEmail = $this->getCurrentEmail();
                $currentPassword = $this->getCurrentPassword();

                $conn = DB::getInstance();
                $statement = $conn->prepare("SELECT * FROM `users` WHERE `email` = :currentEmail");
                $statement->bindValue(":currentEmail", $currentEmail);
                $statement->execute();
                $user = $statement->fetch(PDO::FETCH_ASSOC);
        
                if (password_verify($currentPassword, $user["password"])) {
                    return true;
                } else {
                return false;
                } 
            } catch (PDOException $e) {
                    print 'Error!: ' . $e->getMessage() . '<br/>';
                    die();
            }
        }

        public function checkComplete()
        {
            try{
                $email = $this->getCurrentEmail();
                $conn = DB::getInstance();

                $statement = $conn->prepare("SELECT * FROM `users` WHERE `email` = :email ");
                $statement->bindValue(':email', $email);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);

                return true;
            } catch (PDOException $e) {
                print 'Error!: ' . $e->getMessage() . '<br/>';
                die();
            }
        }

        public function login($complete)
        {
            session_start();
            $_SESSION["user"] = $this->getCurrentEmail();
            if ($complete) {
                header("Location: home.php");
            }
        }

        public function findCurrentUser( $email ) 
        {
            try{
            $conn = DB::getInstance();
            $statement = $conn->prepare( 'SELECT * FROM `users` where `email` = :email' );
            $statement->bindValue( ':email', $email );
            $statement->execute();
            $result = $statement->fetch( PDO::FETCH_ASSOC );
            return $result;
            }catch (PDOException $e) {
                print 'Error!: ' . $e->getMessage() . '<br/>';
                die();
            }
        }

        public function findCoins( $coins, $email ) 
        {
            try{
            $conn = DB::getInstance();
            $statement = $conn->prepare( 'SELECT `coins` FROM `users` where `email` = :email');
            $statement->bindValue(':coins', $coins);
            $statement->bindValue(':email',$email);
            $statement->execute();
            $result = $statement->fetch( PDO::FETCH_ASSOC );
            return $result;
            }catch (PDOException $e) {
                print 'Error!: ' . $e->getMessage() . '<br/>';
                die();
            }
        }

}