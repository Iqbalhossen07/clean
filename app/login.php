<?php include('db.php') ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CleanPro - Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#00A650",
              "cleaning-primary": "#00A650",
              "cleaning-dark": "#007A3D",
            },
            fontFamily: {
              sans: ['Open Sans', 'sans-serif'],
              heading: ['Montserrat', 'sans-serif'],
            },
          },
        },
      };
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet" />
  </head>
  <body class="bg-dashboard-bg text-text-dark-medium font-sans flex items-center justify-center min-h-screen">
    <div class="max-w-lg w-full bg-white p-8 rounded-lg shadow-lg">
      <div class="text-center mb-6">
        <h2 class="text-3xl font-bold text-primary">CleanPro Admin Login</h2>
        <p class="text-lg text-text-dark-medium mt-2">Please sign in to access the admin dashboard.</p>
      </div>
         <?php 
                if (isset($_SESSION['error'])) {
                    echo "<p id='error-msg' style='color:red;'>".$_SESSION['error']."</p>";
                    unset($_SESSION['error']); // সেশন থেকে এরর মুছে ফেলা
                }
            ?>

      <!-- Login Form -->
      <form action="logics.php" method="POST" class="space-y-6">
    
        
        <!-- Email Input -->
        <div>
          <label for="email" class="block text-sm font-medium text-text-dark-high">Email Address</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            required 
            class="mt-2 w-full p-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" 
            placeholder="Enter your email" 
          />
        </div>
        
        <!-- Password Input -->
        <div>
          <label for="password" class="block text-sm font-medium text-text-dark-high">Password</label>
          <input 
            type="password" 
            id="password" 
            name="password" 
            required 
            class="mt-2 w-full p-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" 
            placeholder="Enter your password" 
          />
        </div>
        
       

        <!-- Submit Button -->
        <div>
          <button type="submit" name="adminlogin" class="w-full bg-primary text-white p-3 rounded-md font-medium hover:bg-cleaning-dark transition duration-200">
            Login
          </button>
        </div>

 
    </div>

    <!-- Optional JavaScript to make it interactive -->
    <script>
      // Optional JavaScript code for any dynamic interactions (like form validation, etc.)
    </script>
  </body>
</html>
