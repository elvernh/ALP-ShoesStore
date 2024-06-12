<?php
require 'controller.php';
session_start();
cekLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shoes List</title>
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
                            <li class="group">
                                <a href="updateDelShoes.php" class="text-lg py-2 mx-8">Update / Delete Shoes</a>
                            </li>
                            <div class="block lg:flex lg:ml-14">

                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<li><a href="logout.php" class="text-lg">Log Out</a></li>';
                                } else {
                                    echo '<li><a href="login.php" class="text-lg">Login/Register</a></li>';
                                }

                                ?>
                                <li>
                                    <form class="search">
                                        <button class="absolute mt-1.5 ml-2" type="submit"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.00305 13.2269C5.00305 8.37566 8.95055 4.42941 13.8018 4.42941C18.6518 4.42941 22.5993 8.37566 22.5993 13.2269C22.5993 18.0781 18.6518 22.0256 13.8018 22.0256C8.95055 22.0256 5.00305 18.0781 5.00305 13.2269ZM28.1218 26.3006L22.373 20.5669C24.068 18.5906 25.0993 16.0294 25.0993 13.2269C25.0993 6.99816 20.0305 1.92941 13.8018 1.92941C7.5718 1.92941 2.50305 6.99816 2.50305 13.2269C2.50305 19.4569 7.5718 24.5256 13.8018 24.5256C16.3293 24.5256 18.658 23.6806 20.5418 22.2719L26.3568 28.0706L28.1218 26.3006Z" fill="black" />
                                            </svg>
                                        </button>
                                        <input type="text" placeholder="Search" class="w-17 py-2 pl-12 pr-7 outline-stone-800 bg-gray-100 placeholder-black rounded-full outline-none">
                                    </form>
                                    <a href="#">
                                        <p class="searchText hidden">Search</p>
                                    </a>
                                </li>

                            </div>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </header>
    <?php
    if (isset($_POST["update"])) {
        $updatedID = $_POST["inputID"];
        $shoes_name = $_POST["shoes_name"];
        $shoes_brand = $_POST["shoes_brand"];
        $shoes_price = $_POST["shoes_price"];
        $shoes_size = $_POST["shoes_size"];
        $image = $_FILES["shoes_img"];


        $uploadImage = 1;
        $image_location = "";
        if ($_FILES["image"]["name"] != NULL) {
            $foldername = "image";
            $uploadImage = uploadImage($foldername, $image);
            $image_location = $foldername . "/" . htmlspecialchars(basename($image["name"]));
        }

        if ($uploadImage == 1) {
            updateShoes($updatedID, $shoes_name, $shoes_brand, $shoes_price, $shoes_size, $image_location);
            echo '<script>window.location.href = "showmovielist.php";</script>';
        } else {
            echo $uploadImage;
        }
    }

    // Form display logic
    if (isset($_GET["shoes_id"])) {
        $updateID = $_GET["shoes_id"];
        $shoe = getShoesWithID($shoes_id);
        if ($shoe != NULL) {
    ?>

            <div class="container mt-20 mx-4">
                <form action="updatemovie.php" method="POST" enctype="multipart/form-data" class="p-6">
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="lg:text-3xl text-2xl font-semibold leading-7 text-gray-900">Update Shoes Data</h2>
                            <p class="mt-1 text-base leading-6 text-gray-600">Fill out the details below to update the shoes information.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-full">
                                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                                    <div class="mt-2 flex items-center">
                                        <?php if (!empty($shoe["shoes_img"])) : ?>
                                            <img src="<?= $shoe["shoes_img"] ?>" alt="Current Image" class="h-20 w-20 object-cover rounded-md mr-4">
                                        <?php endif; ?>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                </div>
                                <div class="container mx-auto px-6 pt-[12rem]">
                                    <div class="flex justify-between items-center bg-white p-6 rounded-lg shadow-lg">
                                        <div class="w-full lg:w-1/2">
                                            <h1 class="text-2xl font-bold mb-4 lg:text-3xl mb-4">Add Shoes</h1>
                                            <form method="POST" action="addshoes.php" enctype="multipart/form-data">

                                                <label for="shoename" class="block text-lg font-medium text-gray-700 mt-4">Shoe name:</label>
                                                <input type="text" id="shoename" name="shoes_name" value="<?= $shoe["shoes_name"] ?>" class="mt-2 p-2 w-full border border-gray-300 rounded-lg">

                                                <label for="brand" class="block text-lg font-medium text-gray-700 mt-4">Brand:</label>
                                                <input type="text" id="brand" name="shoes_brand" value="<?= $shoe["shoes_brand"] ?>" class="mt-2 p-2 w-full border border-gray-300 rounded-lg">

                                                <label for="price" class="block text-lg font-medium text-gray-700 mt-4">Price (IDR):</label>
                                                <input type="text" id="price" name="shoes_price" value="<?= $shoe["shoes_price"] ?>" class="mt-2 p-2 w-full border border-gray-300 rounded-lg">

                                                <label for="size" class="block text-lg font-medium text-gray-700 mt-4">Size:</label>
                                                <input type="text" id="size" name="shoes_size" value="<?= $shoe["shoes_size"] ?>" class="mt-2 p-2 w-full border border-gray-300 rounded-lg">
                                                <div class="sm:col-span-full">
                                                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                                                    <div class="mt-2 flex items-center">
                                                        <?php if (!empty($movie["image"])) : ?>
                                                            <img src="<?= $movie["image"] ?>" alt="Current Image" class="h-20 w-20 object-cover rounded-md mr-4">
                                                        <?php endif; ?>
                                                        <input class="form-control" type="file" id="image" name="image">
                                                    </div>
                                                </div>

                                                <input type="submit" name="changeImage" value="Post" class="mt-4 bg-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-400"></input>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <input type="hidden" name="inputID" id="inputID" value="<?= $movie["movie_id"] ?>">
                        <button type="submit" name="update" class="rounded-md bg-orange-200 px-3 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-orange-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                    </div>
                </form>
            </div>

    <?php
        }
    }
    ?>