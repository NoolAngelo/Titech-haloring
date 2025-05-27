/**
 * Unified Dark Mode Toggle for Halo Ring Website
 * Handles dark mode functionality across all pages
 */

(function () {
  "use strict";

  // Dark mode state management
  let isDarkMode = false;

  // Initialize dark mode on DOM content loaded
  document.addEventListener("DOMContentLoaded", function () {
    initializeDarkMode();
    setupEventListeners();
  });

  function initializeDarkMode() {
    // Check user preference from localStorage
    const savedMode = localStorage.getItem("darkMode");
    const prefersDark = window.matchMedia(
      "(prefers-color-scheme: dark)"
    ).matches;

    // Determine initial dark mode state
    if (savedMode === "enabled" || (savedMode === null && prefersDark)) {
      enableDarkMode();
    } else {
      disableDarkMode();
    }

    // Listen for system theme changes
    window
      .matchMedia("(prefers-color-scheme: dark)")
      .addEventListener("change", function (e) {
        if (localStorage.getItem("darkMode") === null) {
          if (e.matches) {
            enableDarkMode();
          } else {
            disableDarkMode();
          }
        }
      });
  }

  function setupEventListeners() {
    // Find all dark mode toggle buttons
    const toggleButtons = document.querySelectorAll(
      "#dark-mode-toggle, #dark-mode-toggle-desktop, [data-dark-toggle]"
    );

    toggleButtons.forEach((button) => {
      button.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        toggleDarkMode();
      });
    });

    // Handle keyboard accessibility
    toggleButtons.forEach((button) => {
      button.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " ") {
          e.preventDefault();
          toggleDarkMode();
        }
      });
    });
  }

  function toggleDarkMode() {
    if (isDarkMode) {
      disableDarkMode();
    } else {
      enableDarkMode();
    }
  }

  function enableDarkMode() {
    isDarkMode = true;

    // Apply dark mode classes
    document.documentElement.classList.add("dark");
    document.body.classList.add("dark-mode");

    // Add smooth transition
    document.body.style.transition =
      "background-color 0.3s ease, color 0.3s ease";

    // Update icons
    updateIcons(true);

    // Save preference
    localStorage.setItem("darkMode", "enabled");

    // Remove transition after animation
    setTimeout(() => {
      document.body.style.transition = "";
    }, 300);

    // Dispatch custom event
    dispatchModeChangeEvent("dark");
  }

  function disableDarkMode() {
    isDarkMode = false;

    // Remove dark mode classes
    document.documentElement.classList.remove("dark");
    document.body.classList.remove("dark-mode");

    // Add smooth transition
    document.body.style.transition =
      "background-color 0.3s ease, color 0.3s ease";

    // Update icons
    updateIcons(false);

    // Save preference
    localStorage.setItem("darkMode", "disabled");

    // Remove transition after animation
    setTimeout(() => {
      document.body.style.transition = "";
    }, 300);

    // Dispatch custom event
    dispatchModeChangeEvent("light");
  }

  function updateIcons(darkModeEnabled) {
    // Find all light and dark icons
    const lightIcons = document.querySelectorAll(
      ".sun-icon, .light-icon, #light-icon, [data-light-icon]"
    );
    const darkIcons = document.querySelectorAll(
      ".moon-icon, .dark-icon, #dark-icon, [data-dark-icon]"
    );

    if (darkModeEnabled) {
      // Show sun icons (indicating light mode is available)
      lightIcons.forEach((icon) => {
        icon.classList.remove("hidden");
        icon.style.opacity = "1";
        icon.style.transform = "scale(1)";
      });

      // Hide moon icons
      darkIcons.forEach((icon) => {
        icon.classList.add("hidden");
        icon.style.opacity = "0";
        icon.style.transform = "scale(0.5)";
      });
    } else {
      // Show moon icons (indicating dark mode is available)
      darkIcons.forEach((icon) => {
        icon.classList.remove("hidden");
        icon.style.opacity = "1";
        icon.style.transform = "scale(1)";
      });

      // Hide sun icons
      lightIcons.forEach((icon) => {
        icon.classList.add("hidden");
        icon.style.opacity = "0";
        icon.style.transform = "scale(0.5)";
      });
    }
  }

  function dispatchModeChangeEvent(mode) {
    const event = new CustomEvent("darkModeChange", {
      detail: { mode: mode, isDark: mode === "dark" },
    });
    document.dispatchEvent(event);
  }

  // Public API
  window.DarkMode = {
    toggle: toggleDarkMode,
    enable: enableDarkMode,
    disable: disableDarkMode,
    isEnabled: () => isDarkMode,
    getMode: () => (isDarkMode ? "dark" : "light"),
  };

  // Auto-initialize if script is loaded after DOM
  if (document.readyState === "loading") {
    // DOM is still loading
    document.addEventListener("DOMContentLoaded", initializeDarkMode);
  } else {
    // DOM is already loaded
    initializeDarkMode();
    setupEventListeners();
  }
})();
