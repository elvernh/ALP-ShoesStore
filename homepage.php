
<?php
require 'controller.php';
include_once("controller.php");
session_start();
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
                  <a href="addshoes.php" class="text-lg py-2 mx-8">Add Shoe</a>
                </li>
                <li class="group">
                  <a href="#" class="text-lg py-2 mx-8">Brand</a>
                </li>
                <li class="group">
                  <a href="#" class="text-lg py-2 mx-8">My Review</a>
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
                  <li><a href="#"><svg class="heart" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.3124 26.4646L14.9374 26.3021C9.04995 23.6896 2.78745 18.5646 2.81245 11.9896C2.82495 8.11461 4.97495 5.00211 8.41245 3.90211C11.05 3.05211 13.4624 3.68961 15.3124 5.70211C17.1624 3.68961 19.5749 3.05211 22.2124 3.90211C25.6499 5.01461 27.7999 8.11461 27.8124 12.0021C27.8499 18.5646 21.5749 23.6896 15.6874 26.3021L15.3124 26.4646ZM10.625 5.40211C10.1 5.40211 9.56245 5.48961 8.98745 5.67711C5.82495 6.68961 4.68745 9.61461 4.68745 12.0021C4.66245 17.5271 10.3125 22.0896 15.3124 24.4021C20.3124 22.0896 25.9624 17.5271 25.9374 12.0021C25.9374 9.61461 24.7874 6.70211 21.6374 5.67711C19.3999 4.95211 17.5374 5.65211 16.0874 7.72711L15.3124 8.82711L14.5374 7.72711C13.4624 6.17711 12.15 5.38961 10.625 5.38961V5.40211Z" fill="black"/>
                    </svg><p class="heartText hidden">Favourite</p>
                    </a></li>
                    <li><a href=""><svg class="shop" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.5 2.5L3.75 7.5V25C3.75 25.663 4.01339 26.2989 4.48223 26.7678C4.95107 27.2366 5.58696 27.5 6.25 27.5H23.75C24.413 27.5 25.0489 27.2366 25.5178 26.7678C25.9866 26.2989 26.25 25.663 26.25 25V7.5L22.5 2.5H7.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M3.75 7.5H26.25" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M20 12.5C20 13.8261 19.4732 15.0979 18.5355 16.0355C17.5979 16.9732 16.3261 17.5 15 17.5C13.6739 17.5 12.4021 16.9732 11.4645 16.0355C10.5268 15.0979 10 13.8261 10 12.5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg><p class="shopText hidden">Wish List</p></a></li>
                </div>
              </ul>
            </nav>
          </div>
        </div>
        </div>
      </div>
    </header>

    <section id="home" class="pt-36 pb-10 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center">
          <div class="w-full self-center px-4 lg:w-1/2">
            <img class="drop-shadow-2xl" src="Images/Photos/pngegg-2.png">
          </div>
          <div class="w-full self-center px-4 lg:w-1/2">
            <div class="relative mt-10 lg:mt-9 lg:right-0">
              <h1 class="text-3xl font-semibold">Discover insightful reviews for your favorite shoes from fellow users, available anytime, anywhere.</h1>
              <p class="my-10">Easily access comprehensive online reviews to make informed purchasing decisions and find the perfect pair for every occasion.</p>
              <div class="flex">
                <button class="rounded-full border-2 border-stone-900 px-6 py-[10px]">Review Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="slider" class="pt-20">
      <div class="container mx-auto px-8 relative lg:px-4">
        <h2 class="text-2xl font-bold mb-4">New Reviews</h2>
        <div class="wrapper snap-x max-h-[220px] flex overflow-x-auto lg:max-h-[520px]">
          <?php
          $all = getAllShoes();
          $counter = 0;
          while ($row = mysqli_fetch_assoc($all)) {
            if($counter >= 5){
              break;
            }
            echo '<div class="rounded-lg item snap-center min-w-[200px] h-[200px] align-center bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <a href="shoesReview.php?id=' . $row['shoes_id'] . '"><img class="h-full rounded-lg" src="' . $row['shoes_img'] . '"></a></div>';
            $counter++;
          }
          ?>
          <!-- <div class="item snap-center min-w-[200px] h-[200px] align-center bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <img class="h-full" src="">
          </div>
          <div class="item snap-center min-w-[200px] h-[200px] align-center bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <a href="#"><img class="h-full" src=""></a>
          </div>
          <div class="item snap-center min-w-[200px] h-[200px] align-center bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <a href="#"><img class="h-full" src=""></a>
          </div>
          <div class="item snap-center min-w-[200px] h-[200px] align-center bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <a href="#"><img class="h-full" src=""></a>
          </div>
          <div class="item snap-center min-w-[200px] h-[200px] align-center bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <a href="#"><img class="h-full" src=""></a>
          </div> -->
        </div>
      </div>
    </section>

    <section class="pt-36">

    </section>

    <footer class="bg-gray-100 pt-12 pb-24 border-t-2">
      <div class="container mx-auto px-4 flex flex-wrap ">
        <div class="block text-center flex-wrap mx-auto">
          <h1 class="text-2xl font-semibold my-2">No Air Forces</h1>
          <p><a class="mx-2" href="#">Terms & Condition</a>|<a class="mx-2" href="#">Contact Us</a></p>
          <p class="mt-20 flex items-center justify-center text-stone-900">©2024 NoAirForces Developer Team</p>
        </div>
      </div>
    </footer>
  </body>
</html>
