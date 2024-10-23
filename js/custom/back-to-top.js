/************* BACK TO TOP ********************/
document.addEventListener("DOMContentLoaded", () => {
  const offset = 500;
  const duration = 600;
  const backToTopButton = document.querySelector(".back-to-top");

  // Inicialmente oculto
  Object.assign(backToTopButton.style, {
    right: '-100px',
    opacity: '0',
    transition: 'right 0.6s ease-in-out, opacity 0.6s ease-in-out',
  });

  window.addEventListener("scroll", () => {
    const scrollY = window.scrollY;
    backToTopButton.style.right = scrollY > offset ? '20px' : '-100px';
    backToTopButton.style.opacity = scrollY > offset ? '1' : '0';
  });

  backToTopButton.addEventListener("click", (event) => {
    event.preventDefault();

    const scrollToTop = (start, timestamp) => {
      if (!start.time) start.time = timestamp;
      const progress = timestamp - start.time;
      const scrollPosition = Math.max(start.value - (progress / duration) * start.value, 0);
      window.scrollTo(0, scrollPosition);

      if (scrollPosition > 0) requestAnimationFrame((t) => scrollToTop(start, t));
    };

    requestAnimationFrame((timestamp) => scrollToTop({ value: window.scrollY }, timestamp));
  });
});
