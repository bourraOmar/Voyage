<!DOCTYPE html>
<html>

<head>
    <title>travel Vibe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        h2 {
            font-family: 'Dancing Script', cursive;
        }

        span {
            font-family: 'Nunito Sans';
        }
    </style>
</head>

<body>
    <section class="relative w-[100%] min-h-screen flex  justify-center items-center">
        <header class="absolute top-0 left-0 w-[100%] z-10">
            <nav class="border-gray-200 px-4 lg:px-6 py-4 bg-black">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="#" class="flex items-center">
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Travel Vibe</span>
                    </a>
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="index.php" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white">Home</a>
                            </li>
                            <li>
                                <a href="activite.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Activite</a>
                            </li>
                            <li>
                                <a href="client.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Client</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="flex items-center z-10 ">
            <h2 class="text-white text-[20vh] leading-[0.55em] text-center font-['Dancing Script']">Travel Vibe<br><span class="text-[25px] font-[200] tracking-[5px] bg-white text-black py-[5px] uppercase shadow-xl">discaver the word in new way.</span></h2>
        </div>
		<video src="nightlife.mp4" autoplay muted loop class="absolute left-0 top-0 w-[100%] h-[100%] object-cover	"></video>
        <footer class="absolute bottom-0 left-0 w-[100%] shadow  bg-black">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-white">© 2023 <a href="#" class="hover:underline">Travel Vibe</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-white sm:mt-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>
</section>
</body>

</html>