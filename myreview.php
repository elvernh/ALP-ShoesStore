<?php
require_once 'controller.php';
session_start();
cekLogin();
?>


<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>No Air Forces - Where Good Shoes Comes</title>
    <link rel="shortcut icon" type="x-icon" href="Images/Logo/Group 1.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="scriptHome.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    

  </head>
  <body class="font-rubik"> 
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
                <li class="group">
                    <a href="updateDelShoes.php" class="text-lg py-2 mx-8">Update / Delete Shoes</a>
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

    <section class="pt-44 px-4">
        <div class="container mx-auto">
        <h1 class="text-3xl font-semibold mb-10">My Review List</h1>
        <div class="wrapper shadow-lg lg:justify-between lg:flex  h-[26rem] lg:h-40 rounded-lg mb-5 border-2 border-black">
            <img class="w-full lg:w-auto lg:h-full h-60 rounded-t-lg lg:border-r-2 lg:border-b-none border-b-2 border-black lg:rounded-r-none lg:rounded-l-lg object-cover" src="Images/Photos/Red Nike Shoes.jpeg">
            <div class="ml-5 lg:ml-0 lg:mt-3 flex lg:flex-row justify-around w-full">
                <div class="my-auto mt-[4rem] lg:mt-8">
                    <h1 class="text-lg font-semibold lg:text-2xl">Shoe Name</h1>
                    <p class="font-light text-sm">Review Goes Here</p>
                </div>
                <ul class="my-auto flex justify-center lg:justify-end mt-20 lg:mt-10 lg:mr-10 space-x-4 lg:space-x-6">
                    <li class="mr-4 lg:text-xl lg:mr-5 font-semibold duration-300 hover:text-2xl hover:duration-500"><a href="#">Edit</a></li>
                    <li class="lg:text-xl font-semibold duration-300 hover:text-2xl hover:duration-500"><a href="#">Delete</a></li>
                </ul>
            </div>
        </div>
    </section>

  </body>