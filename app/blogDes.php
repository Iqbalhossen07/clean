<?php include('db.php');
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}


if (isset($_GET['blog_des_id'])) {
    $blog_des_id = $_GET['blog_des_id'];
    $blog_view_id_result = $mysqli->query("SELECT * FROM blog_table WHERE id='$blog_des_id' ");
    if (!empty($blog_view_id_result)) {
        $row = $blog_view_id_result->fetch_array();

        $blog_title = $row['blog_title'];
        $blog_category = $row['blog_category'];
        $blog_author = $row['blog_author'];
        $blog_description = $row['blog_description'];
        $blog_publish_date = $row['blog_publish_date'];
        $blog_picture = $row['blog_picture'];
        
    }

   
}
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CleanPro - Blog Post Details</title>
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
              Blog Post Details
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
            class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-custom-md border border-card-border-light"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="space-y-6">
              <div class="mb-6">
                <img
                  src="blog_picture/<?php echo $blog_picture ?>"
                  alt="Blog Post Image"
                  class="w-full h-auto rounded-lg shadow-custom-sm object-cover"
                  style="max-height: 400px;"
                />
              </div>

              <h2 class="text-3xl font-heading font-bold text-primary mb-4">
               <?php echo $blog_title ?>
              </h2>

              <div class="flex justify-between items-center text-sm text-text-light-medium mb-4">
                <span class="text-text-dark-medium"><i class="fas fa-calendar-alt mr-1"></i>  <?php echo $blog_publish_date ?></span>
                <span class="text-text-dark-medium"><i class="fas fa-user-edit mr-1"></i>  <?php echo $blog_author ?></span>
                <span class="text-text-dark-medium"><i class="fas fa-tag mr-1"></i>  <?php echo $blog_category ?></span>
              </div>

              <div class="prose max-w-none text-text-dark-medium leading-relaxed">
                <p>
               <?php echo $blog_description ?>
                </p>
              
              </div>

            
            </div>
          </div>
        </main>
      </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <script src="main.js"></script>
  </body>
</html>