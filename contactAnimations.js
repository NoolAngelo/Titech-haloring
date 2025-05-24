/**
 * Contact page animations and enhancements
 * Add staggered animations and interactivity to the contact form
 */

document.addEventListener('DOMContentLoaded', function() {
  // Animate form elements with staggered effect
  const animateFormElements = () => {
    const formElements = document.querySelectorAll('.contact-wrapper form input, .contact-wrapper form textarea, .contact-wrapper form button');
    formElements.forEach((el, index) => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
      el.style.transitionDelay = `${index * 0.1}s`;
      
      setTimeout(() => {
        el.style.opacity = '1';
        el.style.transform = 'translateY(0)';
      }, 300);
    });
    
    // Animate contact info items
    const infoElements = document.querySelectorAll('.contact-wrapper .bg-gray-100 .flex.items-start');
    infoElements.forEach((el, index) => {
      el.style.opacity = '0';
      el.style.transform = 'translateX(-20px)';
      el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
      el.style.transitionDelay = `${0.2 + (index * 0.1)}s`;
      
      setTimeout(() => {
        el.style.opacity = '1';
        el.style.transform = 'translateX(0)';
      }, 300);
    });
  };
  
  // Add subtle hover effects to form inputs
  const addFormInteractions = () => {
    const inputs = document.querySelectorAll('.contact-wrapper input, .contact-wrapper textarea');
    
    inputs.forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.classList.add('focused');
      });
      
      input.addEventListener('blur', function() {
        if (this.value === '') {
          this.parentElement.classList.remove('focused');
        }
      });
    });
  };
  
  // Run the animations on page load
  animateFormElements();
  addFormInteractions();
  
  // Add ripple effect to submit button
  const submitButton = document.querySelector('.contact-wrapper button[type="submit"]');
  if (submitButton) {
    submitButton.addEventListener('click', function(e) {
      const ripple = document.createElement('span');
      const rect = this.getBoundingClientRect();
      
      ripple.className = 'form-btn-ripple';
      ripple.style.width = ripple.style.height = `${Math.max(rect.width, rect.height)}px`;
      ripple.style.left = `${e.clientX - rect.left - ripple.offsetWidth / 2}px`;
      ripple.style.top = `${e.clientY - rect.top - ripple.offsetHeight / 2}px`;
      
      this.appendChild(ripple);
      
      setTimeout(() => {
        ripple.remove();
      }, 600); // Match the CSS animation duration
    });
  }
});
