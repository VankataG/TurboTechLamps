(function () {
  const root = document.getElementById('ttl-lightbox');
  if (!root) return;

  const img = document.getElementById('ttl-lb-img');
  const title = document.getElementById('ttl-lb-title');
  const price = document.getElementById('ttl-lb-price');
  const closeBtn = root.querySelector('.ttl-lb-close');
  const backdrop = root.querySelector('.ttl-lb-backdrop');
  const supportsMotion = window.matchMedia('(prefers-reduced-motion: no-preference)').matches;

  function openLightbox(src, alt, t, p) {
    // set content
    img.classList.remove('loaded');
    img.src = src;
    img.alt = alt || '';
    title.textContent = t || '';
    price.textContent = p || '';

    // show
    root.classList.add('open');
    document.documentElement.style.overflow = 'hidden';

    // fade-in once loaded
    img.addEventListener('load', () => img.classList.add('loaded'), { once: true });
  }

  function closeLightbox() {
    root.classList.remove('open');
    document.documentElement.style.overflow = '';
    // small cleanup
    if (supportsMotion) {
      setTimeout(() => { img.src = ''; }, 200);
    } else {
      img.src = '';
    }
  }

  // Click on any catalog card with .js-lightbox
  document.addEventListener('click', (e) => {
    const a = e.target.closest('a.js-lightbox');
    if (!a) return;

    // Prevent navigation; open fullscreen
    e.preventDefault();
    const src = a.dataset.src || a.getAttribute('href');
    const alt = a.dataset.alt || '';
    const t = a.dataset.title || '';
    const p = a.dataset.price || '';
    openLightbox(src, alt, t, p);
  });

  // Close handlers
  closeBtn?.addEventListener('click', closeLightbox);
  backdrop?.addEventListener('click', closeLightbox);
  window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && root.classList.contains('open')) closeLightbox();
  });
})();
