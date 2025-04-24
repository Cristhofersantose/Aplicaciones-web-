<?php
// Conexión a la base de datos
$conn = mysqli_connect("mysql", "user", "userpass", "login");

// Verifica si ya existe el usuario
$email = "itla@example.com";
$checkUser = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

if (mysqli_num_rows($checkUser) == 0) {
    // Insertar el usuario si no existe
    $firstName = "itla";
    $lastName = "itla";
    $password = md5("Itla123_");

    $insertUser = "INSERT INTO users (firstName, lastName, email, password)
                   VALUES ('$firstName', '$lastName', '$email', '$password')";

    mysqli_query($conn, $insertUser);
    // echo "Usuario creado correctamente.";
} else {
    // echo "El usuario ya existe.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="signup" style="display:none;">
      <h1 class="form-title">Register</h1>
      <form method="post" action="register.php">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="fName" id="fName" placeholder="First Name" required>
           <label for="fname">First Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            <label for="lName">Last Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="emailLogin" placeholder="Email" required>
            <label for="emailLogin">Email</label>
            <small id="emailLoginMsg" class="email-msg"></small>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="loginPassword" placeholder="Password" required>
            <small id="loginPasswordMsg" class="password-msg"></small>
            <label for="password">Password</label>
        </div>
       <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
      <p class="or">
        ----------or--------
      </p>
      <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton">Sign In</button>
      </div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="email" placeholder="Email" required>
              <label for="email">Email</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" placeholder="Password" required>
              <label for="password">Password</label>
          </div>
         <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">
          ----------or--------
        </p>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton">Sign Up</button>
        </div>
      </div>
      <script src="script.js"></script>
</body>
</html>
