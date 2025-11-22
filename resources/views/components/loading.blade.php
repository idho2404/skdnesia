<!-- Loading Overlay dengan Animasi Keren -->
<div id="loading-overlay" class="fixed inset-0 bg-gradient-to-br from-black/70 via-black/80 to-black/90 z-[9999] hidden items-center justify-center backdrop-blur-sm">
  <div class="relative">
    <!-- Outer Rotating Ring -->
    <div class="absolute inset-0 rounded-full border-4 border-transparent border-t-hijau-light dark:border-t-oren-light animate-spin"></div>

    <!-- Middle Pulsing Ring -->
    <div class="absolute inset-2 rounded-full border-4 border-transparent border-r-hijau-hover dark:border-r-oren-hover animate-spin" style="animation-duration: 1.5s; animation-direction: reverse;"></div>

    <!-- Inner Core -->
    <div class="relative w-20 h-20 flex items-center justify-center">
      <div class="w-12 h-12 bg-gradient-to-br from-hijau-light to-hijau-hover dark:from-oren-light dark:to-oren-hover rounded-full animate-pulse shadow-2xl shadow-hijau-light/50 dark:shadow-oren-light/50"></div>
    </div>

    <!-- Glowing Effect -->
    <div class="absolute inset-0 rounded-full bg-hijau-light/20 dark:bg-oren-light/20 blur-xl animate-pulse"></div>
  </div>

  <!-- Loading Text -->
  <div class="absolute mt-32">
    <p class="text-white font-semibold text-lg tracking-wider animate-pulse">Loading...</p>
  </div>
</div>

<style>
  @keyframes spin {
    to {
      transform: rotate(360deg);
    }
  }

  @keyframes pulse {

    0%,
    100% {
      opacity: 1;
      transform: scale(1);
    }

    50% {
      opacity: 0.7;
      transform: scale(1.05);
    }
  }
</style>