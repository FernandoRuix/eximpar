<?php session_start();
include 'admin/config.php';
include 'admin/functions.php'; 

$conn = conexion($db_config);
if (!$conn) {
    header('Location: error.php');
}
$admins_data = obtener_admins($conn);

if(isset($_SESSION["admin"]) && $_SESSION["admin"] === true){
    //header("location: welcome.php");
    //exit;
}
$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //VALIDATION
    if(empty(trim($_POST["usuario"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["usuario"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    //USER LOGIN
    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT administradores_id, adm_user, adm_pass, id_prioridades FROM administradores WHERE adm_user = :usuario";
        $stmt = $conn->prepare($sql);

        if($stmt->execute([":usuario"=>$username])){
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($user)){
                $hashed_password = $user[0]['adm_pass'];
                if(password_verify($password, $hashed_password)){
                    $_SESSION["admin"] = true;
                    $_SESSION["status"] = $user[0]['id_prioridades'];
                    $_SESSION["username"] = $username;       
                    header("location: admin/index.php");
                } else {
                    $login_err = "Invalid username or password.";
                }
            } else {
                $login_err = "Usuario no encontrado :(";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}




$css = 'access.css';
require 'views/access.view.php';