// Live preview for image_path (string path under /public/images)
const input = document.getElementById('image_path');
const previewImg = document.getElementById('previewImg');

function updatePreview(path) {
  if (!previewImg) return;
  // Add/remove loaded class for nice fade-in
  previewImg.classList.remove('loaded');
  previewImg.src = path ? (window.Laravel?.assetBase || '/') + path : (window.Laravel?.assetBase || '/') + 'images/placeholder.jpg';
}

if (input && previewImg) {
  // mark as loaded when the image resolves
  previewImg.addEventListener('load', () => previewImg.classList.add('loaded'));
  previewImg.addEventListener('error', () => {
    previewImg.classList.add('loaded');
  });
  input.addEventListener('input', (e) => updatePreview(e.target.value.trim()));
}

// Small UX nicety: format price to 2 decimals on blur
const price = document.getElementById('price');
if (price) {
  price.addEventListener('blur', () => {
    const v = price.value;
    if (v && !isNaN(v)) price.value = Number(v).toFixed(2);
  });
}
