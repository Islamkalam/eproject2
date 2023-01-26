"use strict";

const menubar = document.querySelector(".menubar");
const navbarLinks = document.querySelector(".navbar-links");
const close = document.querySelector("#close");

menubar.addEventListener("click", (e) => {
  e.preventDefault();
  navbarLinks.style.width = "18rem";
});

close.addEventListener("click", (e) => {
  e.preventDefault();
  navbarLinks.style.width = 0;
});
