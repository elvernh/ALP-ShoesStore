document.getElementById("searchButton").addEventListener("click", function () {
  window.location.href = "https://www.google.com";
});

document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.querySelector("#hamburger");
    const navMenu = document.querySelector("#nav-menu");
  
    hamburger.addEventListener("click", function () {
      hamburger.classList.toggle("hamburger-active");
      navMenu.classList.toggle("displayHidden");
    });
  });