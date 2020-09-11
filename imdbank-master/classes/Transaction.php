<?php

class Transaction
{
    private $id;
    private $reason;
    private $amount;
    private $message;
    private $created;
    private $item;
    private $email;
    private $from;
    private $to;
    private $currentBalance;
    private $currentEmail;
    private $coins;

    /**
     * Get the value of reason
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set the value of reason
     *
     * @return  self
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */
    public function setAmount($amount)
    {
        if (strlen($amount) < 1 && strlen($amount) >= ('$currentBalance')) {
            throw new Exception('Amount cannot be less than 1 and more than current balance');}
       
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @return  self
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get the value of item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set the value of item
     *
     * @return  self
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get the value of currentUserId
     */
    public function getCurrentUserId()
    {
        return $this->currentUserId;
    }

    /**
     * Set the value of currentUserId
     *
     * @return  self
     */
    public function setCurrentUserId($currentUserId)
    {
        $this->currentUserId = $currentUserId;

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
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of from
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set the value of from
     *
     * @return  self
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get the value of to
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set the value of to
     *
     * @return  self
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

        /**
     * Get the value of currentBalance
     */ 
    public function getCurrentBalance()
    {
        return $this->currentBalance;
    }

    /**
     * Set the value of currentBalance
     *
     * @return  self
     */ 

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
    
    public function setCurrentEmail($currentEmail)
    {
        $this->currentEmail = $currentEmail;

        return $this;
    }

        /**
     * Get the value of coins
     */ 
    public function getCoins()
    {
        return $this->coins;
    }

    /**
     * Set the value of coins
     *
     * @return  self
     */ 
    public function setCoins($coins)
    {
        $this->coins = $coins;

        return $this;
    }
    

    public function setCurrentBalance($currentBalance)
    {
        $conn = DB::getInstance();
        $statement = $conn->prepare( 'SELECT `coins` FROM `users` WHERE `email` = :currentEmail ' );
        $statement->execute( [$currentBalance] );

        $users = $statement->fetch();

        $this->currentBalance = $currentBalance;

        return $this;
    }

    public function addTransaction()
    {
        try {
            $conn = DB::getInstance();
        
            $statement = $conn->prepare("INSERT INTO `transactions` (`from`, `to`, `reason`, `amount`, `message`, `created_at`) VALUES (:from, :to, :reason, :amount, :message, :created_at)");
            $statement->bindValue(':from', $this->from);
            $statement->bindValue(':to', $this->to);
            $statement->bindValue(':reason', $this->reason);
            $statement->bindValue(':amount', $this->amount);
            $statement->bindValue(':message', $this->message);
            $statement->bindValue(':created_at', date('Y-m-d H:i:s'));

            if($statement->execute()) {
                return true;
            }
            return false;
        }
         catch (PDOException $e) {
            print 'Error!: ' . $e->getMessage() . '<br/>';
            die();
        }
    }

    public function findTransactions($email)
    {
        try{
            $conn = DB::getInstance();

            $statement = $conn->prepare('SELECT `from`,`to`, `amount` FROM `transactions` WHERE `from` = :email ORDER BY created_at DESC');
            $statement->bindValue(':email', $email);

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
            if (!empty($result)) {
                return $result;
            }
            return false;
            } catch (PDOException $e) {
                print 'Error!: ' . $e->getMessage() . '<br/>';
                die();
        }
    }

    public function findDetails($currentEmail)
    {
        try{
            $conn = DB::getInstance();

            $statement = $conn->prepare('SELECT * FROM `transactions` WHERE `from` = ?');
            $statement->bindValue(':currentEmail', $currentEmail);

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            if (!empty($result)) {
                return $result;
            }
            return false;
            } catch (PDOException $e) {
                print 'Error!: ' . $e->getMessage() . '<br/>';
                die();
            }
    }

    public function findItem($transactionId){
        try{
            $conn = DB::getInstance();

        $statement = $conn->prepare( 'SELECT transactions.* FROM transactions INNER JOIN `users` ON transactions.id = users.id WHERE user.id = :userId' );
        $statement->bindValue( ':transactionId', (int)$transactionId );
        $statement->execute();
        $result = $statement->fetch( PDO::FETCH_ASSOC );

        return $result;
    }catch (PDOException $e) {
        print 'Error!: ' . $e->getMessage() . '<br/>';
        die();
    }
}

    public function specificTransaction($id, $transactionId){
        try{
            $conn = DB::getInstance();

            $statement = $conn->prepare("SELECT * FROM `transactions` WHERE `from` LIKE CONCAT('%',:id ,'%') OR `to` like  CONCAT('%',:id ,'%')");
            $statement->bindValue(':id', $id);
            $statement->bindValue(':transactionId', $transactionId);

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $result[0];
        }catch (PDOException $e) {
            print 'Error!: ' . $e->getMessage() . '<br/>';
            die();
        }
    }

    public function updateBalance(){
        try{
            $conn = DB::getInstance();

            $statement = $conn->prepare("UPDATE `users` SET `coins = :coins` WHERE id LIKE :id");
        
            $coins = $this->getAmount(); 
            $id = $this->getId(); 
            
            $statement->bindValue(":coins", $coins);
            $statement->bindValue(":id", $id);

            $result = $statement->execute();
            
            return $result;
    }catch (PDOException $e) {
        print 'Error!: ' . $e->getMessage() . '<br/>';
        die();
    }
}
}
