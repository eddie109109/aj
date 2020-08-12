// When the user scrolls the page, execute myFunction
window.addEventListener("scroll",function() {
  var header = document.querySelector("header");
  header.classList.toggle("sticky", window.scrollY > 0); // if Y axis is scrolled and greater than 0

})
