<?php 
include 'connect.php';

function isPasswordStrong($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/', $password);
}

if(isset($_POST['signUp'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar fortaleza de la contraseña
    if (!isPasswordStrong($password)) {
        echo "La contraseña debe tener al menos 8 caracteres, mayúsculas, minúsculas, números y símbolos.";
        exit();
    }

    $password = md5($password); // En producción sería mejor usar password_hash()

    // Verificar si el correo ya existe
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    
    if ($result->num_rows > 0) {
        echo "¡El correo ya está registrado!";
    } else {
        $insertQuery = "INSERT INTO users(firstName, lastName, email, password)
                        VALUES ('$firstName', '$lastName', '$email', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if(isset($_POST['signIn'])){
   $email = $_POST['email'];
   $password = md5($_POST['password']);

   $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       session_start();
       $row = $result->fetch_assoc();
       $_SESSION['email'] = $row['email'];
       header("Location: homepage.php");
       exit();
   } else {
       echo "Correo o contraseña incorrectos.";
   }
}
?>
