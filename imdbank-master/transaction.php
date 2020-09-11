<?php 
    require_once("bootstrap/bootstrap.php");

    if (!isset($_SESSION["user"])) {
        header("Location: index.php"); //redirect naar login
    }else{
        $email = $_SESSION['user'];
        $user = new User;
        $info = $user->findCurrentUser($email);
        $currentUserId = $info['coins'];
    }

    if (!empty($_POST)) {
        
        $transaction = new Transaction();
        $transaction->setFrom($_POST['from']);
        $transaction->setTo($_POST['to']);
        $transaction->setReason($_POST['reason']);
        $amount = $transaction->setAmount($_POST['amount']);
        $transaction->setMessage($_POST['message']);  
    
        if($transaction->addTransaction($amount)) {
            $success = "Transaction executed!";
        }
    } 

    
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' type='text/css' href='css/style.php'>
    <title>IMDBank</title>
</head>
<body>
<div >
    <div class="transaction">
        <?php include("includes/header.php")?>
    <div>
        <div class="transactionform">
            <h1>IMDBank</h1>
                <div class="balance">
                    <p>Current amount <?php echo htmlspecialchars($info['coins'])?></p>
                </div>
                <?php if (isset($error)): ?>
                        <div class="error" role="alert">
                            <?php echo $error ?>
                        </div>
                    <?php endif; ?>

                <form class="form"class="form" method="post" request="">

                    <?php if (isset($success)): ?>
                            <div class="success" role="alert">
                                <?php echo $success ?>
                            </div>
                        <?php endif; ?>

                    <div>
                        <p class="userfrom">From : <?php echo $_SESSION['user']; ?></p>
                            <input type="hidden" name="from" value="<?php echo $_SESSION['user']; ?>">
                    </div>

                    <div class="form-group">
                        <div class="dropdown-content">
                            <p class="toclass">To:<input type="text" name = "to" placeholder="Enter emailadres of receiver" id="search" class="field"></p>
                        </div>
                        </div>

                    <div id="form-group" class="form-group">
                        <label for="reason">Reason : <select class="field"  name="reason">
                            <option value="Select">Select</option>
                            <option value="Design">Design</option>
                            <option value="Development">Development</option>
                            <option value="Achieving deadline">Achieving deadline</option>
                            <option value="Feedback">Feedback</option>
                            <option value="Other">Other</option>
                            </select>
                        </label>
                    </div>

                    <div class="amount">
                        <label for="amount" class="amounttext">Amount : </label>
                        <input class="field" id="#field" class="amountinput" type="text" name="amount" placeholder="Amount" value="">
                    </div>

                    <div class="message">
                        <label for="message">Message : </label>
                        <input id="#field" class="field" type="text" name="message" placeholder="Message">
                    </div>

                    <div class="submit">
                        <div class="btn">
                            <input type="submit" value="Transfer" class="login__btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php include("includes/footer.php") ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- <script src="/ajax/autocomplete.js"></script>
 -->
</body>
</html>