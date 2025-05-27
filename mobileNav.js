/**
 * Modern Mobile Navigation for Halo Ring Website
 * Clean, simple, and functional mobile navigation
 */

document.addEventListener("DOMContentLoaded", function () {
  const navBtn = document.getElementById("nav-mobile-btn");
  const nav = document.getElementById("nav");

  // Get all dark mode toggle buttons
  const darkModeToggles = document.querySelectorAll('[id^="dark-mode-toggle"]');
  const lightIcons = document.querySelectorAll(".sun-icon, .light-icon");
  const darkIcons = document.querySelectorAll(".moon-icon, .dark-icon");

  // Mobile navigation functionality
  if (navBtn && nav) {
    navBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      const isOpen = nav.classList.contains("hidden");

      if (isOpen) {
        // Show menu
        nav.classList.remove("hidden");
        nav.style.opacity = "0";
        nav.style.transform = "translateY(-20px) scale(0.95)";

        // Force a reflow to ensure the initial styles are applied
        nav.offsetHeight;

        setTimeout(() => {
          nav.style.opacity = "1";
          nav.style.transform = "translateY(0) scale(1)";
        }, 10);

        // Animate hamburger to X
        animateHamburgerToX();
        navBtn.setAttribute("aria-expanded", "true");

        // Add body class to prevent scrolling
        document.body.style.overflow = "hidden";
      } else {
        // Hide menu
        nav.style.opacity = "0";
        nav.style.transform = "translateY(-20px) scale(0.95)";

        setTimeout(() => {
          nav.classList.add("hidden");
          document.body.style.overflow = "";
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
        nav.style.transform = "translateY(-20px) scale(0.95)";

        setTimeout(() => {
          nav.classList.add("hidden");
          document.body.style.overflow = "";
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
          nav.style.transform = "translateY(-20px) scale(0.95)";

          setTimeout(() => {
            nav.classList.add("hidden");
            document.body.style.overflow = "";
          }, 300);

          animateXToHamburger();
          navBtn.setAttribute("aria-expanded", "false");
        }
      });
    });

    // Close menu on escape key
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && !nav.classList.contains("hidden")) {
        nav.style.opacity = "0";
        nav.style.transform = "translateY(-20px) scale(0.95)";

        setTimeout(() => {
          nav.classList.add("hidden");
          document.body.style.overflow = "";
        }, 300);

        animateXToHamburger();
        navBtn.setAttribute("aria-expanded", "false");
      }
    });
  }

  // Improved hamburger animation functions
  function animateHamburgerToX() {
    const lines = navBtn.querySelectorAll(".hamburger-line");
    if (lines.length >= 3) {
      lines[0].style.transform =
        "rotate(45deg) translateY(8px) translateX(6px)";
      lines[1].style.opacity = "0";
      lines[1].style.transform = "scale(0)";
      lines[2].style.transform =
        "rotate(-45deg) translateY(-8px) translateX(6px)";
    }
  }

  function animateXToHamburger() {
    const lines = navBtn.querySelectorAll(".hamburger-line");
    if (lines.length >= 3) {
      lines[0].style.transform = "rotate(0) translateY(0) translateX(0)";
      lines[1].style.opacity = "1";
      lines[1].style.transform = "scale(1)";
      lines[2].style.transform = "rotate(0) translateY(0) translateX(0)";
    }
  }

  // Dark mode functionality
  function toggleDarkMode(enable) {
    // Add transition class
    document.body.style.transition =
      "background-color 0.5s ease, color 0.5s ease";

    if (enable) {
      document.body.classList.add("dark-mode");
      document.documentElement.classList.add("dark");
      lightIcons.forEach((icon) => icon.classList.remove("hidden"));
      darkIcons.forEach((icon) => icon.classList.add("hidden"));
      localStorage.setItem("darkMode", "enabled");
    } else {
      document.body.classList.remove("dark-mode");
      document.documentElement.classList.remove("dark");
      darkIcons.forEach((icon) => icon.classList.remove("hidden"));
      lightIcons.forEach((icon) => icon.classList.add("hidden"));
      localStorage.setItem("darkMode", "disabled");
    }

    // Remove transition after animation completes
    setTimeout(() => {
      document.body.style.transition = "";
    }, 500);
  }

  // Initialize dark mode
  const darkModePref = localStorage.getItem("darkMode");
  const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;

  if (darkModePref === "enabled" || (darkModePref === null && prefersDark)) {
    toggleDarkMode(true);
  }

  // Add click event listeners to all dark mode toggle buttons
  darkModeToggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      const isDarkMode = document.body.classList.contains("dark-mode");
      toggleDarkMode(!isDarkMode);
    });
  });

  // Listen for system dark mode changes
  window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (e) => {
      if (localStorage.getItem("darkMode") === null) {
        toggleDarkMode(e.matches);
      }
    });

  // Handle window resize
  window.addEventListener("resize", function () {
    if (window.innerWidth >= 768 && nav) {
      nav.classList.remove("hidden");
      nav.style.opacity = "1";
      nav.style.transform = "translateY(0) scale(1)";
      animateXToHamburger();
      navBtn.setAttribute("aria-expanded", "false");
      document.body.style.overflow = "";
    }
  });

  // Add proper transitions to nav
  if (nav) {
    nav.style.transition =
      "opacity 0.3s cubic-bezier(0.25, 1, 0.5, 1), transform 0.3s cubic-bezier(0.25, 1, 0.5, 1)";
  }

  // Initialize nav visibility on page load
  if (nav && window.innerWidth < 768) {
    nav.classList.add("hidden");
  }
});
