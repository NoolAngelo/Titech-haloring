/**
 * Mobile navigation functionality for Halo Ring website
 * Handles toggling the mobile menu and button states
 */

document.addEventListener("DOMContentLoaded", function () {
  const navBtn = document.getElementById("nav-mobile-btn");
  const nav = document.getElementById("nav");

  if (navBtn && nav) {
    navBtn.addEventListener("click", () => {
      nav.classList.toggle("hidden");
      navBtn.classList.toggle("close");
    });
  }
});
