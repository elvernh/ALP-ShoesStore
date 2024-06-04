<?php
function bukaKoneksiDB()
{
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "NoAirJordan";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("Error connection DB");
    return $conn;
}
function tutupKoneksiDB($conn)
{
    mysqli_close($conn);
}

function LoginRegister()
{
    $conn = bukaKoneksiDB();
    $conn;
    if (!empty($_SESSION["user_id"])) {
        header("Location: homepage.php");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            if ($email) {
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
                if (mysqli_num_rows($duplicate) > 0) {
                    echo "<script>alert('Username or Email has already been taken!');</script>";
                } else {
                    $query = "INSERT INTO users VALUES ('','$email','$username','$password', '');";
                    mysqli_query($conn, $query);
                    echo "<script>alert('Registration Successfull!');</script>";
                }
            } else {
                // Login process
                $username = $_POST["username"];
                $password = $_POST["password"];
                $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
                $row = mysqli_fetch_array($result);
                if (mysqli_num_rows($result) > 0) {
                    if ($password == $row["password"]) {
                        $_SESSION["login"] = true;
                        $_SESSION["user_id"] = $row["user_id"];
                        echo "<script>alert('Login Successfull!');</script>";
                        header("Location: homepage.php");
                    } else {
                        echo "<script>alert('Password Does Not Match');</script>";
                    }
                }
            }
        }
        tutupKoneksiDB($conn);
    }
}

function cekLogin()
{
    $conn = bukaKoneksiDB();
    $conn;
    if (!empty($_SESSION["user_id"])) {
        $id = $_SESSION["user_id"];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $id");
        $row = mysqli_fetch_assoc($result);
        header("Location: homepage.php");
    }
    tutupKoneksiDB($conn);
}
