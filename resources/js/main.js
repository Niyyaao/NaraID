/**
 * Nara.Id - Custom Main JavaScript
 */

(function () {
  "use strict";

  /**
   * Apply .scrolled class to body when page is scrolled
   */
  function toggleScrolled() {
    const body = document.querySelector("body");
    const header = document.querySelector("#header");

    if (!header) return;

    if (
      !header.classList.contains("scroll-up-sticky") &&
      !header.classList.contains("sticky-top") &&
      !header.classList.contains("fixed-top")
    ) {
      return;
    }

    if (window.scrollY > 100) {
      body.classList.add("scrolled");
    } else {
      body.classList.remove("scrolled");
    }
  }

  document.addEventListener("scroll", toggleScrolled);
  window.addEventListener("load", toggleScrolled);

  /**
   * Preloader
   */
  const preloader = document.querySelector("#preloader");

  if (preloader) {
    window.addEventListener("load", () => {
      preloader.remove();
    });
  }

  /**
   * Scroll Top Button
   */
  const scrollTop = document.querySelector(".scroll-top");

  function toggleScrollTop() {
    if (!scrollTop) return;

    if (window.scrollY > 100) {
      scrollTop.classList.add("active");
    } else {
      scrollTop.classList.remove("active");
    }
  }

  if (scrollTop) {
    scrollTop.addEventListener("click", (event) => {
      event.preventDefault();

      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });

    window.addEventListener("load", toggleScrollTop);
    document.addEventListener("scroll", toggleScrollTop);
  }

  /**
   * AOS Animation
   */
  function aosInit() {
    if (typeof AOS !== "undefined") {
      AOS.init({
        duration: 600,
        easing: "ease-in-out",
        once: true,
        mirror: false
      });
    }
  }

  window.addEventListener("load", aosInit);

  /**
   * Smooth Scroll for Hash Links
   */
  window.addEventListener("load", function () {
    if (!window.location.hash) return;

    const section = document.querySelector(window.location.hash);

    if (!section) return;

    setTimeout(() => {
      const scrollMarginTop = getComputedStyle(section).scrollMarginTop;

      window.scrollTo({
        top: section.offsetTop - parseInt(scrollMarginTop || 0),
        behavior: "smooth"
      });
    }, 100);
  });

})();