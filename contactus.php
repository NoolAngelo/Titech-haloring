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


  <!--Content body-->



  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="flex flex-col justify-between">
        <div>
          <h2 class="text-3xl font-bold mb-4">Get in touch</h2>
          <p class="text-gray-600 mb-8">
            We're here to help and answer any question you might have. We look forward to hearing from you.
          </p>
          <div class="space-y-4">
            <div class="flex items-center space-x-2">
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C8.134 2 5 5.134 5 9c0 4.656 7 13 7 13s7-8.344 7-13c0-3.866-3.134-7-7-7zm0 11a3 3 0 100-6 3 3 0 000 6z"></path>
              </svg>
              <span>Filinvest Ave, Alabang, Muntinlupa, Metro Manila</span>
            </div>
            <div class="flex items-center space-x-2">
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l1-2a2 2 0 012-1h1a2 2 0 011.72 1l1 2a2 2 0 001.28 1h1.24a2 2 0 001.28-1l1-2a2 2 0 011.72-1h1a2 2 0 012 1l1 2m-10 8h4m-6 2h8"></path>
                </svg>
                <span>+63 (969) 420 6969</span>
            </div>
            <div class="flex items-center space-x-2">
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 2h4a2 2 0 012 2v2h3a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h3V4a2 2 0 012-2zm0 4h4V4h-4v2z"></path>
              </svg>
              <span>tanginngyan@yahoo.com</span>
            </div>
          </div>
        </div>
      </div>
      <div>
        <form action="#" class="space-y-4">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
              <input type="text" id="first-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
              <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
              <input type="text" id="last-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
          <div>
            <label for="phone-number" class="block text-sm font-medium text-gray-700">Phone number</label>
            <input type="tel" id="phone-number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
            <textarea id="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
          </div>
          <div>
            <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Send message</button>
          </div>
        </form>
      </div>
    </div>
  </div>






  <!--End content body-->






  <!-- Footer Section -->
  <?php include 'footer.php'; ?>
  <!--End Footer-->
</body>

</html>