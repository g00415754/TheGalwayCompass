document.addEventListener("DOMContentLoaded", function () {
  const cursorDot = document.createElement("div");
  cursorDot.id = "cursor-dot";
  document.body.appendChild(cursorDot);

  document.body.style.cursor = "none"; // Hides default cursor

  let cursor = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
  let dot = { x: window.innerWidth / 2, y: window.innerHeight / 2 };

  document.addEventListener("mousemove", function (e) {
      cursor.x = e.clientX;
      cursor.y = e.clientY;
  });

  function animateCursor() {
      dot.x += (cursor.x - dot.x) * 0.2; // Trail effect
      dot.y += (cursor.y - dot.y) * 0.2;

      cursorDot.style.left = `${dot.x}px`;
      cursorDot.style.top = `${dot.y}px`;

      requestAnimationFrame(animateCursor);
  }

  function hoverEffect(isHovering) {
      if (isHovering) {
          cursorDot.style.width = "40px";
          cursorDot.style.height = "40px";
          cursorDot.style.mixBlendMode = "difference"; // Inverts colors
      } else {
          cursorDot.style.width = "15px";
          cursorDot.style.height = "15px";
      }
  }

  document.querySelectorAll("a, button, .hover-effect").forEach((el) => {
      el.addEventListener("mouseenter", () => hoverEffect(true));
      el.addEventListener("mouseleave", () => hoverEffect(false));
  });

  animateCursor();
});


// Apply animation to all sections with class "fade-in"
gsap.utils.toArray(".fade-in").forEach((section) => {
    gsap.from(section, {
        opacity: 0,
        y: 50, // Slight upward motion
        scale: 0.95, // Slight scale-up for a smoother effect
        duration: 1.2, // Duration of animation
        ease: "power3.out",
        scrollTrigger: {
            trigger: section,
            start: "top 80%", // Start when the element is 80% into view
            toggleActions: "play none none reverse" // Smooth reanimation
        }
    });
});
