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

//function for fixed navbar
window.onscroll = function(){
  const header = document.querySelector('header');
  const fixedNav = header.offsetTop;

  if(window.scrollY > fixedNav){
    header.classList.add('navbar-fixed');
  }else{
    header.classList.remove('navbar-fixed');
  }
}


const carouselItems = document.querySelectorAll('[data-carousel-item]');
const indicators = document.querySelectorAll('[data-carousel-slide-to]');
let currentIndex = 0;
const totalItems = carouselItems.length;

function showSlide(index) {
  carouselItems.forEach((item, idx) => {
    if (idx === index) {
      item.classList.remove('hidden');
    } else {
      item.classList.add('hidden');
    }
  });

  indicators.forEach((indicator, idx) => {
    if (idx === index) {
      indicator.setAttribute('aria-current', 'true');
    } else {
      indicator.setAttribute('aria-current', 'false');
    }
  });
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % totalItems;
  showSlide(currentIndex);
}

showSlide(currentIndex);
setInterval(nextSlide, 4500);

indicators.forEach((indicator, idx) => {
  indicator.addEventListener('click', () => {
    currentIndex = idx;
    showSlide(currentIndex);
  });
});