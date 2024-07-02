<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halo Ring - TiTech</title>
  <link rel="icon" href="img/TITECH.png" type="imagex/icon">
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
  <!-- End Header Section-->

  <!-- BEGIN HERO SECTION -->
  <div class="relative items-center justify-center w-full overflow-x-hidden lg:pt-40 lg:pb-40 xl:pt-40 xl:pb-64">
    <div class="container flex flex-col items-center justify-between h-full max-w-6xl px-8 mx-auto -mt-32 lg:flex-row xl:px-0">
      <div class="z-30 flex flex-col items-center w-full max-w-xl pt-48 text-center lg:items-start lg:w-1/2 lg:pt-20 xl:pt-40 lg:text-left">
        <h1 class="relative mb-4 text-5xl font-black leading-tight text-gray-900 sm:text-6xl xl:mb-8">
          HALO RING
        </h1>
        <h3 class="relative text-2xl font-black leading-tight text-gray-900 sm:text-4xl xl:mb-6">
          Tap into Convenience.
        </h3>
        <p class="pr-0 mb-8 text-base text-gray-600 sm:text-lg xl:text-xl lg:pr-20">
          A convenient, secure, and stylish way to simplify your payment
          experience.
        </p>
        <a href="#_" class="relative self-start inline-block w-auto px-8 py-4 mx-auto mt-0 text-base font-bold text-white bg-gray-600 border-t border-gray-200 rounded-md shadow-xl sm:mt-1 fold-bold lg:mx-0">Join the Waitlist</a>

        <a href="#_" style="font-size: 14px; color: #4a5568;">We’re releasing the ring in the Philippines first, but stay tuned for overseas launches.</a>

        <svg class="absolute left-0 max-w-md mt-24 -ml-64 left-svg" viewBox="0 0 423 423" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <defs>
            <linearGradient x1="100%" y1="0%" x2="4.48%" y2="0%" id="linearGradient-1">
              <stop stop-color="#5C54DB" offset="0%" />
              <stop stop-color="#6A82E7" offset="100%" />
            </linearGradient>
            <filter x="-9.3%" y="-6.7%" width="118.7%" height="118.7%" filterUnits="objectBoundingBox" id="filter-3">
              <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
              <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
              <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" in="shadowBlurOuter1" />
            </filter>
            <rect id="path-2" x="63" y="504" width="300" height="300" rx="40" />
          </defs>
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity=".9">
            <g id="Desktop-HD" transform="translate(-39 -531)">
              <g id="Hero" transform="translate(43 83)">
                <g id="Rectangle-6" transform="rotate(45 213 654)">
                  <use fill="#000" filter="url(#filter-3)" xlink:href="#path-2" />
                  <use fill="#fabc6b" xlink:href="#path-2" />
                </g>
              </g>
            </g>
          </g>
        </svg>
      </div>
      <div class="relative z-50 flex flex-col items-end justify-center w-full h-full lg:w-1/2 ms:pl-10">
        <div class="container relative left-0 w-full max-w-4xl lg:absolute xl:max-w-6xl lg:w-screen">
          <img src="img/matte_no_bg.png" class="w-full h-auto mt-20 mb-20 ml-0 lg:mt-24 xl:mt-40 lg:mb-0 lg:h-full lg:-ml-12" />
        </div>
      </div>
    </div>
  </div>
  <!-- HERO SECTION END -->

  <!-- BEGIN Overview SECTION -->
  <div id="overview" class="relative w-full px-8 py-10 border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
    <div class="container flex flex-col items-center justify-between h-full max-w-6xl mx-auto">
      <h2 class="my-5 text-base font-medium tracking-tight text-black-500 uppercase">
        Overview
      </h2>
      <h3 class="w-full max-w-2xl px-5 px-8 mt-2 text-2xl font-black leading-tight text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl md:px-0">

        Simplify your Payment Experience
      </h3>
      <p class="max-w-xl px-5 mt-2 text-2xl font-black text-center text-gray-700">
        The Halo Ring is designed as a wearable contactless payment device that integrates with a user's existing debit or credit card via the HaloPay app.
      </p>
      <div class="flex flex-col w-full mt-0 lg:flex-row sm:mt-10 lg:mt-20">
        <div class="w-full max-w-md p-4 mx-auto mb-0 sm:mb-16 lg:mb-0 lg:w-1/3">
          <div class="relative flex flex-col items-center justify-center w-full h-full p-20 mr-5 rounded-lg">
            <svg class="absolute w-full h-full text-gray-100 fill-current" viewBox="0 0 377 340" xmlns="http://www.w3.org/2000/svg">
              <g>
                <g>
                  <path d="M342.8 3.7c24.7 14 18.1 75 22.1 124s18.6 85.8 8.7 114.2c-9.9 28.4-44.4 48.3-76.4 62.4-32 14.1-61.6 22.4-95.9 28.9-34.3 6.5-73.3 11.1-95.5-6.2-22.2-17.2-27.6-56.5-47.2-96C38.9 191.4 5 151.5.9 108.2-3.1 64.8 22.7 18 61.8 8.7c39.2-9.2 91.7 19 146 16.6 54.2-2.4 110.3-35.6 135-21.6z" />
                </g>
              </g>
            </svg>
            <!-- FEATURE Icon 1 -->
            <svg class="relative w-20 h-20" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-1TriangleIcon1">
                  <stop stop-color="#9C09DB" offset="0%" />
                  <stop stop-color="#1C0FD7" offset="100%" />
                </linearGradient>
                <filter x="-14%" y="-10%" width="128%" height="128%" filterUnits="objectBoundingBox" id="filter-3TriangleIcon1">
                  <feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
                  <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                  <feColorMatrix values="0 0 0 0 0.141176471 0 0 0 0 0.031372549 0 0 0 0 0.501960784 0 0 0 0.15 0" in="shadowBlurOuter1" />
                </filter>
                <path d="M17.947 0h14.106c6.24 0 8.503.65 10.785 1.87a12.721 12.721 0 015.292 5.292C49.35 9.444 50 11.707 50 17.947v14.106c0 6.24-.65 8.503-1.87 10.785a12.721 12.721 0 01-5.292 5.292C40.556 49.35 38.293 50 32.053 50H17.947c-6.24 0-8.503-.65-10.785-1.87a12.721 12.721 0 01-5.292-5.292C.65 40.556 0 38.293 0 32.053V17.947c0-6.24.65-8.503 1.87-10.785A12.721 12.721 0 017.162 1.87C9.444.65 11.707 0 17.947 0z" id="path-2TriangleIcon1" />
              </defs>
              <g id="Page-1TriangleIcon1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Desktop-HDTriangleIcon1" transform="translate(-291 -1278)">
                  <g id="FeaturesTriangleIcon1" transform="translate(170 915)">
                    <g id="Group-9TriangleIcon1" transform="translate(0 365)">
                      <g id="Group-8TriangleIcon1" transform="translate(125)">
                        <g id="Rectangle-9TriangleIcon1">
                          <use fill="#000" filter="url(#filter-3TriangleIcon1)" xlink:href="#path-2TriangleIcon1" />
                          <use fill="url(#linearGradient-1TriangleIcon1)" xlink:href="#path-2TriangleIcon1" />
                        </g>
                        <g id="playTriangleIcon1" transform="translate(18 15)" fill="#FFF" fill-rule="nonzero">
                          <path d="M9.432 2.023l8.919 14.879a1.05 1.05 0 01-.384 1.452 1.097 1.097 0 01-.548.146H-.42A1.07 1.07 0 01-1.5 17.44c0-.19.052-.375.15-.538L7.567 2.023a1.092 1.092 0 011.864 0z" id="TriangleIcon1" transform="rotate(90 8.5 10)" />
                        </g>
                      </g>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
            <h4 class="relative mt-6 text-lg font-bold" style="text-align: center;">Contactless Payments</h4>
            <p class="relative mt-2 text-base text-center text-gray-600">
              Enjoy effortless contactless payments with a simple tap of your hand. Use your ring for quick and seamless transactions globally.
            </p>
            <a href="#_" class="relative flex mt-2 text-sm font-medium text-amber-600 underline">Learn More</a>
          </div>
        </div>

        <div class="w-full max-w-md p-4 mx-auto mb-0 sm:mb-16 lg:mb-0 lg:w-1/3">
          <div class="relative flex flex-col items-center justify-center w-full h-full p-20 mr-5 rounded-lg">
            <svg class="absolute w-full h-full text-gray-100 fill-current" viewBox="0 0 358 372" xmlns="http://www.w3.org/2000/svg">
              <g>
                <g>
                  <path d="M315.7 6.5c30.2 15.1 42.6 61.8 41.5 102.5-1.1 40.6-15.7 75.2-24.3 114.8-8.7 39.7-11.3 84.3-34.3 107.2-23 22.9-66.3 23.9-114.5 30.7-48.2 6.7-101.3 19.1-123.2-4.1-21.8-23.2-12.5-82.1-21.6-130.2C30.2 179.3 2.6 141.9.7 102c-2-39.9 21.7-82.2 57.4-95.6 35.7-13.5 83.3 2.1 131.2 1.7 47.9-.4 96.1-16.8 126.4-1.6z" />
                </g>
              </g>
            </svg>
            <!-- FEATURE Icon 2 -->
            <svg class="relative w-20 h-20" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-1Icon2">
                  <stop stop-color="#F2C314" offset="0%" />
                  <stop stop-color="#FC3832" offset="100%" />
                </linearGradient>
                <filter x="-14%" y="-10%" width="128%" height="128%" filterUnits="objectBoundingBox" id="filter-3Icon2">
                  <feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
                  <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                  <feColorMatrix values="0 0 0 0 0.501960784 0 0 0 0 0.125490196 0 0 0 0 0 0 0 0 0.15 0" in="shadowBlurOuter1" />
                </filter>
                <path d="M17.947 0h14.106c6.24 0 8.503.65 10.785 1.87a12.721 12.721 0 015.292 5.292C49.35 9.444 50 11.707 50 17.947v14.106c0 6.24-.65 8.503-1.87 10.785a12.721 12.721 0 01-5.292 5.292C40.556 49.35 38.293 50 32.053 50H17.947c-6.24 0-8.503-.65-10.785-1.87a12.721 12.721 0 01-5.292-5.292C.65 40.556 0 38.293 0 32.053V17.947c0-6.24.65-8.503 1.87-10.785A12.721 12.721 0 017.162 1.87C9.444.65 11.707 0 17.947 0z" id="path-2Icon2" />
              </defs>
              <g id="Page-1Icon2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Desktop-HDIcon2" transform="translate(-691 -1278)">
                  <g id="FeaturesIcon2" transform="translate(170 915)">
                    <g id="Group-9-CopyIcon2" transform="translate(400 365)">
                      <g id="Group-8Icon2" transform="translate(125)">
                        <g id="Rectangle-9Icon2">
                          <use fill="#000" filter="url(#filter-3Icon2)" xlink:href="#path-2Icon2" />
                          <use fill="url(#linearGradient-1Icon2)" xlink:href="#path-2Icon2" />
                        </g>
                        <g id="machine-learningIcon2" transform="translate(14 12)" fill="#FFF" fill-rule="nonzero">
                          <path d="M10.554 21.418v-2.68c-1.1-.204-1.932-1.143-1.932-2.271 0-.468.143-.903.388-1.267l-2.32-1.662L4.367 15.2a2.254 2.254 0 01-.005 2.541l5.28 4.05c.268-.182.577-.311.911-.373zm.892 0c.334.062.643.191.912.373l5.28-4.05a2.254 2.254 0 01-.006-2.54l-2.321-1.663L12.99 15.2c.245.364.388.8.388 1.267 0 1.128-.832 2.067-1.932 2.27v2.681zm1.538.997c.25.365.394.803.394 1.274C13.378 24.965 12.314 26 11 26s-2.378-1.035-2.378-2.311c0-.471.145-.91.394-1.274l-5.28-4.05c-.385.26-.853.413-1.358.413C1.065 18.778 0 17.743 0 16.467c0-1.129.832-2.068 1.932-2.27v-2.393C.832 11.6 0 10.662 0 9.534c0-1.277 1.065-2.312 2.378-2.312.505 0 .973.153 1.358.414l5.28-4.05a2.254 2.254 0 01-.394-1.275C8.622 1.035 9.686 0 11 0s2.378 1.035 2.378 2.311c0 .471-.145.91-.394 1.274l5.28 4.05c.385-.26.853-.413 1.358-.413C20.935 7.222 22 8.257 22 9.533c0 1.129-.832 2.068-1.932 2.27v2.393c1.1.203 1.932 1.142 1.932 2.27 0 1.277-1.065 2.312-2.378 2.312-.505 0-.973-.153-1.358-.414l-5.28 4.05zm-9.243-7.843L5.937 13l-2.196-1.572c-.27.183-.58.314-.917.376v2.392c.336.062.647.193.917.376zm.627-3.772l2.321 1.662L9.01 10.8a2.254 2.254 0 01-.388-1.267c0-1.128.832-2.067 1.932-2.27V4.582a2.403 2.403 0 01-.912-.373l-5.28 4.05a2.254 2.254 0 01.006 2.54zm13.89 3.772c.27-.183.582-.314.918-.376v-2.392a2.403 2.403 0 01-.917-.376L16.063 13l2.196 1.572zm-.62-6.313l-5.28-4.05a2.403 2.403 0 01-.912.373v2.68c1.1.204 1.932 1.143 1.932 2.271 0 .468-.143.903-.388 1.267l2.32 1.662 2.322-1.662a2.254 2.254 0 01.005-2.541zm-8 6.313A2.415 2.415 0 0111 14.156c.507 0 .977.154 1.363.416L14.559 13l-2.196-1.572a2.415 2.415 0 01-1.363.416c-.507 0-.977-.154-1.363-.416L7.441 13l2.196 1.572zM11 10.978c.821 0 1.486-.647 1.486-1.445 0-.797-.665-1.444-1.486-1.444s-1.486.647-1.486 1.444c0 .798.665 1.445 1.486 1.445zm0 6.933c.821 0 1.486-.647 1.486-1.444 0-.798-.665-1.445-1.486-1.445s-1.486.647-1.486 1.445c0 .797.665 1.444 1.486 1.444zm8.622-6.933c.82 0 1.486-.647 1.486-1.445 0-.797-.665-1.444-1.486-1.444s-1.487.647-1.487 1.444c0 .798.666 1.445 1.487 1.445zm0 6.933c.82 0 1.486-.647 1.486-1.444 0-.798-.665-1.445-1.486-1.445s-1.487.647-1.487 1.445c0 .797.666 1.444 1.487 1.444zM2.378 10.978c.821 0 1.487-.647 1.487-1.445 0-.797-.666-1.444-1.487-1.444-.82 0-1.486.647-1.486 1.444 0 .798.665 1.445 1.486 1.445zm0 6.933c.821 0 1.487-.647 1.487-1.444 0-.798-.666-1.445-1.487-1.445-.82 0-1.486.647-1.486 1.445 0 .797.665 1.444 1.486 1.444zM11 25.133c.821 0 1.486-.646 1.486-1.444 0-.798-.665-1.445-1.486-1.445s-1.486.647-1.486 1.445.665 1.444 1.486 1.444zm0-21.377c.821 0 1.486-.647 1.486-1.445S11.821.867 11 .867s-1.486.646-1.486 1.444c0 .798.665 1.445 1.486 1.445z" id="ShapeIcon2" />
                        </g>
                      </g>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
            <h4 class="relative mt-6 text-lg font-bold">Expense Tracking</h4>
            <p class="relative mt-2 text-base text-center text-gray-600">
              The HaloPay app provides detailed expense reports, helping users monitor their financial habits and manage their budget effectively.
            </p>
            <a href="#_" class="relative flex mt-2 text-sm font-medium text-amber-600 underline">Learn More</a>
          </div>
        </div>

        <div class="w-full max-w-md p-4 mx-auto mb-16 lg:mb-0 lg:w-1/3">
          <div class="relative flex flex-col items-center justify-center w-full h-full p-20 mr-5 rounded-lg">
            <svg class="absolute w-full h-full text-gray-100 fill-current" viewBox="0 0 378 410" xmlns="http://www.w3.org/2000/svg">
              <g>
                <g>
                  <path d="M305.9 14.4c23.8 24.6 16.3 84.9 26.6 135.1 10.4 50.2 38.6 90.3 43.7 137.8 5.1 47.5-12.8 102.4-50.7 117.4-37.9 15.1-95.7-9.8-151.7-12.2-56.1-2.5-110.3 17.6-130-3.4-19.7-20.9-4.7-82.9-11.5-131.2C25.5 209.5-3 174.7 1.2 147c4.2-27.7 41-48.3 75-69.6C110.1 56.1 141 34.1 184 17.5c43.1-16.6 98.1-27.7 121.9-3.1z" />
                </g>
              </g>
            </svg>
            <!-- FEATURE Icon 3 -->
            <svg class="relative w-20 h-20" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-1Icon3">
                  <stop stop-color="#32FBFC" offset="0%" />
                  <stop stop-color="#3214F2" offset="100%" />
                </linearGradient>
                <filter x="-14%" y="-10%" width="128%" height="128%" filterUnits="objectBoundingBox" id="filter-3Icon3">
                  <feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
                  <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                  <feColorMatrix values="0 0 0 0 0.031372549 0 0 0 0 0.149019608 0 0 0 0 0.658823529 0 0 0 0.15 0" in="shadowBlurOuter1" />
                </filter>
                <path d="M17.947 0h14.106c6.24 0 8.503.65 10.785 1.87a12.721 12.721 0 015.292 5.292C49.35 9.444 50 11.707 50 17.947v14.106c0 6.24-.65 8.503-1.87 10.785a12.721 12.721 0 01-5.292 5.292C40.556 49.35 38.293 50 32.053 50H17.947c-6.24 0-8.503-.65-10.785-1.87a12.721 12.721 0 01-5.292-5.292C.65 40.556 0 38.293 0 32.053V17.947c0-6.24.65-8.503 1.87-10.785A12.721 12.721 0 017.162 1.87C9.444.65 11.707 0 17.947 0z" id="path-2Icon3" />
              </defs>
              <g id="Page-1Icon3" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Desktop-HDIcon3" transform="translate(-1091 -1278)">
                  <g id="FeaturesIcon3" transform="translate(170 915)">
                    <g id="Group-9-Copy-2Icon3" transform="translate(800 365)">
                      <g id="Group-8Icon3" transform="translate(125)">
                        <g id="Rectangle-9Icon3">
                          <use fill="#000" filter="url(#filter-3Icon3)" xlink:href="#path-2Icon3" />
                          <use fill="url(#linearGradient-1Icon3)" xlink:href="#path-2Icon3" />
                        </g>
                        <g id="smart-notificationsIcon3" transform="translate(15 11)" fill="#FFF" fill-rule="nonzero">
                          <path d="M12.519 3.243a6.808 6.808 0 00-.187 1.298h-8.44a2.595 2.595 0 00-2.595 2.594v12.973a2.595 2.595 0 002.595 2.595h12.973a2.595 2.595 0 002.594-2.595v-8.44c.445-.02.88-.084 1.298-.187v8.627A3.892 3.892 0 0116.865 24H3.892A3.892 3.892 0 010 20.108V7.135a3.892 3.892 0 013.892-3.892h8.627zm6.616 6.487a4.865 4.865 0 110-9.73 4.865 4.865 0 010 9.73z" id="IconIcon3" />
                        </g>
                      </g>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
            <h4 class="relative mt-6 text-lg font-bold">
              Smart Notifications
            </h4>
            <p class="relative mt-2 text-base text-center text-gray-600">
              Immediate notifications for each transaction, helping users keep track of their spending in real time.
            </p>
            <a href="#_" class="relative flex mt-2 text-sm font-medium text-amber-600 underline">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--END overview  -->




  <!-- START FEATURES-->
  <div class="relative px-8 py-10 bg-white border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
    <div id="features" class="max-w-full mx-auto md:max-w-6xl sm:px-8">

      <div class="bg-white py-24 sm:py-1">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-base font-semibold leading-7">Features</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-black sm:text-6xl">Features and Benefits</p>
            <p class="mt-6 text-lg leading-8 text-gray-700">Halo Ring offers a variety of practical features and benefits. Explore what they are and why they matter. Read on to see what makes Halo Ring exceptional.</p>
          </div>
          <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
              <!-- Travel Friendly -->
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-black">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg" style="background-color: #fabc6b;">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>
                  </div>
                  Integration with HaloPay App
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-700">The Halo Ring syncs effortlessly with the HaloPay app, enabling users to manage their payments, track expenses, and monitor financial habits seamlessly.
                </dd>
              </div>
              <!-- SSL Certificates -->
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-black">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg" style="background-color: #fabc6b;">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                  </div>
                  Security Features
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-700">Advanced security measures ensure that all transactions are protected, providing users with peace of mind and safeguarding their financial data.</dd>
              </div>
              <!-- Simple Queues -->
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-black">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg" style="background-color: #fabc6b;">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                  </div>
                  Compatibility
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-700">The Halo Ring is compatible with a wide range of debit and credit cards, making it versatile and easy to use with your existing bank accounts.</dd>
              </div>
              <!-- Advanced Security -->
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-black">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg" style="background-color: #fabc6b;">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                    </svg>
                  </div>
                  Ease of Use
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-700">With its user-friendly interface and intuitive design, the Halo Ring is easy to set up and use, ensuring a hassle-free experience.</dd>
              </div>
              <!-- New Feature: IP68 Rating -->
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-black">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg" style="background-color: #fabc6b;">
                    <!-- Placeholder for IP68 Rating Icon -->
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 110 20 10 10 0 010-20z" />
                    </svg>
                  </div>
                  IP68 rating
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-700">Water resistant in fresh water to a maximum depth of 1.5 metres for up to 30 minutes</dd>

              </div>
              <!-- New Feature: Expense Tracking -->
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-black">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg" style="background-color: #fabc6b;">
                    <!-- Placeholder for Expense Tracking Icon -->
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 110 20 10 10 0 010-20z" />
                    </svg>
                  </div>
                  Halo Pay Rewards
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-700">Unlock rewards every time you shop with your Halo Ring at select retailers. Your transaction amount is returned to you as cashback. You can easily transfer this cashback to your RingPay account and use it for future purchases with your Halo Ring.
                </dd>

              </div>
              <!-- New Feature: Battery Life -->
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-black">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg" style="background-color: #fabc6b;">
                    <!-- Placeholder for Battery Life Icon -->
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 110 20 10 10 0 010-20z" />
                    </svg>
                  </div>
                  Battery Life
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-700">Enjoy extended usage with the Halo Ring's impressive battery life, ensuring you stay connected and make payments without interruption.</dd>
                <br>
              </div>
            </dl>
          </div>
        </div>
      </div>

      <div class="relative px-8 py-10 bg-white border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">

        <!--Feature no 1-->
        <section class="overflow-hidden rounded-lg shadow-2xl md:grid md:grid-cols-3">
          <img alt="" src="img/ringhand.png" class="h-32 w-full object-cover md:h-full" />

          <div class="p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
            <p class="text-sm font-semibold uppercase tracking-widest">TiTech's signature material</p>

            <h2 class="mt-4 font-black uppercase">
              <span class="block text-4xl font-black sm:text-5xl lg:text-6xl">Crafted with Titanium metal</span>
              <span class="block mt-2 text-s font-medium text-gray-600 text-center">The most common method to obtain this metal is as an ore, mostly as rutile and ilmenite. The titanium is refined and shaped into bars or rods to get it ready for use in the ring-making procedure.</span>
            </h2>

            <p class="mt-8 text-xs font-medium text-gray-400">
              Copyright TiTech.
            </p>
          </div>
        </section>

        <br>
        <!--Feature no 1 end-->

        <!--Feature no 2-->
        <section class="overflow-hidden rounded-lg shadow-2xl md:grid md:grid-cols-3">
          <div class="p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
            <p class="text-sm font-semibold uppercase tracking-widest">Reward System and Cashback</p>

            <h2 class="mt-4 font-black uppercase">
              <span class="text-4xl font-black sm:text-5xl lg:text-6xl"> Halo Pay Rewards</span>

              <span class="block mt-2 text-s font-medium text-gray-600">Unlock rewards every time you shop with your Halo Ring at select retailers. When you make an eligible purchase at a participating retailer, a portion of your transaction amount is returned to you as cashback. You can easily transfer this cashback to your RingPay account and use it for future purchases with your Halo Ring.</span>
            </h2>

            <p class="block mt-8 text-xs font-medium text-gray-400">
              Copyright TiTech.
            </p>
          </div>

          <img alt="" src="img/ringpay.png" class="h-32 w-full object-cover md:h-full md:order-last" />
        </section>
        <br>
        <!--Feature no 2 end-->


        <!--Feature no 3-->
        <section class="overflow-hidden rounded-lg shadow-2xl md:grid md:grid-cols-3">
          <img alt="" src="img/nfc.png" class="h-32 w-full object-cover md:h-full" />

          <div class="p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
            <p class="text-sm font-semibold uppercase tracking-widest">Powered by NFC chip</p>

            <h2 class="mt-4 font-black uppercase">
              <span class="block text-4xl font-black sm:text-5xl lg:text-6xl">Advanced NFC Technology </span>

              <span class="block mt-2 text-s font-medium text-gray-600">Our product is equipped with the latest NFC chip, ensuring seamless and secure interactions. With this cutting-edge technology, you can enjoy effortless connectivity and innovative features. Experience the future of smart, contactless solutions with our NFC-powered device.</span>
            </h2>

            <p class="mt-8 text-xs font-medium  text-gray-400">
              Copyright TiTech.
            </p>
          </div>
        </section>
        <br>
        <!--Feature no 3 end-->

        <!-- END FEATURES SECTION -->






        <!-- Specification Section -->
        <div class="relative px-8 py-10 bg-white border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
          <!-- Start Specification -->
          <div id="specification" class="container flex flex-col items-center h-full max-w-6xl mx-auto">
            <h2 class="my-5 text-base font-medium tracking-tight text-black-500 uppercase">
              Specifications
            </h2>
            <h3 class="w-full max-w-2xl mt-2 text-2xl font-black leading-tight text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl">
              Halo Ring
            </h3>
            <div class="max-w-full mx-auto md:max-w-6xl sm:px-8">
              <br>
              <!-- Feature Sections -->
              <div class="space-y-10">
                <!-- Feature Group 1 -->
                <div>
                  <h4 class="text-lg font-semibold text-gray-900">Size and Weight</h4>
                  <div class="mt-4 border-t border-gray-200 pt-4">
                    <dl class="divide-y divide-gray-200">
                      <div class="py-4 flex justify-between text-base">
                        <dt class="font-medium text-black">Material</dt>
                        <dd class="text-gray-500">High-grade Titanium</dd>
                      </div>
                      <div class="py-4 flex justify-between text-base">
                        <dt class="font-medium text-black">Ring size </dt>
                        <dd class="text-gray-500">6.7mm (Sizes 4.5-8.5), 6.2mm (Sizes 9-16)</dd>
                      </div>
                      <div class="py-4 flex justify-between text-base">
                        <dt class="font-medium text-black">Ring Weight</dt>
                        <dd class="text-gray-500">~7g</dd>
                      </div>
                      <div class="py-4 flex justify-between text-base">
                        <dt class="font-medium text-black">Ring Weight (boxed)</dt>
                        <dd class="text-gray-500">~66g</dd>
                      </div>
                      <div class="py-4 flex justify-between text-base">
                        <dt class="font-medium text-black">Box Dimensions</dt>
                        <dd class="text-gray-500">96mm x 96mm x 15mm</dd>
                      </div>

                    </dl>
                  </div>
                </div>

                <!-- Feature Group 2 -->
                <div>
                  <h4 class="text-lg font-semibold text-gray-900">Specs</h4>
                  <div class="mt-4 border-t border-gray-200 pt-4">
                    <dl class="divide-y divide-gray-200">
                      <div class="py-4 flex justify-between text-base">
                        <dt class="font-medium text-black">Chip</dt>
                        <dd class="text-gray-500">Bombaclat DESFire® EV1, NTAG216</dd>
                      </div>
                      <div class="py-4 flex justify-between text-base">
                        <dt class="font-medium text-black">Battery</dt>
                        <dd class="text-gray-500">33 mAh battery</dd>
                      </div>
                      <div class="py-4 flex justify-between text-base">
                        <dt class="font-medium text-black">Charging</dt>
                        <dd class="text-gray-500">15Watts (5-10mins Charging)</dd>
                      </div>
                      <div class="py-4 flex justify-between text-base">
                        <dt class="font-medium text-black">Water Resistant</dt>
                        <dd class="text-gray-500">IP68 max depth 1.5m for up to 30 min</dd>
                      </div>
                      <div class="py-4 flex justify-between text-base">
                        <dt class="font-medium text-black">Color</dt>
                        <dd class="text-gray-500">Matteblack, RoseGold, Silver,Gold</dd>
                      </div>

                    </dl>
                  </div>
                </div>

                <!-- End Specification -->
              </div>

              <div class="relative px-8 py-10 bg-white border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
                <!-- Start Our Team -->
                <div id="ourteam" class="flex items-center justify-center w-full px-8 py-10 border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
                  <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg border border-fabc6b">
                    <div class="text-center mb-12">
                      <p class="my-5 text-base font-medium tracking-tight text-fabc6b uppercase">
                        Who We Are
                      </p>
                      <h2 class="text-4xl font-extrabold leading-10 tracking-tight text-gray-900 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl">
                        Meet Our Team
                      </h2>
                      <br>
                      <p class="text-gray-600">Our team of experts in engineering, design, and security came together to create products that not only solve everyday problems but do so with elegance and reliability.
                      </p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                      <div class="text-center">
                        <div class="w-24 h-24 mx-auto border-4 border-fabc6b rounded-full">
                          <img class="w-full h-full rounded-full object-cover" src="img/chico.png" alt="Matt Angelo Chico">
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-fabc6b">Matt Angelo Chico</h3>
                        <p class="text-gray-500">Engineering Manager/Director</p>
                        <p class="mt-2 text-gray-600">
                          I oversee the overall engineering processes, manage the development and production of the Halo Ring, ensure product quality and innovation.
                        </p>
                      </div>
                      <div class="text-center">
                        <div class="w-24 h-24 mx-auto border-4 border-fabc6b rounded-full">
                          <img class="w-full h-full rounded-full object-cover" src="img/nool.png" alt="Mark Angelo Nool">
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-fabc6b">Mark Angelo Nool</h3>
                        <p class="text-gray-500">Network Security Engineer</p>
                        <p class="mt-2 text-gray-600">
                          Responsible for the design and implementation of robust security protocols for the Halo Ring and HaloPay app, ensuring data protection and preventing unauthorized access. Yep, that's me!
                        </p>
                      </div>
                      <div class="text-center">
                        <div class="w-24 h-24 mx-auto border-4 border-fabc6b rounded-full">
                          <img class="w-full h-full rounded-full object-cover" src="img/ireneo.png" alt="Nathaniel Ireneo">
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-fabc6b">Nathaniel Ireneo</h3>
                        <p class="text-gray-500">Electronics Engineer</p>
                        <p class="mt-2 text-gray-600">
                          I develop and maintain the electronic components of the Halo Ring, ensuring the device’s functionality and durability.
                        </p>
                      </div>
                      <div class="text-center">
                        <div class="w-24 h-24 mx-auto border-4 border-fabc6b rounded-full">
                          <img class="w-full h-full rounded-full object-cover" src="img/cajucom.png" alt="Mitchelle Cajucom">
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-fabc6b">Mitchelle Cajucom</h3>
                        <p class="text-gray-500">Field Service Engineer</p>
                        <p class="mt-2 text-gray-600">
                          I provide technical support and maintenance for the Halo Ring, handle customer service inquiries, and assist with troubleshooting issues.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <!--End Our Team-->

                <?php include('footer.php'); ?>

                
</body>

</html>