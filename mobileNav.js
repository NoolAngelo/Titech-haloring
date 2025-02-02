document.addEventListener("DOMContentLoaded", () => {
  const navBtn = document.getElementById("nav-mobile-btn");
  const nav = document.getElementById("nav");

  if (navBtn && nav) {
    navBtn.addEventListener("click", () => {
      const isOpen = nav.classList.toggle("hidden");

      navBtn.classList.toggle("close", !isOpen);
      navBtn.setAttribute("aria-expanded", String(!isOpen));
    });
  }
});
