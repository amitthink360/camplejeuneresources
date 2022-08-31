<?php 
require 'required/database.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['redirect_link'])){
	
	$sql_list = "TRUNCATE TABLE redirect_link";
	$q_list_del = $pdo->prepare($sql_list);
	$q_list_del->execute();
	
	$sql = "INSERT INTO redirect_link (link) values (?)";
	$q = $pdo->prepare($sql);
	$q->execute(array($_POST['redirect_link']));
	header("Location:update_link.php");
}

$sql_c = "SELECT * FROM `redirect_link`"; 
$result_c = $pdo->prepare($sql_c); 
$result_c->execute();
$link = $result_c->fetch(PDO::FETCH_ASSOC);

$redirect_link = $link['link'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Redirect Link</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="redirect_link">Link:</label>
      <input type="text" class="form-control" id="redirect_link" placeholder="Enter Redirect Link" name="redirect_link" value="<?php echo $redirect_link; ?>">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
