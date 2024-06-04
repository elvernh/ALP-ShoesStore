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
            // echo "<script>alert('form input masuk!');</script>";
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            if ($email) {
                // echo "<script>alert('orang e register!');</script>";
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
                if (mysqli_num_rows($duplicate) > 0) {
                    echo "<script>alert('Username or Email has already been taken!');</script>";
                } else {
                    $query = "INSERT INTO users VALUES ('','$email','$username','$password', '');";
                    mysqli_query($conn, $query);
                    echo "<script>alert('Registration Successful!');</script>";
                }
            } else {
                // Login process
                // echo "<script>alert('masuk ke login controller !');</script>";
                $username = $_POST["username"];
                $password = $_POST["password"];
                $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
                $row = mysqli_fetch_array($result);
                if (mysqli_num_rows($result) > 0) {
                    // echo "<script>alert('mysqli num rows ada lebih dari 0 !');</script>";
                    if ($_POST["password"] == $row["password"]) {
                        // echo "<script>alert('password row ada!');</script>";
                        $_SESSION["login"] = true;
                        $_SESSION["user_id"] = $row["user_id"];
                        $_SESSION["username"] = $row["username"];
                        echo "<script>alert('Login Successful!');</script>"; 
                        // header("Location: homepage.php");
                        echo "<script>window.location.href=('homepage.php')</script>";
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
    } else {
        header("Location: login.php");
    }
    tutupKoneksiDB($conn);
}

function startconnect(){
    $conn = bukaKoneksiDB();
    $conn;
    return $conn;
}


function getAllReview(){
    $conn = bukaKoneksiDB();
    $sql = "SELECT * FROM shoes, review WHERE shoes.shoes_id = review.shoes_id";
    $result = mysqli_query($conn, $sql);
    tutupKoneksiDB($conn);
    return $result;
}

function addShoe($name, $brand, $price, $size, $image) {
    $conn = bukaKoneksiDB();
    $sql = "INSERT INTO shoes (name, brand, price, size, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdss", $name, $brand, $price, $size, $image);
    $result = $stmt->execute();
    tutupKoneksiDB($conn);
    return $result;


}

if (isset($_POST['shoename'])) {
    $shoename = $_POST['shoename'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $path = "Images/Shoes/".$image;
    move_uploaded_file($tmp, $path);
    addShoe($shoename, $brand, $price, $size, $path);
    echo "<script>alert('Shoe Added!');</script>";
    echo "<script>window.location.href=('homepage.php')</script>";
  }
