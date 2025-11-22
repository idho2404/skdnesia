<x-layouts.app>
  <x-slot:title>Authentication - SKDnesia</x-slot:title>
  <x-slot:bodyClass>min-h-screen flex items-center justify-center relative overflow-hidden bg-gradient-to-br from-gray-50 via-gray-100 to-gray-200 dark:from-gray-950 dark:via-gray-900 dark:to-black</x-slot:bodyClass>

  <!-- Animated Background Shapes -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-20 left-10 w-72 h-72 bg-hijau-light/20 dark:bg-oren-light/20 rounded-full blur-3xl animate-blob"></div>
    <div class="absolute top-40 right-20 w-96 h-96 bg-hijau-hover/20 dark:bg-oren-hover/20 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-32 left-1/2 w-80 h-80 bg-hijau-light/30 dark:bg-oren-light/30 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
  </div>

  <!-- Main Auth Container -->
  <div class="relative w-full max-w-6xl mx-4 my-8 z-10">

    <!-- 3D Flip Container -->
    <div class="perspective-1000">
      <div id="authContainer" class="relative w-full transition-transform duration-700 ease-in-out preserve-3d">

        <!-- ==================== LOGIN CARD (FRONT) ==================== -->
        <div class="flip-face flip-front backface-hidden">
          <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden backdrop-blur-xl">
            <div class="grid md:grid-cols-2 min-h-[650px]">

              <!-- LEFT SIDE: Login Form -->
              <div class="flex flex-col justify-center px-8 md:px-12 py-12 order-2 md:order-1">

                <!-- Header -->
                <div class="mb-8 animate-fade-in-up">
                  <div class="inline-flex items-center justify-center w-16 h-16 mb-6 rounded-2xl bg-gradient-to-br from-hijau-light to-hijau-hover dark:from-oren-light dark:to-oren-hover shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                  </div>
                  <h1 class="form-title mb-3">Welcome Back</h1>
                  <p class="text-gray-600 dark:text-gray-400">Sign in to continue your journey</p>
                </div>

                <!-- Error Messages -->
                @if($errors->any() && !old('name'))
                <div class="mb-6 animate-shake">
                  <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                    <div class="text-sm text-red-600 dark:text-red-400">
                      @foreach($errors->all() as $err)
                      {{ $err }}<br>
                      @endforeach
                    </div>
                  </div>
                </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login.process') }}" method="POST" class="space-y-5">
                  @csrf

                  <!-- Email Input -->
                  <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                      <svg class="w-5 h-5 text-gray-400 group-focus-within:text-hijau-light dark:group-focus-within:text-oren-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                      </svg>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" class="input-auth pl-12" placeholder="Email Address" required>
                  </div>

                  <!-- Password Input -->
                  <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                      <svg class="w-5 h-5 text-gray-400 group-focus-within:text-hijau-light dark:group-focus-within:text-oren-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                      </svg>
                    </div>
                    <input type="password" name="password" class="input-auth pl-12" placeholder="Password" required>
                  </div>

                  <!-- Remember & Forgot -->
                  <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center cursor-pointer group">
                      <input type="checkbox" name="remember" class="w-4 h-4 border-2 border-gray-300 dark:border-gray-600 rounded focus:ring-2 focus:ring-hijau-light dark:focus:ring-oren-light">
                      <span class="ml-2 text-gray-600 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-gray-200">Remember me</span>
                    </label>
                    <a href="#" class="text-hijau-light dark:text-oren-light hover:underline">Forgot password?</a>
                  </div>

                  <!-- Submit Button -->
                  <button type="submit" class="btn-auth group inline-flex items-center justify-center">
                    <span>Sign In</span>
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                  </button>

                  <!-- Toggle to Register -->
                  <div class="text-center pt-4">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                      Don't have an account?
                      <button type="button" onclick="flipCard()" class="text-hijau-light dark:text-oren-light font-semibold hover:underline ml-1">
                        Sign up here
                      </button>
                    </p>
                  </div>
                </form>
              </div>

              <!-- RIGHT SIDE: Illustration -->
              <div class="hidden md:flex relative overflow-hidden bg-gradient-to-br from-hijau-light via-hijau-hover to-emerald-600 dark:from-oren-light dark:via-oren-hover dark:to-orange-600 order-1 md:order-2">

                <!-- Animated Background Shapes -->
                <div class="absolute w-72 h-72 bg-white/10 rounded-full blur-3xl -top-20 -right-20 animate-pulse"></div>
                <div class="absolute w-96 h-96 bg-white/5 rounded-full blur-2xl -bottom-32 -left-32 animate-float"></div>
                <div class="absolute w-48 h-48 bg-white/10 rounded-full blur-xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-ping-slow"></div>

                <!-- Content -->
                <div class="relative z-10 flex flex-col items-center justify-center text-center text-white p-12 w-full">
                  <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-8 animate-bounce-slow shadow-2xl">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                  </div>
                  <h2 class="text-5xl font-bold mb-6">New Here?</h2>
                  <p class="text-lg mb-10 opacity-95 max-w-md leading-relaxed">
                    Join our community today and unlock access to exclusive features and content.
                  </p>
                  <button type="button" onclick="flipCard()" class="btn-overlay group inline-flex items-center">
                    <span>Create Account</span>
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                  </button>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- ==================== REGISTER CARD (BACK) ==================== -->
        <div class="flip-face flip-back absolute inset-0 backface-hidden rotate-y-180">
          <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden backdrop-blur-xl">
            <div class="grid md:grid-cols-2 min-h-[650px]">

              <!-- LEFT SIDE: Illustration -->
              <div class="hidden md:flex relative overflow-hidden bg-gradient-to-br from-hijau-light via-hijau-hover to-emerald-600 dark:from-oren-light dark:via-oren-hover dark:to-orange-600 order-1">

                <!-- Animated Background Shapes -->
                <div class="absolute w-72 h-72 bg-white/10 rounded-full blur-3xl -top-20 -left-20 animate-pulse"></div>
                <div class="absolute w-96 h-96 bg-white/5 rounded-full blur-2xl -bottom-32 -right-32 animate-float"></div>

                <!-- Content -->
                <div class="relative z-10 flex flex-col items-center justify-center text-center text-white p-12 w-full">
                  <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-8 animate-bounce-slow shadow-2xl">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                  </div>
                  <h2 class="text-5xl font-bold mb-6">Welcome!</h2>
                  <p class="text-lg mb-10 opacity-95 max-w-md leading-relaxed">
                    Already have an account? Sign in to access your dashboard and continue where you left off.
                  </p>
                  <button type="button" onclick="flipCard()" class="btn-overlay group inline-flex items-center">
                    <span>Sign In</span>
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                  </button>
                </div>
              </div>

              <!-- RIGHT SIDE: Register Form -->
              <div class="flex flex-col justify-center px-8 md:px-12 py-12 order-2">

                <!-- Header -->
                <div class="mb-8 animate-fade-in-up">
                  <div class="inline-flex items-center justify-center w-16 h-16 mb-6 rounded-2xl bg-gradient-to-br from-hijau-light to-hijau-hover dark:from-oren-light dark:to-oren-hover shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                  </div>
                  <h1 class="form-title mb-3">Create Account</h1>
                  <p class="text-gray-600 dark:text-gray-400">Join us and start your adventure</p>
                </div>

                <!-- Error Messages -->
                @if($errors->any() && old('name'))
                <div class="mb-6 animate-shake">
                  <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                    <div class="text-sm text-red-600 dark:text-red-400">
                      @foreach($errors->all() as $err)
                      {{ $err }}<br>
                      @endforeach
                    </div>
                  </div>
                </div>
                @endif

                <!-- Register Form -->
                <form action="{{ route('register.process') }}" method="POST" class="space-y-5">
                  @csrf

                  <!-- Name Input -->
                  <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                      <svg class="w-5 h-5 text-gray-400 group-focus-within:text-hijau-light dark:group-focus-within:text-oren-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                    </div>
                    <input type="text" name="name" value="{{ old('name') }}" class="input-auth pl-12" placeholder="Full Name" required>
                  </div>

                  <!-- Email Input -->
                  <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                      <svg class="w-5 h-5 text-gray-400 group-focus-within:text-hijau-light dark:group-focus-within:text-oren-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                      </svg>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" class="input-auth pl-12" placeholder="Email Address" required>
                  </div>

                  <!-- Password Input -->
                  <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                      <svg class="w-5 h-5 text-gray-400 group-focus-within:text-hijau-light dark:group-focus-within:text-oren-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                      </svg>
                    </div>
                    <input type="password" name="password" class="input-auth pl-12" placeholder="Password" required>
                  </div>

                  <!-- Confirm Password Input -->
                  <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                      <svg class="w-5 h-5 text-gray-400 group-focus-within:text-hijau-light dark:group-focus-within:text-oren-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                      </svg>
                    </div>
                    <input type="password" name="password_confirmation" class="input-auth pl-12" placeholder="Confirm Password" required>
                  </div>

                  <!-- Submit Button -->
                  <button type="submit" class="btn-auth group inline-flex items-center justify-center">
                    <span>Sign Up</span>
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                  </button>

                  <!-- Toggle to Login -->
                  <div class="text-center pt-4">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                      Already have an account?
                      <button type="button" onclick="flipCard()" class="text-hijau-light dark:text-oren-light font-semibold hover:underline ml-1">
                        Sign in here
                      </button>
                    </p>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  @push('scripts')
  <script>
    let isFlipped = false;

    function flipCard() {
      const container = document.getElementById('authContainer');
      isFlipped = !isFlipped;
      container.style.transform = isFlipped ? 'rotateY(180deg)' : 'rotateY(0deg)';
    }
  </script>

  @if($errors->any() && old('name'))
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      setTimeout(() => flipCard(), 200);
    });
  </script>
  @endif
  @endpush

</x-layouts.app>