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

function getAllShoes(){
    $conn = bukaKoneksiDB();
    $sql = "SELECT * FROM shoes";
    $result = mysqli_query($conn, $sql);
    tutupKoneksiDB($conn);
    return $result;
}

function getShoesDetail($shoes_id){
    $conn = bukaKoneksiDB();
    $sql = "SELECT * FROM shoes WHERE shoes_id = $shoes_id";
    $result = mysqli_query($conn, $sql);
    tutupKoneksiDB($conn);
    return $result;
}

function getAllReview(){
    $conn = bukaKoneksiDB();
    $sql = "SELECT * FROM shoes, review WHERE shoes.shoes_id = review.shoes_id";
    $result = mysqli_query($conn, $sql);
    tutupKoneksiDB($conn);
    return $result;
}

function createShoes($shoes_name, $shoes_brand, $shoes_price, $shoes_size, $image_location){
    $conn = bukaKoneksiDB();
    $sql = "INSERT INTO shoes (shoes_id, shoes_name, shoes_size, shoes_img, shoes_brand, shoes_price) VALUES (NULL, '$shoes_name', '$shoes_size', '$image_location', '$shoes_brand', '$shoes_price');";
    $result = mysqli_query($conn, $sql); 
    if($result ==1){
        $result = mysqli_insert_id($conn);
    }
    tutupKoneksiDB($conn);
    return $result;
}

function uploadImage($foldername, $photoFile){
    $target_dir = $foldername."/";
    $target_file = $target_dir . basename($_FILES["shoes_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 

    echo $imageFileType;
    $result = 1;
    $errorMessage = 0;
    if(isset($_POST["create"])) {
        $check = getimagesize($_FILES["shoes_img"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $result = "<script>alert('File is not an image.');</script>";
            $uploadOk = 0;
            $errorMessage = 1;
        }
    }
    if (file_exists($target_file)) {
        $result = "<script>alert('Sorry, file already exists.');</script>";
        $uploadOk = 0;
        $errorMessage = 2;
    }
    if ($_FILES["shoes_img"]["size"] > 5000000) {
        $result = "<script>alert('Sorry, your file is too large.');</script>";
        $uploadOk = 0;
        $errorMessage = 3;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $result = "<script>alert('Sorry, only JPG, JPEG, PNG files are allowed.');</script>";
        $uploadOk = 0;
        $errorMessage = 4;
    }
    if ($uploadOk == 0) {
        $result = "<script>alert('Sorry, your file was not uploaded.');</script>";
        if($errorMessage == 1){
            $result = "<script>alert('File is not an image.');</script>";
        }else if($errorMessage == 2){ 
            $result = "<script>alert('Sorry, file already exists.');</script>";
        }
        else if($errorMessage == 3){ 
            $result = "<script>alert('Sorry, your file is too large.');</script>";
        }else if($errorMessage == 4){ 
            $result = "<script>alert('Sorry, only JPG, JPEG, PNG files are allowed.');</script>";
        }
    } else {
        if (move_uploaded_file($_FILES["shoes_img"]["tmp_name"], $target_file)) {
            $result = 1;
            echo "<script>alert('The file ". htmlspecialchars( basename( $_FILES["shoes_img"]["name"])). " has been uploaded.');</script>";
            
        } else {
            $result = "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
    return $result;
}

function createReview($review_id, $shoes_id, $user_id, $review){
    $conn = bukaKoneksiDB();
    $sql = "INSERT INTO review (review_id, user_id, shoes_id, review) VALUES (NULL,'$review_id', '$shoes_id', '$user_id', '$review');";
    $result = mysqli_query($conn, $sql); 
    if($result ==1){
        $result = mysqli_insert_id($conn);
    }
    tutupKoneksiDB($conn);
    return $result;
}

function getReviewDetail($shoes_id){
    $conn = bukaKoneksiDB();
    $sql = "SELECT * FROM shoes WHERE shoes_id = $shoes_id";
    $result = mysqli_query($conn, $sql);
    tutupKoneksiDB($conn);
    return $result;
}

function getDisplayshoe($shoes_id){
    $conn = bukaKoneksiDB();
    $sql = "SELECT * FROM review WHERE shoes_id = $shoes_id";
    $result = null;
    $alldata = mysqli_query($conn, $sql);

    if ($alldata != null) {
        $result = mysqli_fetch_assoc($alldata);
    }
    tutupKoneksiDB($conn);
    return $result;
}
