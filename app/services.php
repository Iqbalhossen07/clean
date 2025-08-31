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
  <title>CleanPro - Admin Services</title>
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
            "custom-sm": "0 1px 3px 0 rgba(0, 0, 0, 0.08), 0 1px 2px 0 rgba(0, 0, 0, 0.03)",
            "custom-md": "0 4px 6px -1px rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.07)",
            "custom-lg": "0 10px 15px -3px rgba(0, 0, 0, 0.15), 0 4px 6px -2px rgba(0, 0, 0, 0.1)",
            "custom-xl": "0 20px 25px -5px rgba(0, 0, 0, 0.18), 0 10px 10px -5px rgba(0, 0, 0, 0.04)",
            "icon-glow": "0 0 15px rgba(0, 166, 80, 0.4)",
            "icon-blur": "0 1px 3px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.02)",
          },
        },
      },
    };
  </script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="style.css">

</head>

<body class="bg-dashboard-bg text-text-dark-medium font-sans h-screen">
  <div class="flex h-screen bg-dashboard-bg">
    <?php include('side.php') ?>


    <div class="flex-1 flex flex-col md:ml-64 min-w-0">
      <header
        class="w-full bg-card-bg p-4 flex items-center justify-between shadow-custom-sm dashboard-topbar">
        <div class="flex items-center space-x-4">
          <button
            id="sidebar-toggle-btn"
            class="md:hidden text-gray-600 hover:text-text-dark-high focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
          </button>
          <h1 class="text-2xl font-bold font-heading text-text-dark-high">
            Manage Services
          </h1>
        </div>
        <div class="flex items-center space-x-4">
          <span
            id="live-datetime"
            class="text-text-dark-medium text-sm font-medium hidden sm:block"></span>
          <a
            href="#"
            class="text-text-dark-medium hover:text-primary transition-colors">
            <i class="fas fa-bell text-xl"></i>
          </a>
          <div class="flex items-center space-x-2">
            <img
              src="https://randomuser.me/api/portraits/men/1.jpg"
              alt="Admin Avatar"
              class="w-10 h-10 rounded-full object-cover border-2 border-primary/50" />
            <span
              class="text-sm font-medium hidden sm:block text-text-dark-medium">Admin Name</span>
          </div>
        </div>
      </header>

      <main
        class="flex-1 p-6 bg-dashboard-bg custom-scrollbar overflow-y-auto">
        <div class="flex justify-end mb-8">
          <a
            href="addService.php"
            class="inline-block bg-primary hover:bg-cleaning-dark text-white px-8 py-3 rounded-full shadow-custom-md hover:shadow-custom-lg transition-all duration-300 transform hover:scale-105 group relative overflow-hidden"
            data-aos="fade-left"
            data-aos-delay="700">
            <div
              class="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <span class="relative z-10 flex items-center justify-center">
              <i class="fas fa-plus-circle mr-2"></i> Add New Service
            </span>
          </a>
        </div>

        <?php if (isset($_SESSION['message'])): ?>
          <?php
          $type = $_SESSION['message_type'];
          $message = $_SESSION['message'];
          unset($_SESSION['message']);
          ?>

          <div class="w-full flex justify-center mt-4">
            <div id="flash-message"
              class="flex items-center gap-3 px-6 py-4 text-sm font-medium rounded-lg shadow-md w-[400px] text-center
                <?php if ($type == 'success') echo 'bg-green-100 text-green-800 border border-green-300'; ?>
                <?php if ($type == 'warning') echo 'bg-yellow-100 text-yellow-800 border border-yellow-300'; ?>
                <?php if ($type == 'danger')  echo 'bg-red-100 text-red-800 border border-red-300'; ?>">

              <?php if ($type == 'success'): ?>
                <i class="fas fa-check-circle text-green-600 text-lg"></i>
              <?php elseif ($type == 'warning'): ?>
                <i class="fas fa-exclamation-triangle text-yellow-600 text-lg"></i>
              <?php elseif ($type == 'danger'): ?>
                <i class="fas fa-times-circle text-red-600 text-lg"></i>
              <?php endif; ?>

              <span class="flex-1"><?= $message; ?></span>
            </div>
          </div>

          <script>
            setTimeout(function() {
              var flashMessage = document.getElementById('flash-message');
              if (flashMessage) {
                flashMessage.style.display = 'none';
              }
            }, 3000);
          </script>
        <?php endif; ?>

        <section class="relative overflow-hidden bg-gray-50 p-6 rounded-xl">
          <div class="absolute inset-0 z-0 overflow-hidden">
            <div
              class="absolute w-96 h-96 bg-primary/10 rounded-full -left-32 top-1/4 blur-3xl"></div>
            <div
              class="absolute w-96 h-96 bg-blue-500/10 rounded-full -right-32 bottom-1/4 blur-3xl"></div>
          </div>
          <div
            class="absolute top-0 right-0 w-64 h-64 bg-repeat"
            style="
                background-image: url('data:image/svg+xml,%3Csvg width=\'10\' height=\'10\' viewBox=\'0 0 10 10\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'5\' cy=\'5\' r=\'1\' fill=\'%23c7c7c7\'/%3E%3C/svg%3E');
                opacity: 0.1;
              "></div>

          <div class="container mx-auto px-4 relative z-10">
            <div class="mx-auto">

              <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php


                $services = $mysqli->query("SELECT * FROM service_table");


                // Fetch and display the titles
                while ($row = $services->fetch_assoc()):

                ?>
                  <div
                    class="relative bg-white rounded-xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 overflow-hidden border border-card-border group"
                    data-aos="fade-up"
                    data-aos-delay="100">
                    <img
                      src="service_image/<?php echo $row['service_image']; ?>"
                      alt="Kitchen Clean"
                      class="w-full h-48 object-cover" />
                    <div class="p-6">
                      <p class="text-xs font-semibold text-gray-600 mb-2">
                        Category: <?php echo ($row['service_category']) ?>
                      </p>
                      <h3
                        class="text-2xl font-bold text-primary mb-2 font-heading">
                        <?php echo ($row['service_title']) ?>
                      </h3>

                      <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        <?php
                        $text = strip_tags($row['service_description']);
                        $trimmed_text = mb_strimwidth($text, 0, 70, '...');
                        echo nl2br($trimmed_text);
                        ?>
                      </p>
                      <div class="flex space-x-2 mt-4">
                        <a href="serviceDes.php?service_des_id=<?php echo $row['id']; ?>"
                          class="flex-1 flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition-colors duration-300 text-sm">
                          <i class="fas fa-eye mr-1"></i> View
                        </a>
                        <a href="editService.php?service_update_id=<?php echo $row['id']; ?>"
                          class="flex-1 flex items-center justify-center px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-md hover:bg-yellow-600 transition-colors duration-300 text-sm">
                          <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <a href="logics.php?service_update_id=<?php echo $row['id']; ?>"
                          class="flex-1 flex items-center justify-center px-4 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition-colors duration-300 text-sm">
                          <i class="fas fa-trash-alt mr-1"></i> Delete
                        </a>
                      </div>
                    </div>
                    <div
                      class="absolute bottom-0 left-0 right-0 h-4 bg-transparent rounded-b-xl transition-colors duration-300 group-hover:bg-primary"></div>
                  </div>

                <?php endwhile; ?>


              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="main.js"></script>

</body>

</html>