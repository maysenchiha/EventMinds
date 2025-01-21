/**
* Template Name: Mentor
* Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

})();

document.addEventListener('DOMContentLoaded', function() {
  const registerButtons = document.querySelectorAll('.register-btn');
  const modal = document.getElementById('registration-modal');
  const closeModalBtn = document.querySelector('.close-btn');
  const courseInput = document.getElementById('course');

  registerButtons.forEach(button => {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      const courseName = this.closest('.course-item').querySelector('h3 a').textContent;
      courseInput.value = courseName;
      modal.style.display = 'block';
    });
  });

  
  const closeModalBtnn = document.querySelector('.close-btn');
  closeModalBtnn.addEventListener('click', function() {
    modal.style.display = 'none';
  });
  window.addEventListener('click', function(event) {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
});

document.addEventListener('DOMContentLoaded', () => {
  // Sélectionnez toutes les icônes de cœur
  const heartIcons = document.querySelectorAll('.heart-icon');

  // Ajouter un événement de clic pour chaque icône de cœur
  heartIcons.forEach(icon => {
    icon.addEventListener('click', () => {
      // Vérifiez si l'icône est déjà active
      if (icon.classList.contains('active')) {
        icon.classList.remove('active');
        icon.classList.replace('bi-heart-fill', 'bi-heart'); // Revenir à l'icône de contour
      } else {
        icon.classList.add('active');
        icon.classList.replace('bi-heart', 'bi-heart-fill'); // Remplir le cœur
      }
    });
  });
});




 // Fonction de validation du formulaire
 document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const nameInput = document.getElementById("signupName");
  const emailInput = document.getElementById("signupEmail");
  const passwordInput = document.getElementById("signupPassword");
  const confirmPasswordInput = document.getElementById("signupConfirmPassword");

  form.addEventListener("submit", function (event) {
    // Empêcher le comportement par défaut du formulaire
    event.preventDefault();

    // Vérifier que tous les champs sont remplis
    if (
      nameInput.value.trim() === "" ||
      emailInput.value.trim() === "" ||
      passwordInput.value.trim() === "" ||
      confirmPasswordInput.value.trim() === ""
    ) {
      alert("Veuillez remplir tous les champs.");
      return;
    }

    // Vérifier le format de l'email avec une expression régulière
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(emailInput.value)) {
      alert("Veuillez entrer une adresse email valide.");
      return;
    }

    // Vérifier la complexité du mot de passe (au moins 8 caractères, une majuscule, un chiffre, et un caractère spécial)
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordPattern.test(passwordInput.value)) {
      alert("Le mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial.");
      return;
    }

    // Vérifier que les mots de passe correspondent
    if (passwordInput.value !== confirmPasswordInput.value) {
      alert("Les mots de passe ne correspondent pas.");
      return;
    }

    // Si toutes les validations sont réussies, soumettre le formulaire
    alert("Inscription réussie !");
    form.submit(); // Cette ligne soumet le formulaire
  });
});

function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  sidebar.classList.toggle('sidebar-open');
}


