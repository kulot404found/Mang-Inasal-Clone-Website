<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Page</title>
		<link rel="stylesheet" type="text/css" href="add.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
		<link href="css/bootstrap.min.css" rel="stylesheet" >
	</head>
	<body style="background-image: linear-gradient(peachpuff,seagreen);
  	background-repeat: no-repeat;
  	height: 100vh;" class="loggedin">

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
            <a class="nav-link mx-2 fw-medium text-white" href="profile.php" id="style-2" data-replace="HOME"><span><i class="fas fa-user-circle"></i>Profile</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 fw-medium text-white" href="logout.php" id="style-2" data-replace="ABOUT US"><span><i class="fas fa-sign-out-alt"></i>Log out</span></a>
          </li>
        </ul>
      </div>
    </div>
    </nav>
		
		<div class="container mt-4">
			<h3>Admin</h3><hr>
			<h2 class="text-center text-black">Order, Product and Category Update list</h2><hr>
		</div>


    
    
		<div class="container">
			<div class="row row-cols-md-4 center">
	<a href="searchcustomer.php"><button type="button" class="btn btn-success">ORDERS</button>
    <a href="product.php"><button type="button" class="btn btn-primary">Product List</button>
    <a href="category.php"><button type="button" class="btn btn-danger">Category LIst</button>
    <a href="sales.php"><button type="button" class="btn btn-warning">Sales</button>
    </div>

   </div>

   <script src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>