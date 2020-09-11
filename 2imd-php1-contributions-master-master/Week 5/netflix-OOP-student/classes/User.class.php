<?php
	require_once("Security.class.php");

	/**
	 * 
	 */
	class User {
		private $email;
		private $password;
		private $passwordConf;
		
	    /**
	     * @return mixed
	     */
	    public function getPasswordConf() {
	        return $this->passwordConf;
	    }

	    /**
	     * @param mixed $passwordConf
	     *
	     * @return self
	     */
	    public function setPasswordConf($passwordConf) {
	        $this->passwordConf = $passwordConf;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getEmail() {
	        return $this->email;
	    }

	    /**
	     * @param mixed $email
	     *
	     * @return self
	     */
	    public function setEmail($email) {
	        $this->email = $email;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getPassword()
	    {
	        return $this->password;
	    }

	    /**
	     * @param mixed $password
	     *
	     * @return self
	     */
	    public function setPassword($password)
	    {
	        $this->password = $password;

	        return $this;
	    }

	    public function isAvailable($email) {
	    	try{
				$conn = new PDO("mysql:host=localhost;dbname=netflix", "root", "");
				$statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
				$statement->bindParam(":email", $email);
				$statement->execute();
				$row = $statement->fetch(PDO::FETCH_ASSOC);

				if(!$row){
				    return false;
				}
				return true;
			} catch(Throwable $t) {
				return "Error: " . $t;
			}
	    }

	    /**
	     * @return boolean - true if registration successful, false if unsuccessful
	     */
	    public function register() {
			$password = Security::hash($this->password);

			try{
				$conn = new PDO("mysql:host=localhost;dbname=netflix", "root", "");
				$statement = $conn->prepare("INSERT INTO users (email, password) values (:email, :password)");
				$statement->bindParam(":email", $this->email);
				$statement->bindParam(":password", $password);
				$result = $statement->execute();
				return $result;
			} catch(Throwable $t) {
				return "Error: " . $t;
			}
	    }
	}