$(document).ready(function() {
  
  var slideIndex = 0;
  showSlides();

  function showSlides() {
      var slides = $(".slide-background");
      slides.css("opacity", "0"); // Cacher toutes les diapositives
      slideIndex++;
      if (slideIndex >= slides.length) {
          slideIndex = 0; // Revenir au début du tableau
      }
      $(slides[slideIndex]).css("opacity", "1"); // Afficher la diapositive actuelle
      setTimeout(showSlides, 5000); 
    }
  });



const hamburger = document.querySelector("header div");
const navMenu = document.querySelector("header ul");
const home = document.getElementById("home");
const frontPage = document.querySelector("section:first-child");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
 
  frontPage.classList.toggle("change-height");
});



