<div id="notification" class="fixed top-4 right-4 z-50 transform translate-x-full transition-transform duration-300">
  <div id="notification-content" class="rounded-lg shadow-2xl p-4 min-w-[300px] max-w-md">
    <div class="flex items-start space-x-3">
      <div id="notification-icon" class="flex-shrink-0">
        <!-- Icon will be inserted here -->
      </div>
      <div class="flex-1">
        <p id="notification-message" class="font-semibold text-white"></p>
      </div>
      <button onclick="window.hideNotification()" class="flex-shrink-0 text-white/80 hover:text-white">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
</div>

@once
@push('scripts')
<script>
  window.showNotification = function(message, type = 'success') {
    const notification = document.getElementById('notification');
    const content = document.getElementById('notification-content');
    const icon = document.getElementById('notification-icon');
    const messageEl = document.getElementById('notification-message');

    messageEl.textContent = message;

    if (type === 'success') {
      content.className = 'rounded-lg shadow-2xl p-4 min-w-[300px] max-w-md bg-green-600';
      icon.innerHTML = `
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            `;
    } else {
      content.className = 'rounded-lg shadow-2xl p-4 min-w-[300px] max-w-md bg-red-600';
      icon.innerHTML = `
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            `;
    }

    notification.classList.remove('translate-x-full');
    notification.classList.add('translate-x-0');

    setTimeout(() => {
      window.hideNotification();
    }, 5000);
  };

  window.hideNotification = function() {
    const notification = document.getElementById('notification');
    notification.classList.add('translate-x-full');
    notification.classList.remove('translate-x-0');
  };
</script>
@endpush
@endonce