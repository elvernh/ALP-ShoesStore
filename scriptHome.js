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

const sliderItems = document.getElementById('slider-items');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    let currentIndex = 0;
    const itemCount = sliderItems.children.length;

    function updateSlider() {
      const offset = -currentIndex * (100 / 3); // Assuming 3 items visible at a time
      sliderItems.style.transform = `translateX(${offset}%)`;
    }

    prevBtn.addEventListener('click', function () {
      currentIndex = (currentIndex > 0) ? currentIndex - 1 : itemCount - 3; // Loop back to the end
      updateSlider();
    });

    nextBtn.addEventListener('click', function () {
      currentIndex = (currentIndex < itemCount - 3) ? currentIndex + 1 : 0; // Loop back to the start
      updateSlider();
    });

    // Optional: Auto-slide functionality
    setInterval(() => {
      nextBtn.click();
    }, 5000);