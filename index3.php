<?php 
require 'required/database.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_c = "SELECT * FROM `redirect_link`"; 
$result_c = $pdo->prepare($sql_c); 
$result_c->execute();
$link = $result_c->fetch(PDO::FETCH_ASSOC);

$redirect_link = $link['link'];

if(isset($_POST['first_name'])){
	$sql = "INSERT INTO leads (first_name,last_name,email_address,phone_home,date_added) values (?,?,?,?,?)";
	$q = $pdo->prepare($sql);
	$q->execute(array($_POST['first_name'],$_POST['last_name'],$_POST['email_address'],$_POST['phone_home'],date('Y-m-d H:i:s')));
	header("Location:".$redirect_link);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="format-detection" content="telephone=no" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <meta name="description" content="" />
        <meta name="keywords" content="" />

        <link rel="canonical" href="https://www.contaminatedwateratcamplejeune.com/" />

        <link rel="shortcut icon" href="https://camplejeuneresources.com/jmp/favicon.png" type="image/ico" />
        <title>Camp Lejuene Water Contamination - Free Case Evaluation</title>

        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="" />
        <meta property="og:description" content="" />
        <meta property="og:site_name" content="" />
        <meta property="og:url" content="https://www.contaminatedwateratcamplejeune.com/" />

        <link rel="apple-touch-icon" sizes="57x57" href="https://camplejeuneresources.com/apple-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="60x60" href="https://camplejeuneresources.com/apple-icon-60x60.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="https://camplejeuneresources.com/apple-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="https://camplejeuneresources.com/apple-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="https://camplejeuneresources.com/apple-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="https://camplejeuneresources.com/apple-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="https://camplejeuneresources.com/apple-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="https://camplejeuneresources.com/apple-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="https://camplejeuneresources.com/apple-icon-180x180.png" />
        <link rel="icon" type="image/png" sizes="192x192" href="https://camplejeuneresources.com/android-icon-192x192.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="https://camplejeuneresources.com/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="96x96" href="https://camplejeuneresources.com/favicon-96x96.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="https://camplejeuneresources.com/favicon-16x16.png" />
        <link rel="manifest" href="https://camplejeuneresources.com/manifest.json" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
        <link type="text/css" rel="stylesheet" href="./css/extra.css?v=<?php echo uniqid(); ?>" />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png" />
        <meta name="theme-color" content="#ffffff" />
    </head>
    <body id="landing-page">
        <main>
            <div class="section-inner section-fit section-relative"></div>
            <div class="section-block">
                <div class="section-inner section-fit section-relative" style="display: flex; flex-direction: column; justify-content: center; align-content: center; align-items: center;">
                    <div style="display: flex; align-items: center; justify-content: center; max-width: 500px;">
                        <img style="width: 100%;" src="./images/jmp2logo.png" />
                    </div>
                    <div style="display: block; text-align: center; padding: 10px 10px 0 10px; color: grey; max-width: 500px;">Welcome back, please complete the following survey to see the new benefits and resources for your area:</div>
					<form action="" method="POST">
						<div>
							<div style="-webkit-box-shadow: 9px 10px 14px 4px rgba(0, 0, 0, 0.47);box-shadow: 9px 10px 14px 4px rgba(0, 0, 0, 0.47);display: block;padding: 1rem;margin: 30px;text-align: center;border-radius: 10px;background-color: white;max-width: 500px;">
								<div style="display: block; padding: 10px; margin: 0px; text-align: center; border-radius: 0px; color: rgb(7, 54, 80);">
									<h1 style="font-size: 2rem; font-weight: bolder;">Over a million people might have been exposed to the Camp Lejeune contaminated drinking water - Check below if you qualify for Compensation</h1>
								</div>
								<br />

								<div style="width: 75%;margin: 0 auto;">
									<label for="first_name" class="form-label">First name</label> 
									<input class="form-control" id="first_name" name="first_name" class="form-input" required>
									<label for="last_name" class="form-label">Last name</label> 
									<input class="form-control" id="last_name" name="last_name" class="form-input" required>
									<label for="email_address" class="form-label">Email address</label> 
									<input type="email" class="form-control" id="email_address" name="email_address" placeholder="your@email.com" class="form-input" required>
									<label for="phone_home" class="form-label">Mobile Phone number</label> 
									<input type="tel" class="form-control" id="phone_home" name="phone_home" placeholder="5555555555" class="form-input" required>
								</div>
								<input type="submit" class="btn btn-danger btn-lg" id="submit_button" value="See If I Qualify" style="display: block; text-align: center; color: white; font-size: 16px; font-weight: bold; border-radius: 16px; width: 75%; padding: 10px 40px; margin: 10px auto;" />
								
								<p><br /></p>
							</div>
						</div>
                    </form>
                </div>
            </div>
        </main>
	</body>
</html>
