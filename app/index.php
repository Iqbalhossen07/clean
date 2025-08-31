<?php include('db.php');
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CleanPro - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#00A650",
              "cleaning-primary": "#00A650",
              "cleaning-dark": "#007A3D",
              "dashboard-bg": "#F8F9FA", // Very light background, almost white
              "sidebar-bg": "#212529", // Deeper, slightly richer dark grey for sidebar
              "sidebar-text": "#E9ECEF", // Slightly off-white for sidebar text
              "card-bg": "#FFFFFF", // Pure white card background
              "card-border-light": "#E9ECEF", // Very subtle border for cards
              "text-dark-high": "#343A40", // Darker text for headings/important info
              "text-dark-medium": "#495057", // Medium dark text for paragraphs
              "text-light-medium": "#ADB5BD", // Medium light text for subtle info
              "text-light-high": "#DEE2E6", // Light text for dark backgrounds
            },
            spacing: {
              "topbar-height": "48px",
              "navbar-height": "80px",
            },
            fontFamily: {
              sans: ['Open Sans', 'sans-serif'],
              heading: ['Montserrat', 'sans-serif'],
            },
            boxShadow: {
                // Refined custom shadows for a premium, less blurry look
                'custom-xs': '0 0 0 1px rgba(0, 0, 0, 0.05)',
                'custom-sm': '0 1px 3px 0 rgba(0, 0, 0, 0.08), 0 1px 2px 0 rgba(0, 0, 0, 0.03)',
                'custom-md': '0 4px 6px -1px rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.07)',
                'custom-lg': '0 10px 15px -3px rgba(0, 0, 0, 0.15), 0 4px 6px -2px rgba(0, 0, 0, 0.1)',
                'custom-xl': '0 20px 25px -5px rgba(0, 0, 0, 0.18), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
            }
          },
        },
      };
    </script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

  <link rel="stylesheet" href="style.css">
  </head>
  <body class="bg-dashboard-bg text-text-dark-medium font-sans h-screen">
    <div class="flex h-screen bg-dashboard-bg">
     <?php include('side.php') ?>

      <div class="flex-1 flex flex-col md:ml-64 min-w-0">
        <header class="w-full bg-card-bg p-4 flex items-center justify-between shadow-custom-sm dashboard-topbar">
          <div class="flex items-center space-x-4">
            <button id="sidebar-toggle-btn" class="md:hidden text-gray-600 hover:text-text-dark-high focus:outline-none">
              <i class="fas fa-bars text-xl"></i>
            </button>
            <h1 class="text-2xl font-bold font-heading text-text-dark-high">Welcome, Admin!</h1>
          </div>
          <div class="flex items-center space-x-4">
            <span id="live-datetime" class="text-text-dark-medium text-sm font-medium hidden sm:block"></span>
            <a href="#" class="text-text-dark-medium hover:text-primary transition-colors">
              <i class="fas fa-bell text-xl"></i>
            </a>
            <div class="flex items-center space-x-2">
              <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Admin Avatar" class="w-10 h-10 rounded-full object-cover border-2 border-primary/50">
              <span class="text-sm font-medium hidden sm:block text-text-dark-medium">Admin Name</span>
            </div>
          </div>
        </header>

        <main class="flex-1 p-6 bg-dashboard-bg custom-scrollbar overflow-y-auto">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-8">
            <div class="bg-card-bg p-6 rounded-xl shadow-custom-sm border border-card-border-light flex items-center space-x-4 transition-all duration-300 hover:shadow-custom-md" data-aos="fade-up" data-aos-delay="100">
              <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-hourglass-half text-primary text-3xl"></i>
              </div>
              <div>
                <p class="text-text-dark-medium text-sm">Pending Bookings</p>
                <h3 class="text-2xl font-bold text-text-dark-high font-heading">5</h3>
              </div>
            </div>
            <div class="bg-card-bg p-6 rounded-xl shadow-custom-sm border border-card-border-light flex items-center space-x-4 transition-all duration-300 hover:shadow-custom-md" data-aos="fade-up" data-aos-delay="200">
              <div class="w-16 h-16 bg-blue-500/10 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-users text-blue-500 text-3xl"></i>
              </div>
              <div>
                <p class="text-text-dark-medium text-sm">Total Clients</p>
                <h3 class="text-2xl font-bold text-text-dark-high font-heading">150</h3>
              </div>
            </div>
            <div class="bg-card-bg p-6 rounded-xl shadow-custom-sm border border-card-border-light flex items-center space-x-4 transition-all duration-300 hover:shadow-custom-md" data-aos="fade-up" data-aos-delay="300">
              <div class="w-16 h-16 bg-green-500/10 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-user-shield text-green-500 text-3xl"></i>
              </div>
              <div>
                <p class="text-text-dark-medium text-sm">Active Cleaners</p>
                <h3 class="text-2xl font-bold text-text-dark-high font-heading">8</h3>
              </div>
            </div>
            <div class="bg-card-bg p-6 rounded-xl shadow-custom-sm border border-card-border-light flex items-center space-x-4 transition-all duration-300 hover:shadow-custom-md" data-aos="fade-up" data-aos-delay="400">
              <div class="w-16 h-16 bg-purple-500/10 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-dollar-sign text-purple-500 text-3xl"></i>
              </div>
              <div>
                <p class="text-text-dark-medium text-sm">Revenue This Month</p>
                <h3 class="text-2xl font-bold text-text-dark-high font-heading">£ 12,500</h3>
              </div>
            </div>
            <div class="bg-card-bg p-6 rounded-xl shadow-custom-sm border border-card-border-light flex items-center space-x-4 transition-all duration-300 hover:shadow-custom-md" data-aos="fade-up" data-aos-delay="500">
              <div class="w-16 h-16 bg-yellow-500/10 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-check-double text-yellow-500 text-3xl"></i>
              </div>
              <div>
                <p class="text-text-dark-medium text-sm">Completed Jobs</p>
                <h3 class="text-2xl font-bold text-text-dark-high font-heading">75</h3>
              </div>
            </div>
          </div>

          <div class="bg-card-bg p-6 rounded-xl shadow-custom-sm border border-card-border-light mb-8 transition-all duration-300 hover:shadow-custom-md" data-aos="fade-up" data-aos-delay="600">
            <h3 class="text-xl font-bold text-text-dark-high mb-6 font-heading">Reports Overview</h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 shadow-custom-xs">
                    <h4 class="text-lg font-semibold text-text-dark-high mb-3 font-heading">Monthly Revenue Trend</h4>
                    <div class="h-48 flex items-end justify-around p-2 space-x-1">
                        <div class="w-8 bg-primary/80 rounded-t-sm h-1/2" style="height: 50%;"></div>
                        <div class="w-8 bg-primary/80 rounded-t-sm h-3/4" style="height: 75%;"></div>
                        <div class="w-8 bg-primary/80 rounded-t-sm h-2/3" style="height: 66%;"></div>
                        <div class="w-8 bg-primary/80 rounded-t-sm h-4/5" style="height: 80%;"></div>
                        <div class="w-8 bg-primary/80 rounded-t-sm h-full" style="height: 100%;"></div>
                        <div class="w-8 bg-primary/80 rounded-t-sm h-3/5" style="height: 60%;"></div>
                        <div class="w-8 bg-primary/80 rounded-t-sm h-1/2" style="height: 50%;"></div>
                    </div>
                    <div class="text-center text-sm text-text-dark-medium mt-2">Revenue Trend Over Last 7 Months</div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 shadow-custom-xs flex flex-col items-center justify-center">
                    <h4 class="text-lg font-semibold text-text-dark-high mb-3 font-heading">Service Usage Breakdown</h4>
                    <div class="relative w-36 h-36 rounded-full flex items-center justify-center">
                        <div class="absolute inset-0 rounded-full bg-blue-500/80" style="clip: rect(0, 90px, 90px, 0); transform: rotate(0deg);"></div>
                        <div class="absolute inset-0 rounded-full bg-red-500/80" style="clip: rect(0, 90px, 90px, 0); transform: rotate(100deg);"></div>
                        <div class="absolute inset-0 rounded-full bg-yellow-500/80" style="clip: rect(0, 90px, 90px, 0); transform: rotate(200deg);"></div>
                        <div class="absolute inset-0 rounded-full bg-green-500/80" style="clip: rect(0, 90px, 90px, 0); transform: rotate(280deg);"></div>
                        <div class="absolute w-20 h-20 bg-card-bg rounded-full z-10"></div> </div>
                    <div class="text-center text-sm text-text-dark-medium mt-4">
                        <div class="flex items-center justify-center gap-x-4">
                            <span class="flex items-center"><span class="w-3 h-3 rounded-full bg-blue-500 mr-1"></span>Deep Clean (40%)</span>
                            <span class="flex items-center"><span class="w-3 h-3 rounded-full bg-red-500 mr-1"></span>Commercial (30%)</span>
                        </div>
                        <div class="flex items-center justify-center gap-x-4">
                            <span class="flex items-center"><span class="w-3 h-3 rounded-full bg-yellow-500 mr-1"></span>Windows (15%)</span>
                            <span class="flex items-center"><span class="w-3 h-3 rounded-full bg-green-500 mr-1"></span>Carpet (15%)</span>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 shadow-custom-xs">
                        <p class="text-sm text-text-dark-medium">Average Booking Value</p>
                        <h4 class="text-xl font-bold text-text-dark-high font-heading">£ 180</h4>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 shadow-custom-xs">
                        <p class="text-sm text-text-dark-medium">Client Retention Rate</p>
                        <h4 class="text-xl font-bold text-text-dark-high font-heading">92%</h4>
                    </div>
                </div>
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="700">
            <button class="bg-primary hover:bg-cleaning-dark text-white p-4 rounded-xl shadow-custom-md flex items-center justify-center space-x-3 transition-colors duration-300 transform hover:scale-105">
              <i class="fas fa-calendar-plus text-2xl"></i>
              <span class="text-lg font-semibold">Add New Booking</span>
            </button>
            <button class="bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-xl shadow-custom-md flex items-center justify-center space-x-3 transition-colors duration-300 transform hover:scale-105">
              <i class="fas fa-users-cog text-2xl"></i>
              <span class="text-lg font-semibold">Manage Cleaners</span>
            </button>
            <button class="bg-purple-500 hover:bg-purple-600 text-white p-4 rounded-xl shadow-custom-md flex items-center justify-center space-x-3 transition-colors duration-300 transform hover:scale-105">
              <i class="fas fa-dollar-sign text-2xl"></i>
              <span class="text-lg font-semibold">View Revenue</span>
            </button>
          </div>
        </main>
      </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="main.js"></script>
  </body>
</html>