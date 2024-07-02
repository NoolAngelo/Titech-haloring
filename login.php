<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Halo Ring - TiTech</title>
  <link rel="icon" href="img/TITECH.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
  <!-- Small CSS to Hide elements at 1520px size -->
  <style>
    @media (max-width: 1520px) {
      .left-svg {
        display: none;
      }
    }

    /* small css for the mobile nav close */
    #nav-mobile-btn.close span:first-child {
      transform: rotate(45deg);
      top: 4px;
      position: relative;
      background: #a0aec0;
    }

    #nav-mobile-btn.close span:nth-child(2) {
      transform: rotate(-45deg);
      margin-top: 0px;
      background: #a0aec0;
    }
  </style>
</head>

<body class="overflow-x-hidden antialiased">
  <!-- Header Section -->
  <?php include 'header.php'; ?>

  <!-- Login Form Section -->
  <section class="flex justify-center py-12 bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-md shadow-md">
      <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>
      <form action="#" method="POST">
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email (required)</label>
          <input type="email" id="email" name="email" class="w-full px-3 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required />
        </div>
        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="password" class="w-full px-3 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required />
        </div>
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center">
            <input id="remember_me" name="remember_me" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
            <label for="remember_me" class="block ml-2 text-sm text-gray-900">Remember me</label>
          </div>
          <div class="text-sm">
            <a href="#" class="text-blue-600 hover:text-blue-500">Forgot your password?</a>
          </div>
        </div>
        <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
          Login
        </button>
      </form>
    </div>
  </section>

  <!-- Footer Section -->
  <?php include 'footer.php'; ?>

  <script>
    const navBtn = document.getElementById("nav-mobile-btn");
    const nav = document.getElementById("nav");

    navBtn.addEventListener("click", () => {
      nav.classList.toggle("hidden");
      navBtn.classList.toggle("close");
    });
  </script>
</body>

</html>