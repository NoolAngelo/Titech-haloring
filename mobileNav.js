/**
 * Mobile navigation functionality for Halo Ring website
 * Handles toggling the mobile menu and button states with enhanced animations
 */

document.addEventListener("DOMContentLoaded", function () {
  const navBtn = document.getElementById("nav-mobile-btn");
  const nav = document.getElementById("nav");
  const navBtnBars = navBtn ? navBtn.querySelectorAll("span") : [];

  // Add transition styles to the nav menu and burger icon
  if (nav) {
    // Add transition styles directly to the element
    nav.style.transition = "opacity 0.3s ease, transform 0.3s ease";
    nav.style.transformOrigin = "top right";
  }

  if (navBtn && nav) {
    navBtn.addEventListener("click", () => {
      // Toggle the navigation menu with animation
      if (nav.classList.contains("hidden")) {
        // Prepare to show - set initial state before removing hidden
        nav.style.opacity = "0";
        nav.style.transform = "translateY(-20px)";
        nav.classList.remove("hidden");

        // Trigger animation after a tiny delay for the browser to recognize the change
        setTimeout(() => {
          nav.style.opacity = "1";
          nav.style.transform = "translateY(0)";
        }, 10);
      } else {
        // Hide with animation
        nav.style.opacity = "0";
        nav.style.transform = "translateY(-20px)";

        // Wait for animation to complete before adding hidden class
        setTimeout(() => {
          nav.classList.add("hidden");
        }, 300); // Match the transition duration
      }

      // Toggle the button appearance - transform to X
      if (navBtnBars.length >= 2) {
        if (navBtn.classList.contains("close")) {
          // Animate to burger icon
          navBtnBars[0].style.transform = "rotate(0deg) translateY(0)";
          navBtnBars[1].style.transform = "rotate(0deg) translateY(0)";
          navBtnBars[1].style.opacity = "1";

          // Small delay to match the nav animation
          setTimeout(() => {
            navBtn.classList.remove("close");
          }, 150);
        } else {
          // Animate to X icon
          navBtn.classList.add("close");
          navBtnBars[0].style.transform = "rotate(45deg) translateY(0.325rem)";
          navBtnBars[1].style.transform =
            "rotate(-45deg) translateY(-0.325rem)";
          navBtnBars[1].style.opacity = "1";
        }
      }

      // Update ARIA attributes
      const isExpanded = navBtn.getAttribute("aria-expanded") === "true";
      navBtn.setAttribute("aria-expanded", !isExpanded);
    });

    // Add CSS for transitions to the nav button bars
    navBtnBars.forEach((bar) => {
      bar.style.transition = "transform 0.3s ease, opacity 0.3s ease";
    });
  }
});
