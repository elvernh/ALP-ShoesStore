<?php
include_once("controller.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login and Registration</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" type="x-icon" href="Images/Logo/Group 1.png" />
  <script>
    function toggleForm(formType) {
      const loginForm = document.getElementById('loginForm');
      const registerForm = document.getElementById('registerForm');
      const loginButton = document.getElementById('loginButton');
      const registerButton = document.getElementById('registerButton');
      
      if (formType === 'login') {
        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');
        loginButton.classList.add('bg-gradient-to-r', 'from-gray-400', 'to-black', 'text-white');
        loginButton.classList.remove('text-gray-600', 'bg-white');
        registerButton.classList.add('text-gray-600', 'bg-white');
        registerButton.classList.remove('bg-gradient-to-r', 'from-gray-400', 'to-black', 'text-white');
      } else {
        registerForm.classList.remove('hidden');
        loginForm.classList.add('hidden');
        registerButton.classList.add('bg-gradient-to-r', 'from-gray-400', 'to-black', 'text-white');
        registerButton.classList.remove('text-gray-600', 'bg-white');
        loginButton.classList.add('text-gray-600', 'bg-white');
        loginButton.classList.remove('bg-gradient-to-r', 'from-gray-400', 'to-black', 'text-white');
      }
    }
  </script>

</head>
<body class="bg-neutral-900 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm border border-gray-300">
    <h2 class="text-2xl font-bold text-center m-10">Welcome Back</h2>
    <div class="border-2 m-4">
      <div class="flex justify-around border-gray-300 max-w-full rounded-lg">
        <button id="loginButton" class="w-1/2 py-4 text-center text-gray-600 bg-white border-r border-gray-300 rounded" onclick="toggleForm('login')">Login</button>
        <button id="registerButton" class="w-1/2 py-2 text-center text-white bg-gradient-to-r from-gray-400 to-black rounded" onclick="toggleForm('register')">Register</button>
      </div>
    </div>

    <!-- Login Form -->
    <form id="loginForm" class="m-4 hidden" method="post">
      <div class="mb-4">
        <label class="sr-only" for="loginUsername">Username</label>
        <div class="relative border border-gray-300 rounded-lg">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg width="20" height="20" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M50.5221 52.9977V47.9503C50.5221 45.273 49.4576 42.7053 47.5626 40.8122C45.6677 38.919 43.0976 37.8555 40.4177 37.8555H20.2089C17.529 37.8555 14.9589 38.919 13.064 40.8122C11.1691 42.7053 10.1045 45.273 10.1045 47.9503V52.9977" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M30.3131 27.7607C35.8937 27.7607 40.4176 23.2411 40.4176 17.6659C40.4176 12.0907 35.8937 7.57109 30.3131 7.57109C24.7326 7.57109 20.2087 12.0907 20.2087 17.6659C20.2087 23.2411 24.7326 27.7607 30.3131 27.7607Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
          <input class="w-full pl-10 pr-4 py-2 border-none rounded-lg focus:outline-none focus:border-gray-500" type="text" id="loginUsername" placeholder="Username">
        </div>
      </div>
      <div class="mb-4">
        <label class="sr-only" for="loginPassword">Password</label>
        <div class="relative border border-gray-300 rounded-lg">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg width="20" height="20" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M47.996 27.7607H12.6306C9.84032 27.7607 7.57837 30.0205 7.57837 32.8081V50.474C7.57837 53.2616 9.84032 55.5214 12.6306 55.5214H47.996C50.7863 55.5214 53.0482 53.2616 53.0482 50.474V32.8081C53.0482 30.0205 50.7863 27.7607 47.996 27.7607Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M17.6826 27.7607V17.6659C17.6826 14.3193 19.0133 11.1097 21.382 8.74326C23.7507 6.37684 26.9633 5.04739 30.3131 5.04739C33.6629 5.04739 36.8756 6.37684 39.2442 8.74326C41.6129 11.1097 42.9436 14.3193 42.9436 17.6659V27.7607" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
          </span>
          <input class="w-full pl-10 pr-4 py-2 border-none rounded-lg focus:outline-none focus:border-gray-500" type="password" id="loginPassword" placeholder="Password">
        </div>
      </div>
      <button class="w-full py-2 text-center text-white bg-gradient-to-r from-gray-400 to-black rounded-lg">Login</button>
      <div class="text-center m-4">
        <a class="text-gray-500" href="#" onclick="toggleForm('register')">Don't have an account? <span class="text-stone-300">Register</span></a>
      </div>
    </form>

    <!-- Register Form -->
    <form id="registerForm" class="m-4" method="post">
      <div class="mb-4">
        <label class="sr-only" for="email">Email address</label>
        <div class="relative border border-gray-300 rounded-lg">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.30103 4.51547H20.301C21.401 4.51547 22.301 5.41547 22.301 6.51547V18.5155C22.301 19.6155 21.401 20.5155 20.301 20.5155H4.30103C3.20103 20.5155 2.30103 19.6155 2.30103 18.5155V6.51547C2.30103 5.41547 3.20103 4.51547 4.30103 4.51547Z" stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M22.301 6.51547L12.301 13.5155L2.30103 6.51547" stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              
          </span>
          <input class="w-full pl-10 pr-4 py-2 border-none rounded-lg focus:outline-none focus:border-gray-500" type="email" id="email" placeholder="Email address">
        </div>
      </div>
      <div class="mb-4">
        <label class="sr-only" for="registerUsername">Username</label>
        <div class="relative border border-gray-300 rounded-lg">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg width="20" height="20" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M50.5221 52.9977V47.9503C50.5221 45.273 49.4576 42.7053 47.5626 40.8122C45.6677 38.919 43.0976 37.8555 40.4177 37.8555H20.2089C17.529 37.8555 14.9589 38.919 13.064 40.8122C11.1691 42.7053 10.1045 45.273 10.1045 47.9503V52.9977" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M30.3131 27.7607C35.8937 27.7607 40.4176 23.2411 40.4176 17.6659C40.4176 12.0907 35.8937 7.57109 30.3131 7.57109C24.7326 7.57109 20.2087 12.0907 20.2087 17.6659C20.2087 23.2411 24.7326 27.7607 30.3131 27.7607Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
          <input class="w-full pl-10 pr-4 py-2 border-none rounded-lg focus:outline-none focus:border-gray-500" type="text" id="registerUsername" placeholder="Username">
        </div>
      </div>
      <div class="mb-4">
        <label class="sr-only" for="registerPassword">Password</label>
        <div class="relative border border-gray-300 rounded-lg">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg width="20" height="20" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M47.996 27.7607H12.6306C9.84032 27.7607 7.57837 30.0205 7.57837 32.8081V50.474C7.57837 53.2616 9.84032 55.5214 12.6306 55.5214H47.996C50.7863 55.5214 53.0482 53.2616 53.0482 50.474V32.8081C53.0482 30.0205 50.7863 27.7607 47.996 27.7607Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M17.6826 27.7607V17.6659C17.6826 14.3193 19.0133 11.1097 21.382 8.74326C23.7507 6.37684 26.9633 5.04739 30.3131 5.04739C33.6629 5.04739 36.8756 6.37684 39.2442 8.74326C41.6129 11.1097 42.9436 14.3193 42.9436 17.6659V27.7607" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
          <input class="w-full pl-10 pr-4 py-2 border-none rounded-lg focus:outline-none focus:border-gray-500" type="password" id="registerPassword" placeholder="Password">
        </div>
      </div>
      <button class="w-full py-2 text-center text-white bg-gradient-to-r from-gray-400 to-black rounded-lg">Register</button>
      <div class="text-center m-4">
        <a class="text-gray-500" href="#" onclick="toggleForm('login')">Already have an account? <span class="text-stone-300">Login</span></a>
      </div>
    </div>
    </form>
</body>
</html>