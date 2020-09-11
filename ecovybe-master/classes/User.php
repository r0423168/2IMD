<?php

include_once( __DIR__ . '/Db.php' );

class User
{
    private $id;
    private $email;
    private $firstName;
    private $lastName;
    private $password;
    private $currentEmail;
    private $currentFirstName;
    private $currentLastName;
    private $currentPassword;

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
        $conn = Db::getConnection();
        $statement = $conn->prepare('SELECT * FROM users WHERE email=? ');
        $statement->execute([$email]);

        $users = $statement->fetch();

        if (empty($email)) {
            throw new Exception('Email cannot be empty');
        }
        $this->email = $email;

        return $this;
    }

    public function checkEmail($email)
    {

        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM users WHERE email= :email");

        $statement->bindValue(":email", $email);

        $statement->execute(); 
        $result = $statement->fetch(PDO::FETCH_ASSOC);
                     
        if($result === false){
            return true; //not taken
        }else{
            return false; //taken
        }
    }

    /**
    * Get the value of firstName
    */

    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
    * Set the value of firstName
    *
    * @return  self
    */

    public function setFirstName($firstName)
    {
        if (empty($firstName)) {
            throw new Exception('First name cannot be empty');
        }

        $number = preg_match('@[0-9]@', $firstName);
        // includes number?

        if ($number) {
            throw new Exception('First name cannot include numbers');
        }

        $this->firstName = $firstName;

        return $this;
    }

    /**
    * Get the value of lastName
    */

    public function getLastName()
    {
        return $this->lastName;
    }

    /**
    * Set the value of lastName
    *
    * @return  self
    */

    public function setLastName($lastName)
    {
        if (empty($lastName)) {
            throw new Exception('Last name cannot be empty');
        }

        $number = preg_match('@[0-9]@', $lastName);
        // includes number?

        if ($number) {
            throw new Exception('last name cannot include numbers');
        }
        $this->lastName = $lastName;

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

        $password = password_hash($password, PASSWORD_DEFAULT, ['cost'=>16]);

        $this->password = $password;

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
        if (empty($currentEmail)) {
            throw new Exception('Email cannot be empty');
        }

        $this->currentEmail = $currentEmail;

        return $this;
    }

    /**
    * Get the value of currentFirstName
    */

    public function getCurrentFirstName()
    {
        return $this->currentFirstName;
    }

    /**
    * Set the value of currentFirstName
    *
    * @return  self
    */

    public function setCurrentFirstName($currentFirstName)
    {
        $conn = Db::getConnection();
        $statement = $conn->prepare('SELECT * FROM users WHERE id = :id');
        $statement->bindValue(':id', $currentFirstName);
        $statement->execute();
        $currentFirstName = $statement->fetch(PDO::FETCH_ASSOC);

        $this->currentFirstName = $currentFirstName;

        return $this;
    }

    /**
    * Get the value of currentLastName
    */

    public function getCurrentLastName()
    {
        return $this->currentLastName;
    }

    /**
    * Set the value of currentLastName
    *
    * @return  self
    */

    public function setCurrentLastName($currentLastName)
    {
        $conn = Db::getConnection();
        $statement = $conn->prepare('SELECT * FROM users WHERE id = :id');
        $statement->bindValue(':id', $currentLastName);
        $statement->execute();
        $currentLastName = $statement->fetch(PDO::FETCH_ASSOC);

        $this->currentLastName = $currentLastName;

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
        if (empty($currentPassword)) {
            throw new Exception('Password cannot be empty');
        }

        $this->currentPassword = $currentPassword;

        return $this;
    }

    public function save()
    {
        try {
            $conn = Db::getConnection();
            $statement = $conn->prepare('INSERT INTO users (email, firstName, lastName, password) VALUES (:email, :firstName, :lastName, :password)');
            $email = $this->getEmail();
            $firstName = $this->getFirstName();
            $lastName = $this->getLastName();
            $password = $this->getPassword();
            $statement->bindValue(':email', $email);
            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->bindValue(':password', $password);

            $result = $statement->execute();

            return $result;
        } catch (PDOException $e) {
            print 'Error!: ' . $e->getMessage() . '<br/>';
            die();
        }
    }

    public function canLogin()
    {
        $currentEmail = $this->getCurrentEmail();
        $currentPassword = $this->getCurrentPassword();
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :currentEmail");
        $statement->bindValue(":currentEmail", $currentEmail);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (password_verify($currentPassword, $user["password"])) {
            return true;
        } else {
            return false;
        }
    }

    public function checkComplete()
    {
        $email = $this->getCurrentEmail();
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM `users` WHERE `email` = :email ");
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return true;
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
        $conn = Db::getConnection();
        $statement = $conn->prepare( 'SELECT * FROM users where email = :email' );
        $statement->bindValue( ':email', $email );
        $statement->execute();
        $result = $statement->fetch( PDO::FETCH_ASSOC );

        return $result;
    }

    public function findGardens($currentUserId){
        $conn = Db::getConnection();
        $statement = $conn->prepare( 'SELECT * FROM garden where user_id = :currentUserId' );
        $statement->bindValue( ':currentUserId', $currentUserId );
        $statement->execute();
        $result = $statement->fetchAll( PDO::FETCH_ASSOC );

        return $result;
    }

    public function findItem($gardenId){
        $conn = Db::getConnection();
        $statement = $conn->prepare( 'SELECT items.* FROM items INNER JOIN garden ON garden.items_id = items.id WHERE garden.id = :gardenId' );
        $statement->bindValue( ':gardenId', (int)$gardenId );
        $statement->execute();
        $result = $statement->fetch( PDO::FETCH_ASSOC );

        return $result;
    }
}