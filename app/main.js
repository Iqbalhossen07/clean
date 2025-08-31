      AOS.init({
        duration: 1000,
        once: true,
      });

      // Sidebar toggle for mobile AND Overlay functionality
      document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggleBtn = document.getElementById('sidebar-toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const sidebarCloseBtn = document.getElementById('sidebar-close-btn');
        const liveDatetimeElement = document.getElementById('live-datetime');
        const bodyElement = document.body;

        // Create a basic overlay for the mobile sidebar
        const sidebarOverlay = document.createElement('div');
        sidebarOverlay.id = 'sidebar-overlay';
        sidebarOverlay.classList.add('fixed', 'inset-0', 'bg-black', 'bg-opacity-50', 'z-[980]', 'hidden', 'md:hidden');
        document.body.appendChild(sidebarOverlay);


        // Function to update live date and time
        function updateLiveDatetime() {
          const now = new Date();
          const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true
          };
          const localTime = now.toLocaleString('en-US', { timeZone: 'Asia/Dhaka', ...options });
          if (liveDatetimeElement) {
            liveDatetimeElement.textContent = localTime;
          }
        }

        // Update time every second
        setInterval(updateLiveDatetime, 1000);
        updateLiveDatetime();

        // Toggle sidebar and overlay
        const toggleSidebar = () => {
          const isOpen = sidebar.classList.contains('mobile-open');

          if (isOpen) {
            sidebar.classList.remove('mobile-open');
            sidebar.classList.add('mobile-closed');
            sidebarOverlay.classList.add('hidden');
            bodyElement.classList.remove('body-no-scroll');
          } else {
            sidebar.classList.remove('mobile-closed');
            sidebar.classList.add('mobile-open');
            sidebarOverlay.classList.remove('hidden');
            bodyElement.classList.add('body-no-scroll');
          }
        };

        if (sidebarToggleBtn) {
          sidebarToggleBtn.addEventListener('click', toggleSidebar);
        }

        if (sidebarCloseBtn) {
          sidebarCloseBtn.addEventListener('click', toggleSidebar);
        }

        if (sidebarOverlay) {
          sidebarOverlay.addEventListener('click', toggleSidebar);
        }

        // Handle resize to fix sidebar state
        const handleResize = () => {
            if (window.innerWidth >= 768) { // md breakpoint
                sidebar.classList.remove('mobile-hide', 'mobile-closed');
                sidebar.classList.add('mobile-open', 'md:flex', 'md:translate-x-0');
                sidebarOverlay.classList.add('hidden');
                bodyElement.classList.remove('body-no-scroll');
            } else {
                if (!sidebar.classList.contains('mobile-open')) {
                    sidebar.classList.add('mobile-closed');
                }
                sidebar.classList.remove('md:flex', 'md:translate-x-0');
            }
        };

        window.addEventListener('resize', handleResize);
        handleResize();
      });
