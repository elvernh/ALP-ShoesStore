const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');
const heartText = document.querySelector(".heartText");
const heart = document.querySelector(".heart");
const shop = document.querySelector(".shop");
const shopText = document.querySelector(".shopText");
const search = document.querySelector(".search");
const searchText = document.querySelector(".searchText");


//hamburger function
        hamburger.addEventListener('click', function(){
          hamburger.classList.toggle('hamburger-active');
          navMenu.classList.toggle('hidden');
          heartText.classList.toggle('hidden');
          heart.classList.toggle('hidden');
          shopText.classList.toggle('hidden');
          shop.classList.toggle('hidden');
          search.classList.toggle('hidden');
          searchText.classList.toggle('hidden');
        });

        window.onscroll = function(){
          const header = document.querySelector('header');
          const fixedNav = header.offsetTop;
  
          if(window.scrollY > fixedNav){
            header.classList.add('navbar-fixed');
          }else{
            header.classList.remove('navbar-fixed');
          }
        }