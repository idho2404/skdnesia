<!-- resources/views/components/theme-toggle.blade.php -->

<button
  id="theme-toggle"
  type="button"
  class="fixed bottom-6 right-6 z-50 p-4 rounded-full bg-white dark:bg-gray-800 shadow-xl border-2 border-gray-300 dark:border-gray-600 hover:border-hijau-gelap dark:hover:border-oren-cerah hover:shadow-lg transition-all duration-300 transform hover:scale-110 group"
  aria-label="Toggle theme">

  <!-- Sun Icon (Light Mode - visible when DARK mode is active) -->
  <svg
    id="theme-toggle-light-icon"
    class="w-6 h-6 text-oren-cerah hidden group-hover:rotate-180 transition-transform duration-500"
    fill="currentColor"
    viewBox="0 0 20 20">
    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
  </svg>

  <!-- Moon Icon (Dark Mode - visible when LIGHT mode is active) -->
  <svg
    id="theme-toggle-dark-icon"
    class="w-6 h-6 text-hijau-gelap hidden group-hover:rotate-12 transition-transform duration-500"
    fill="currentColor"
    viewBox="0 0 20 20">
    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
  </svg>

  <!-- Ripple Effect on Click -->
  <span class="absolute inset-0 rounded-full bg-hijau-gelap dark:bg-oren-cerah opacity-0 group-active:opacity-30 group-active:scale-150 transition-all duration-300"></span>
</button>

@once
@push('scripts')
<script>
  // Theme Toggle Functionality
  (function() {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const htmlElement = document.documentElement;

    // Get saved theme from localStorage or system preference
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const currentTheme = savedTheme || (prefersDark ? 'dark' : 'light');

    // Apply theme on page load
    function applyTheme(theme) {
      if (theme === 'dark') {
        htmlElement.classList.add('dark');
        // Show SUN icon when in DARK mode (click to go LIGHT)
        themeToggleLightIcon.classList.remove('hidden');
        themeToggleDarkIcon.classList.add('hidden');
      } else {
        htmlElement.classList.remove('dark');
        // Show MOON icon when in LIGHT mode (click to go DARK)
        themeToggleLightIcon.classList.add('hidden');
        themeToggleDarkIcon.classList.remove('hidden');
      }
    }

    // Initialize theme
    applyTheme(currentTheme);

    // Toggle theme on button click
    themeToggleBtn.addEventListener('click', function() {
      const isDark = htmlElement.classList.contains('dark');
      const newTheme = isDark ? 'light' : 'dark';

      // Add animation class
      themeToggleBtn.classList.add('animate-bounce');

      // Apply new theme
      applyTheme(newTheme);

      // Save to localStorage
      localStorage.setItem('theme', newTheme);

      // Remove animation after it completes
      setTimeout(() => {
        themeToggleBtn.classList.remove('animate-bounce');
      }, 500);

      // Optional: Show notification
      if (window.showNotification) {
        window.showNotification(
          `Switched to ${newTheme === 'dark' ? 'Dark' : 'Light'} Mode`,
          'success'
        );
      }
    });

    // Keyboard shortcut: Ctrl/Cmd + Shift + L to toggle theme
    document.addEventListener('keydown', function(e) {
      if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key.toLowerCase() === 'l') {
        e.preventDefault();
        themeToggleBtn.click();
      }
    });

    // Optional: Auto-detect system theme preference changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
      if (!localStorage.getItem('theme')) {
        const newTheme = e.matches ? 'dark' : 'light';
        applyTheme(newTheme);
      }
    });
  })();
</script>
@endpush
@endonce