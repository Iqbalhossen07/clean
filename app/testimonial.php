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
    <title>CleanPro - Customer Testimonials</title>
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
                        Customer Testimonials
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
                <div
                    class="max-w-7xl mx-auto bg-white p-8 rounded-xl shadow-custom-md border border-card-border-light"
                    data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-3xl font-bold text-text-dark-high font-heading">
                            All Testimonials
                        </h2>
                        <a
                            href="addTestimonial.php"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-semibold rounded-md shadow-custom-md text-white bg-primary hover:bg-cleaning-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-plus-circle mr-2"></i> Add New Testimonial
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

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php


                        $testimonails = $mysqli->query("SELECT * FROM testimonials");


                        // Fetch and display the titles
                        while ($row = $testimonails->fetch_assoc()):

                        ?>
                            <div
                                class="bg-white rounded-lg overflow-hidden shadow-custom-sm border border-card-border-light hover:shadow-custom-md transition-shadow duration-200 p-6 flex flex-col"
                                data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="flex items-center mb-4">
                                    <img
                                        src="client_picture/<?php echo ($row['client_picture']) ?>"
                                        alt="Client Name"
                                        class="w-16 h-16 rounded-full object-cover mr-4 border-2 border-primary/50" />
                                    <div>
                                        <h3 class="text-xl font-bold text-text-dark-high font-heading">
                                            <?php echo ($row['client_name']) ?>
                                        </h3>
                                        <p class="text-sm text-text-dark-medium"><?php echo ($row['client_designation']) ?></p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-3">
                                    <i class="fas fa-star star-filled"></i>
                                    <i class="fas fa-star star-filled"></i>
                                    <i class="fas fa-star star-filled"></i>
                                    <i class="fas fa-star star-filled"></i>
                                    <i class="fas fa-star star-filled"></i>
                                </div>
                                <p class="text-sm text-text-dark-medium flex-grow mb-4 line-clamp-4">
                                   <?php
                        $text = strip_tags($row['client_description']);
                        $trimmed_text = mb_strimwidth($text, 0, 70, '...');
                        echo nl2br($trimmed_text);
                        ?>
                                </p>
                                <div class="flex justify-end space-x-3 mt-auto">
                                    <a href="testimonialDes.php?testimonial_des_id=<?php echo $row['id']; ?>" class="action-btn view"
                                        title="View Testimonial">
                                        <i class="fas fa-eye text-lg text-primary"></i>
                                    </a>
                                    <a href="updateTestimonial.php?testimonail_update_id=<?php echo $row['id']; ?>" class="action-btn edit"
                                        title="Edit Testimonial">
                                        <i class="fas fa-edit text-lg text-orange-400"></i>
                                    </a>
                                    <a href="logics.php?testimonial_des_id=<?php echo $row['id']; ?>"
                                        onclick="confirmDelete('<?php echo ($row['client_name']) ?>')" class="action-btn delete"
                                        title="Delete Testimonial">
                                        <i class="fas fa-trash-alt text-lg text-red-600"></i>
                                    </a>
                                </div>
                            </div>

                        <?php endwhile; ?>




                    </div>
            </main>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="main.js"></script>
</body>

</html>