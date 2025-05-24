/**
 * Modern Mobile Navigation for Halo Ring Website
 * Clean, simple, and functional mobile navigation
 */

document.addEventListener("DOMContentLoaded", function () {
  const navBtn = document.getElementById("nav-mobile-btn");
  const nav = document.getElementById("nav");
  const darkModeToggle = document.getElementById("dark-mode-toggle");
  const darkModeToggleDesktop = document.getElementById(
    "dark-mode-toggle-desktop"
  );

  // Mobile navigation functionality
  if (navBtn && nav) {
    navBtn.addEventListener("click", function () {
      const isOpen = nav.classList.contains("hidden");

      if (isOpen) {
        // Show menu
        nav.classList.remove("hidden");
        nav.style.opacity = "0";
        nav.style.transform = "translateY(-10px)";

        setTimeout(() => {
          nav.style.opacity = "1";
          nav.style.transform = "translateY(0)";
        }, 10);

        // Animate hamburger to X
        animateHamburgerToX();
        navBtn.setAttribute("aria-expanded", "true");
      } else {
        // Hide menu
        nav.style.opacity = "0";
        nav.style.transform = "translateY(-10px)";

        setTimeout(() => {
          nav.classList.add("hidden");
        }, 300);

        // Animate X back to hamburger
        animateXToHamburger();
        navBtn.setAttribute("aria-expanded", "false");
      }
    });

    // Close menu when clicking outside
    document.addEventListener("click", function (e) {
      if (
        !nav.contains(e.target) &&
        !navBtn.contains(e.target) &&
        !nav.classList.contains("hidden")
      ) {
        nav.style.opacity = "0";
        nav.style.transform = "translateY(-10px)";

        setTimeout(() => {
          nav.classList.add("hidden");
        }, 300);

        animateXToHamburger();
        navBtn.setAttribute("aria-expanded", "false");
      }
    });

    // Close menu when clicking nav links
    const navLinks = nav.querySelectorAll("a");
    navLinks.forEach((link) => {
      link.addEventListener("click", () => {
        if (window.innerWidth < 768) {
          nav.style.opacity = "0";
          nav.style.transform = "translateY(-10px)";

          setTimeout(() => {
            nav.classList.add("hidden");
          }, 300);

          animateXToHamburger();
          navBtn.setAttribute("aria-expanded", "false");
        }
      });
    });
  }

  // Hamburger animation functions
  function animateHamburgerToX() {
    const lines = navBtn.querySelectorAll(".hamburger-line");
    if (lines.length >= 3) {
      lines[0].style.transform = "rotate(45deg) translateY(6px)";
      lines[1].style.opacity = "0";
      lines[2].style.transform = "rotate(-45deg) translateY(-6px)";
    }
  }

  function animateXToHamburger() {
    const lines = navBtn.querySelectorAll(".hamburger-line");
    if (lines.length >= 3) {
      lines[0].style.transform = "rotate(0) translateY(0)";
      lines[1].style.opacity = "1";
      lines[2].style.transform = "rotate(0) translateY(0)";
    }
  }

  // Dark mode functionality for both mobile and desktop
  function setupDarkMode(toggle) {
    if (!toggle) return;

    toggle.addEventListener("click", function () {
      const isDarkMode = document.body.classList.toggle("dark-mode");
      localStorage.setItem("darkMode", isDarkMode);
      updateDarkModeIcons();
    });
  }

  function updateDarkModeIcons() {
    const isDarkMode = document.body.classList.contains("dark-mode");

    // Update mobile icons
    const mobileLight = document.querySelector("#dark-mode-toggle #light-icon");
    const mobileDark = document.querySelector("#dark-mode-toggle #dark-icon");

    // Update desktop icons
    const desktopLight = document.querySelector(
      "#dark-mode-toggle-desktop .light-icon"
    );
    const desktopDark = document.querySelector(
      "#dark-mode-toggle-desktop .moon-icon"
    );

    if (isDarkMode) {
      mobileLight?.classList.add("hidden");
      mobileDark?.classList.remove("hidden");
      desktopLight?.classList.add("hidden");
      desktopDark?.classList.remove("hidden");
    } else {
      mobileLight?.classList.remove("hidden");
      mobileDark?.classList.add("hidden");
      desktopLight?.classList.remove("hidden");
      desktopDark?.classList.add("hidden");
    }
  }

  // Initialize dark mode
  const savedDarkMode = localStorage.getItem("darkMode") === "true";
  if (savedDarkMode) {
    document.body.classList.add("dark-mode");
  }
  updateDarkModeIcons();

  // Setup dark mode toggles
  setupDarkMode(darkModeToggle);
  setupDarkMode(darkModeToggleDesktop);

  // Handle window resize
  window.addEventListener("resize", function () {
    if (window.innerWidth >= 768 && nav) {
      nav.classList.remove("hidden");
      nav.style.opacity = "1";
      nav.style.transform = "translateY(0)";
      animateXToHamburger();
      navBtn.setAttribute("aria-expanded", "false");
    }
  });

  // Add proper transitions to nav
  if (nav) {
    nav.style.transition = "opacity 0.3s ease, transform 0.3s ease";
  }
});
