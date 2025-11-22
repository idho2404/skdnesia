// Fungsi untuk update icon
function updateThemeIcons() {
  const html = document.documentElement;
  const sunIcon = document.getElementById('sunIcon');
  const moonIcon = document.getElementById('moonIcon');
  
  if (!sunIcon || !moonIcon) return; // Guard jika tidak ada toggle button
  
  if (html.classList.contains('dark')) {
    sunIcon.classList.remove('hidden');
    sunIcon.classList.add('block');
    moonIcon.classList.add('hidden');
    moonIcon.classList.remove('block');
  } else {
    sunIcon.classList.add('hidden');
    sunIcon.classList.remove('block');
    moonIcon.classList.remove('hidden');
    moonIcon.classList.add('block');
  }
}

// Event listener untuk toggle button
document.addEventListener('DOMContentLoaded', function() {
  const themeToggle = document.getElementById('themeToggle');
  
  if (themeToggle) {
    themeToggle.addEventListener('click', function() {
      const html = document.documentElement;
      
      // Toggle dark class
      if (html.classList.contains('dark')) {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      } else {
        html.classList.add('dark');
        localStorage.setItem('theme', 'dark');
      }
      
      // Update icons
      updateThemeIcons();
    });
  }
  
  // Initialize icons on page load
  updateThemeIcons();
});

// Export untuk digunakan di script lain (opsional)
window.updateThemeIcons = updateThemeIcons;