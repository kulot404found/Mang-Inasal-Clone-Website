<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fastfood';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="add.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
		<link href="css/bootstrap.min.css" rel="stylesheet" >
	</head>
	<body class="loggedin">

		 <nav class="navbar navbar-expand-lg navbar-dark bg-success p-3">
    <div class="container-fluid">
      <img src="foods/logo.png" class="img-fluid">
      <h4 >Mang Inasal</h4>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">
        	<li class="nav-item">
            <a class="nav-link mx-2 fw-medium text-white" href="home.php" id="style-2" data-replace="HOME"><span>Home</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 fw-medium text-white" href="profile.php" id="style-2" data-replace="HOME"><span><i class="fas fa-user-circle"></i>Profile</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 fw-medium text-white" href="logout.php" id="style-2" data-replace="ABOUT US"><span><i class="fas fa-sign-out-alt"></i>Log out</span></a>
          </li>
        </ul>
      </div>
    </div>
    </nav>

		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>
			</div>
		</div>


		   <script src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>