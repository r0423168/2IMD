<?php 
    require_once("bootstrap/bootstrap.php");

    if (isset($_SESSION['user'])) {
      $email = $_SESSION['user'];
      $user = new User;
      $info = $user->findCurrentUser($email);
      $user_id = $info["id"];

      $transaction = new Transaction;
      $transactiondetail = $_GET['id'];
      $transactionData = $transaction->specificTransaction($user_id,$transactiondetail);
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
  <title>Dashboard</title>
</head>
<body >
<?php include("includes/header.php")?>

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <h2>Details</h2>
          <div class="transfertable">
            <table class="table">
              <thead>
                <tr class="trays">
                  <th class="trayth">Transaction ID</th>
                  <th class="trayth">From</th>
                  <th class="trayth">To</th>
                  <th class="trayth">Reason</th>
                  <th class="trayth">Amount</th>
                  <th class="trayth">Message</th>
                  <th class="trayth">Date</th>
                </tr>
              </thead>
              <table class="transactiondetail">
                <tbody class="traydetail">
              <?php foreach($transactionData as $data):?>
                    <tr class="traydetailB">
                      <th class="traydata"><?php echo $data ?></th>
                      
                    </tr>
                
                  <?php endforeach; ?>
                  </tbody>
              </table>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include("includes/footer.php") ?>

</body>
</html>