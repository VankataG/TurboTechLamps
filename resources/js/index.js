// Reveal on scroll
const io = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      io.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal, .card').forEach(el => io.observe(el));

// Subtle tilt + shine per card
const supportsMotion = window.matchMedia('(prefers-reduced-motion: no-preference)').matches;

if (supportsMotion) {
  document.querySelectorAll('[data-tilt]').forEach(card => {
    const rect = () => card.getBoundingClientRect();

    function onMove(e) {
      const r = rect();
      const x = e.clientX - r.left;
      const y = e.clientY - r.top;
      const rx = ((y / r.height) - 0.5) * -6; // tilt range
      const ry = ((x / r.width) - 0.5) * 6;
      card.style.transform = `translateY(0) rotateX(${rx}deg) rotateY(${ry}deg)`;
      card.style.transition = 'transform .06s ease-out';
      card.style.transformStyle = 'preserve-3d';
      card.style.willChange = 'transform';
      // Update shine origin
      card.style.setProperty('--mx', `${(x / r.width) * 100}%`);
      card.style.setProperty('--my', `${(y / r.height) * 100}%`);
    }

    function onLeave() {
      card.style.transition = 'transform .35s ease';
      card.style.transform = 'translateY(0) rotateX(0) rotateY(0)';
    }

    card.addEventListener('mousemove', onMove);
    card.addEventListener('mouseleave', onLeave);
  });
}
