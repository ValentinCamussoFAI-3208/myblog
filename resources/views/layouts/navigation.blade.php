<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between mx-auto max-w-screen-xl">
      <div class="mb-3 md:my-3">
        <a href="{{ route('welcome') }}">
          <img src="{{ asset('svg/logo.svg') }}" class="h-10 w-10 mx-auto" alt="RTS logo" />
          <span class="self-center text-1xl font-semibold whitespace-nowrap dark:text-white">RTS Games Blog</span>
        </a>
      </div>
      <!-- Navigation Links -->
      <div class="sm:-my-px flex">
        <x-nav-link>
          <div class="flex w-full justify-between items-center">
            <div class="flex sm:items-center">
              <!-- En efecto este es el mismo que abajo, pero sino esta por alguna razon rompe el estilo del dropdown. Si saben la solucion comentenlo D:  -->
              <x-dropdown>
                <x-slot name="trigger">
                  <button class="hidden items-center py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300  transition ease-in-out duration-150">
                    {{ __('Categorias') }}
                    <svg class="ml-2 h-2 w-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                      <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                    </svg>
                  </button>
                </x-slot>

                <x-slot name="content">
                  @foreach($categories as $category)
                  <x-dropdown-link :href="route('category.show', $category)" class="whitespace-normal break-words">
                    {{ $category->title }}
                  </x-dropdown-link>
                  @endforeach
                </x-slot>

              </x-dropdown>

              <x-dropdown align="right" width="48">

                <x-slot name="trigger">
                  <button class="inline-flex items-center py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300  transition ease-in-out duration-150">
                    {{ __('Categorias') }}
                    <svg class="ml-2 h-2 w-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                      <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                    </svg>
                  </button>
                </x-slot>

                <x-slot name="content">
                  @foreach($categories as $category)
                  <x-dropdown-link :href="route('category.show', $category)" class="whitespace-normal break-words">
                    {{ $category->title }}
                  </x-dropdown-link>
                  @endforeach
                </x-slot>

              </x-dropdown>

              <button class="inline-flex items-center py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300  transition ease-in-out duration-150">
                <a href="{{ route('myPosts.index') }}" class="py-2 ml-6">Mis posts</a>
              </button>
            </div>
          </div>

        </x-nav-link>
      </div>

      @if (Route::has('login'))
      @auth
      @else
      <div class="flex sm:items-center">
        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
          Ingresá
        </a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white ml-4">
          Registrate
        </a>
      </div>
      @endif
      @endauth
      @endif

      <!-- Settings Dropdown -->
      @auth
      <div class="hidden sm:flex sm:items-center sm:ms-6">
        <x-dropdown align="right" width="48">
          <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
              <div>{{ Auth::user()->name }}</div>

              <div class="ms-1">
                <svg class="ml-2 h-2 w-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                  <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                </svg>
              </div>
            </button>
          </x-slot>

          <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')">
              {{ __('Perfil') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                {{ __('Cerrar Sesión') }}
              </x-dropdown-link>
            </form>
          </x-slot>
        </x-dropdown>
      </div>
      @endauth

      <!-- Hamburger -->
      <div class="-me-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

    <!-- Responsive Settings Options -->
    @auth
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
      <div class="px-4">
        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
      </div>

      <div class="mt-3 space-y-1">
        <x-responsive-nav-link :href="route('profile.edit')">
          {{ __('Profile') }}
        </x-responsive-nav-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-responsive-nav-link>
        </form>
      </div>
    </div>
    @endauth
  </div>
</nav>