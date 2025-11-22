<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - {{ config('app.name') }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <!-- Navbar -->
  <nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <h1 class="text-xl font-bold text-gray-800">{{ config('app.name') }}</h1>
        </div>

        <!-- Right side navbar -->
        <div class="flex items-center space-x-4">
          <span class="text-gray-700">{{ Auth::user()->name }}</span>

          <!-- Profile Dropdown -->
          <div class="relative" x-data="{ open: false }">
            <button
              @click="open = !open"
              class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
              {{ Auth::user()->initials }}
            </button>

            <!-- Dropdown menu -->
            <div
              x-show="open"
              @click.away="open = false"
              x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="transform opacity-0 scale-95"
              x-transition:enter-end="transform opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="transform opacity-100 scale-100"
              x-transition:leave-end="transform opacity-0 scale-95"
              class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-10"
              style="display: none;">

              <div class="px-4 py-2 border-b">
                <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                <p class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</p>
              </div>

              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Profile
              </a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Settings
              </a>

              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                  Logout
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Success Message -->
    @if(session('success'))
    <div class="mb-4 rounded-md bg-green-50 p-4">
      <div class="flex">
        <div class="ml-3">
          <p class="text-sm font-medium text-green-800">
            {{ session('success') }}
          </p>
        </div>
      </div>
    </div>
    @endif

    <!-- Dashboard Cards -->
    <div class="px-4 py-6 sm:px-0">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
                  <dd class="text-lg font-medium text-gray-900">{{ \App\Models\User::count() }}</dd>
                </dl>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Active Users</dt>
                  <dd class="text-lg font-medium text-gray-900">{{ \App\Models\User::where('is_active', true)->count() }}</dd>
                </dl>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
          <div class="p-5">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Last Login</dt>
                  <dd class="text-lg font-medium text-gray-900">{{ now()->format('H:i') }}</dd>
                </dl>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Welcome Message -->
      <div class="mt-8 bg-white overflow-hidden shadow rounded-lg">
        <div class="p-6">
          <h2 class="text-2xl font-bold text-gray-900 mb-4">Selamat Datang, {{ Auth::user()->name }}!</h2>
          <p class="text-gray-600">Ini adalah halaman dashboard Anda. Anda berhasil login ke sistem.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Alpine.js for dropdown -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>