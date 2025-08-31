  <aside
        id="sidebar"
        class="fixed inset-y-0 left-0 w-64 bg-sidebar-bg text-sidebar-text flex-col z-[1000] 
               mobile-closed md:flex md:translate-x-0 
               transition-transform duration-300 ease-in-out 
               custom-scrollbar overflow-y-auto shadow-custom-lg md:shadow-none"
      >
        <div class="p-6 border-b border-gray-700 flex items-center justify-between">
          <h2 class="text-3xl font-bold sidebar-logo font-heading">CleanPro</h2>
          <button id="sidebar-close-btn" class="md:hidden text-text-light-medium hover:text-white focus:outline-none">
            <i class="fas fa-times text-2xl"></i>
          </button>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2">
          <a
            href="index.php"
            class="flex items-center space-x-3 px-4 py-2 rounded-lg bg-primary text-white transition-colors duration-200 shadow-custom-sm hover:shadow-custom-md"
          >
            <i class="fas fa-tachometer-alt text-lg"></i>
            <span class="font-medium">Dashboard Overview</span>
          </a>
          <a
            href="#"
            class="flex items-center space-x-3 px-4 py-2 rounded-lg text-sidebar-text hover:bg-primary/20 hover:text-white transition-colors duration-200"
          >
            <i class="fas fa-calendar-check text-lg"></i>
            <span class="font-medium">Bookings</span>
          </a>
          <a
            href="#"
            class="flex items-center space-x-3 px-4 py-2 rounded-lg text-sidebar-text hover:bg-primary/20 hover:text-white transition-colors duration-200"
          >
            <i class="fas fa-users text-lg"></i>
            <span class="font-medium">Clients</span>
          </a>
          <a
            href="#"
            class="flex items-center space-x-3 px-4 py-2 rounded-lg text-sidebar-text hover:bg-primary/20 hover:text-white transition-colors duration-200"
          >
            <i class="fas fa-user-friends text-lg"></i>
            <span class="font-medium">Cleaners</span>
          </a>
          <a
            href="services.php"
            class="flex items-center space-x-3 px-4 py-2 rounded-lg text-sidebar-text hover:bg-primary/20 hover:text-white transition-colors duration-200"
          >
            <i class="fas fa-hand-sparkles text-lg"></i>
            <span class="font-medium">Services</span>
          </a>
          <a
            href="#"
            class="flex items-center space-x-3 px-4 py-2 rounded-lg text-sidebar-text hover:bg-primary/20 hover:text-white transition-colors duration-200"
          >
            <i class="fas fa-chart-line text-lg"></i>
            <span class="font-medium">Reports</span>
          </a>
          <a
            href="#"
            class="flex items-center space-x-3 px-4 py-2 rounded-lg text-sidebar-text hover:bg-primary/20 hover:text-white transition-colors duration-200"
          >
            <i class="fas fa-cog text-lg"></i>
            <span class="font-medium">Settings</span>
          </a>
          <a
            href="logout.php"
            class="flex items-center space-x-3 px-4 py-2 rounded-lg text-red-400 hover:bg-red-500/20 hover:text-red-300 transition-colors duration-200"
          >
            <i class="fas fa-sign-out-alt text-lg"></i>
            <span class="font-medium">Logout</span>
          </a>
        </nav>
      </aside>