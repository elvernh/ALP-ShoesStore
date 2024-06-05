<?php
require 'controller.php';
session_start();
cekLogin();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Air Forces - Where Good Shoes Comes</title>
    <link rel="shortcut icon" type="x-icon" href="Images/Logo/Group 1.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="scriptHome.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<!--Header-->
<body class="font-rubik"> 
  <?php
  if (isset($_POST['create'])) {
    $shoes_name = $_POST['shoes_name'];
    $shoes_brand = $_POST['shoes_brand'];
    $shoes_price = $_POST['shoes_price'];
    $shoes_size = $_POST['shoes_size'];

    $uploadImage = 1;
    $image_location = "";
    if(isset($_FILES["shoes_img"]['name'])){
      $shoes_img = $_FILES['shoes_img']['name'];
      $foldername = 'Image';
      $uploadImage = uploadImage($foldername, $shoes_img);
      $image_location = $foldername."/".htmlspecialchars(basename($shoes_img));
    }

    if($uploadImage == 1){
      createShoes($shoes_name, $shoes_brand, $shoes_price, $shoes_size, $image_location);
    }else{
      echo $uploadImage;
    }
  }
  ?>
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="mx-auto w-full px-10 pb-6 mb-8 bg-gray-50 border-b-2">
          <div class="flex items-center justify-between relative">
            <div class="flex items-center w-20">
              <img src="Images/Logo/Group 1.png" class="block pt-7" />
            </div>
            <div>
              <button id="hamburger" name="hamburger" class="block absolute right-4 mt-[-15px] lg:hidden">
                <span class="w-[30px] h-[2px] my-2 block bg-black transition duration-300 ease-in-out"></span>
                <span class="w-[30px] h-[2px] my-2 block bg-black transition duration-300 ease-in-out"></span>
                <span class="w-[30px] h-[2px] my-2 block bg-black transition duration-300 ease-in-out"></span>
              </button>
              <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full top-full right-4 lg:flex lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                <ul class="navUl block lg:flex lg:mt-8 lg:mx-auto">
                <li class="group">
                    <a href="homepage.php" class="text-lg py-2 mx-8">Home</a>
                  </li>
                  <li class="group">
                    <a href="addreview.php" class="text-lg py-2 mx-8">Add Review</a>
                  </li>
                  <li class="group">
                  <a href="addshoes.php" class="text-lg py-2 mx-8">Add Shoes</a>
                </li>
                  <li class="group">
                    <a href="myreview.php" class="text-lg py-2 mx-8">My Review</a>
                  </li>
                  <div class="block lg:flex lg:ml-14">
                
                    <?php
                    if(isset($_SESSION['username'])) {
                      echo '<li><a href="logout.php" class="text-lg">Log Out</a></li>';
                    }else{
                      echo '<li><a href="login.php" class="text-lg">Login/Register</a></li>';
                    }

                    ?>
                    <li>
                      <form class="search">
                        <button class="absolute mt-1.5 ml-2" type="submit"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.00305 13.2269C5.00305 8.37566 8.95055 4.42941 13.8018 4.42941C18.6518 4.42941 22.5993 8.37566 22.5993 13.2269C22.5993 18.0781 18.6518 22.0256 13.8018 22.0256C8.95055 22.0256 5.00305 18.0781 5.00305 13.2269ZM28.1218 26.3006L22.373 20.5669C24.068 18.5906 25.0993 16.0294 25.0993 13.2269C25.0993 6.99816 20.0305 1.92941 13.8018 1.92941C7.5718 1.92941 2.50305 6.99816 2.50305 13.2269C2.50305 19.4569 7.5718 24.5256 13.8018 24.5256C16.3293 24.5256 18.658 23.6806 20.5418 22.2719L26.3568 28.0706L28.1218 26.3006Z" fill="black"/>
                          </svg>
                          </button>
                        <input type="text" placeholder="Search" class="w-17 py-2 pl-12 pr-7 outline-stone-800 bg-gray-100 placeholder-black rounded-full outline-none">
                      </form>
                      <a href="#"><p class="searchText hidden">Search</p></a>
                    </li>
                    
                  </div>
                </ul>
              </nav>
            </div>
          </div>
          </div>
        </div>
      </header>
      

    </header>
<div class="container mx-auto px-6 pt-[12rem]">
  <div class="flex justify-between items-center bg-white p-6 rounded-lg shadow-lg">
    <div class="w-full lg:w-1/2">
      <h1 class="text-2xl font-bold mb-4 lg:text-3xl mb-4">Add Shoes</h1>
      <form method="POST" action="addshoes.php" enctype="multipart/form-data">
        
        <label for="shoename" class="block text-lg font-medium text-gray-700 mt-4">Shoe name:</label>
        <input type="text" id="shoename" name="shoes_name" class="mt-2 p-2 w-full border border-gray-300 rounded-lg">
        
        <label for="brand" class="block text-lg font-medium text-gray-700 mt-4">Brand:</label>
        <input type="text" id="brand" name="shoes_brand" class="mt-2 p-2 w-full border border-gray-300 rounded-lg">
        
        <label for="price" class="block text-lg font-medium text-gray-700 mt-4">Price (IDR):</label>
        <input type="text" id="price" name="shoes_price" class="mt-2 p-2 w-full border border-gray-300 rounded-lg">
        
        <label for="size" class="block text-lg font-medium text-gray-700 mt-4">Size:</label>
        <input type="text" id="size" name="shoes_size" class="mt-2 p-2 w-full border border-gray-300 rounded-lg">
        
        <label for="image" class="block text-lg font-medium text-gray-700 mt-4">Upload Image:</label>
        <input type="file" id="image" name="shoes_img" class="mt-2 p-2 w-full border border-gray-300 rounded-lg ">
        
        <input type="submit" name="create" value="Post" class="mt-4 bg-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-400"></input>
      </form>
    </div>
  </div>
</div>
</body>
</html>