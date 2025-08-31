<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CleanPro - Add Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#00A650",
              "cleaning-primary": "#00A650",
              "cleaning-dark": "#007A3D",
              "dashboard-bg": "#F8F9FA",
              "sidebar-bg": "#212529",
              "sidebar-text": "#E9ECEF",
              "card-bg": "#FFFFFF",
              "card-border-light": "#E9ECEF",
              "text-dark-high": "#343A40",
              "text-dark-medium": "#495057",
              "text-light-medium": "#ADB5BD",
              "text-light-high": "#DEE2E6",
            },
            spacing: {
              "topbar-height": "48px",
              "navbar-height": "80px",
            },
            fontFamily: {
              sans: ["Open Sans", "sans-serif"],
              heading: ["Montserrat", "sans-serif"],
            },
            boxShadow: {
              "custom-xs": "0 0 0 1px rgba(0, 0, 0, 0.05)",
              "custom-sm":
                "0 1px 3px 0 rgba(0, 0, 0, 0.08), 0 1px 2px 0 rgba(0, 0, 0, 0.03)",
              "custom-md":
                "0 4px 6px -1px rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.07)",
              "custom-lg":
                "0 10px 15px -3px rgba(0, 0, 0, 0.15), 0 4px 6px -2px rgba(0, 0, 0, 0.1)",
              "custom-xl":
                "0 20px 25px -5px rgba(0, 0, 0, 0.18), 0 10px 10px -5px rgba(0, 0, 0, 0.04)",
              "icon-glow": "0 0 15px rgba(0, 166, 80, 0.4)",
              "icon-blur":
                "0 1px 3px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.02)",
            },
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
        <header
          class="w-full bg-card-bg p-4 flex items-center justify-between shadow-custom-sm dashboard-topbar"
        >
          <div class="flex items-center space-x-4">
            <button
              id="sidebar-toggle-btn"
              class="md:hidden text-gray-600 hover:text-text-dark-high focus:outline-none"
            >
              <i class="fas fa-bars text-xl"></i>
            </button>
            <h1 class="text-2xl font-bold font-heading text-text-dark-high">
              Add New Service
            </h1>
          </div>
          <div class="flex items-center space-x-4">
            <span
              id="live-datetime"
              class="text-text-dark-medium text-sm font-medium hidden sm:block"
            ></span>
            <a
              href="#"
              class="text-text-dark-medium hover:text-primary transition-colors"
            >
              <i class="fas fa-bell text-xl"></i>
            </a>
            <div class="flex items-center space-x-2">
              <img
                src="https://randomuser.me/api/portraits/men/1.jpg"
                alt="Admin Avatar"
                class="w-10 h-10 rounded-full object-cover border-2 border-primary/50"
              />
              <span
                class="text-sm font-medium hidden sm:block text-text-dark-medium"
                >Admin Name</span
              >
            </div>
          </div>
        </header>

        <main
          class="flex-1 p-6 bg-dashboard-bg custom-scrollbar overflow-y-auto"
        >
          <div
            class="max-w-8xl mx-auto bg-white p-8 rounded-xl shadow-custom-md border border-card-border-light"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <form action="logics.php" method="POST" class="space-y-6" enctype="multipart/form-data">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label
                    for="title"
                    class="block text-sm font-medium text-text-dark-high mb-1"
                    >Service Title</label
                  >
                  <input
                    type="text"
                    name="service_title"
                    id="title"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                    placeholder="e.g., Deep Kitchen Cleaning"
                    required
                  />
                </div>

              

                <div>
                  <label
                    for="price"
                    class="block text-sm font-medium text-text-dark-high mb-1"
                    >Category</label
                  >
                  <input
                    type="text"
                    name="service_category"
                    id="price"
                    step="0.01"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                    placeholder="e.g., Residential,Specialized,Commercial"
                    required
                  />
                </div>
              </div>

              <div>
                <label
                  for="picture"
                  class="block text-sm font-medium text-text-dark-high mb-1"
                  >Service Picture</label
                >
                <div
                  class="relative file-input-box min-h-[150px] w-full rounded-md"
                  style="border: 2px dotted #00A650 !important;"
                >
                  <div
                    class="flex flex-col items-center justify-center h-full w-full"
                  >
                    <i class="fas fa-cloud-upload-alt text-4xl text-primary mb-2"></i>
                    <p class="text-base font-semibold text-gray-700">
                      Drag & Drop or
                      <span class="text-primary hover:underline cursor-pointer"
                        >Browse File</span
                      >
                    </p>
                    <p class="mt-2 text-xs text-gray-600">
                      PNG, JPG, GIF up to 10MB.
                    </p>
                  </div>
                  <input
                    type="file"
                    name="service_image"
                    id="picture"
                    accept="image/*"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                  />
                </div>
              </div>

              <div>
                <label
                  for="description"
                  class="block text-sm font-medium text-text-dark-high mb-1"
                  >Service Description</label
                >
                <textarea
                  id="description"
                  name="service_description"
                  rows="5"
                  class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                  placeholder="Provide a detailed description of the service..."
                  required
                ></textarea>
              </div>

              <div class="pt-4">
                <button
                  type="submit" name="service_add"
                  class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-custom-md rounded-md font-semibold text-white bg-primary hover:bg-cleaning-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-300 transform hover:scale-105"
                >
                  <i class="fas fa-plus-circle mr-2"></i> Add Service
                </button>
              </div>
            </form>
          </div>
        </main>
      </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="main.js"></script>
  </body>
</html>