	<!DOCTYPE html>
	<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        // Redirect to login page after successful signup
        header("Location: ../index.php");
        exit();
    } else {
        error_log("Error during signup: " . implode(" ", $stmt->errorInfo()));
        echo "An error occurred during signup. Please try again later.";
    }
}
?>

	<html lang="en">
		<head>
			<meta charset="UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<link rel="shortcut icon" href="../assets/Logo.png" type="image/x-icon" />
			<link rel="stylesheet" href="../style/style.css" />
			<title>Aroma Kitchen</title>
		</head>
		<body>
			<div class="container">
				<!-- left-card -->
				<div class="left-card">
					<img class="logo" src="../assets/Logo.png" alt="" />
					<div class="login">
						<h1 class="title">Welcome!</h1>
						<p class="description">Signup to get started in Aroma Kitchen</p>

						<form action="" method="post">
							<input
								type="text"
								name="username"
								class="username"
								placeholder="Your username"
								required />
							<input
								type="password"
								name="password"
								class="password"
								placeholder="Your password"
								required />

							<button class="login-button" type="submit">Sign up</button>
						</form>
						<p class="sign-up-link">
							Do you have an account? <a href="../index.php">Log in</a>
						</p>
					</div>
				</div>
				<!-- right-card -->
				<div class="right-card">
					<img class="right-img" src="../assets/sign-up-picture.png" alt="" />
				</div>
			</div>
		</body>
	</html>
