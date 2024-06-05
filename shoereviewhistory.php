<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Homepage</title>
    <link rel="shortcut icon" type="x-icon" href="Images/Logo/Group 1.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="scriptHome.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
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
      
    <section id="home" class="pt-36 pb-10 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center">
          <div class="w-full self-center px-4 lg:w-1/2">
            <img class="drop-shadow-2xl" src="Images/Photos/pngegg-2.png">
          </div>
          <div class="w-full self-center px-4 lg:w-1/2">
            <div class="relative mt-10 lg:mt-9 lg:right-0">
                <p class="text font-light">Shoes Brand</p>
              <h1 class="text-3xl">Shoes name</h1>
              <p class="mt-4 mb-10 text-4xl font-bold">IDR 100000</p>
              <div class="flex">
                <a href="shoesReview.php"  class="rounded-full border-2 border-stone-900 px-6 py-[10px] duration-300 hover:duration-500 hover:bg-stone-900 hover:text-white">Click to review</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="slider" class="pt-20">
      <div class="container mx-auto px-8 relative mb-20 lg:px-4">
        <h2 class="text-2xl font-bold mb-4">Reviews From People</h2>
        <div class="wrapper max-h-[220px] snap-x flex overflow-x-auto lg:max-h-[520px]">
            
          <div class="item snap-center min-w-[200px] h-[200px] align-center rounded-lg bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <a href="#"><h1 class="text-3xl font-semibold flex justify-center mt-[8rem]">From: Elvern Haryanto</h1>
            <p class="mt-[6rem] px-5 text-lg flex justify-center text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet nam ea reprehenderit autem rerum ipsa dolore voluptatibus perferendis voluptatum? Expedita, earum. Eligendi ab reprehenderit aspernatur harum provident blanditiis quos commodi voluptatibus accusamus?</p>
        </a>
          </div>
          <div class="item snap-center min-w-[200px] h-[200px] align-center rounded-lg bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <a href="#"><img class="h-full" src=""></a>
          </div>
          <div class="item snap-center min-w-[200px] h-[200px] align-center rounded-lg bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <a href="#"><img class="h-full" src=""></a>
          </div>
          <div class="item snap-center min-w-[200px] h-[200px] align-center rounded-lg bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <a href="#"><img class="h-full" src=""></a>
          </div>
          <div class="item snap-center min-w-[200px] h-[200px] align-center rounded-lg bg-white border-2 mx-2 lg:min-w-[500px] lg:h-[500px]">
            <a href="#"><img class="h-full" src=""></a>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-gray-100 pt-12 pb-24 border-t-2">
      <div class="container mx-auto px-4 flex flex-wrap ">
        <div class="block text-center flex-wrap mx-auto">
          <h1 class="text-2xl font-semibold my-2">No Air Jordan</h1>
          <p><a class="mx-2" href="#">Terms & Condition</a>|<a class="mx-2" href="#">Contact Us</a></p>
          <p class="mt-20 flex items-center justify-center text-stone-900">©2024 NoAirJordan Developer Team</p>
        </div>
      </div>
    </footer>
</body>
</html>