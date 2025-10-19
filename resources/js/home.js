// Intersection Observer to reveal elements
const io = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      io.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal, .side-photos img').forEach(el => io.observe(el));

// Subtle parallax on the glow (reduced motion aware)
const glow = document.querySelector('.glow');
if (glow && window.matchMedia('(prefers-reduced-motion: no-preference)').matches) {
  window.addEventListener('mousemove', (e) => {
    const x = (e.clientX / window.innerWidth - 0.5) * 12;
    const y = (e.clientY / window.innerHeight - 0.5) * 12;
    glow.style.transform = `translate(${x}px, ${y}px)`;
  });
}
