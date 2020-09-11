<?php
    require_once("bootstrap/bootstrap.php");

    if (isset($_SESSION['user'])) {
      $email = $_SESSION['user'];
      $user = new User;
      $info = $user->findCurrentUser($email);
  
      $currentUserId = $info['coins'];
  
      $transaction = new Transaction;
      $allTransactions = $transaction->findTransactions($email);
    }else{
        header("Location: index.php");
    }

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel='stylesheet' type='text/css' href='css/style.php'>
  <title>Home</title>
</head>
<body class="bg-primary">
  <?php include("includes/header.php")?>

<div class="container">
    <div class="row">
      <div class="col">
        <div class="card card-body bg-light mt-5">
          <h2>Welcome to your IMDBank Account</h2>

          <div class="balance">
            <p>Current amount <?php echo htmlspecialchars($info['coins'])?></p>
          </div>

          <div class="historytable">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="font-size:13px;">From</th>
                  <th style="font-size:13px;">To</th>
                  <th style="font-size:13px;">Amount</th>
                  <th style="font-size:13px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($allTransactions as $t): ?>
                  <tr>
                    <td class="from"><?php echo $t ["from"]; ?></td>
                    <td class="to"><?php echo $t ["to"]; ?></td>
                    <td class="amount"><?php echo sprintf('%.2f', $t ["amount"]); ?></td>
                    <td class="detaillink"><a href="detailpage.php">Details</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include("includes/footer.php") ?>
  <!-- <script src="bank.js"></script>
 -->
</body>
</html>