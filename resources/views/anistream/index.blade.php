<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AniStream PAS</title>
    <link href="{{ asset('css/build.css') }}" rel="stylesheet" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
  </head>

  <style>
    .video-card {
        max-width: 500px;
        max-height: 700px;
        overflow: hidden;
    }

    .video-card h2 {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }

    .video-card p {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; 
        -webkit-box-orient: vertical;
    }
</style>

  <body class="bg-background overflow-x-hidden">
    <!-- header -->
    <header
      class="fixed top-0 right-0 left-0 md:py-1 transition-all duration-300"
    >
      <nav
        class="max-w-7xl mx-auto bg-gray-800 md:bg-transparent p-5 order-[10001]"
      >
        <div class="flex items-center justify-between">
          <a
            href="/"
            class="text-white font-bold text-lg flex items-center gap-3"
            ><img src="{{ asset('src/img/Anistream.png') }}" alt="" class="w-8 h-8" />AniStream</a
          >
          <!-- only for large device -->
          <div class="hidden md:flex space-x-10">
            <a href="#home" class="text-primary hover:text-gray-300">Home</a>
            <a href="#projects" class="text-white hover:text-gray-300">TopAnime</a>
            <a href="#resume" class="text-white hover:text-gray-300">Review</a>
          </div>
          <!-- menu btn, only disply on mobile -->
          <div class="md:hidden">
            <button id="mobile-menu-button" class="text-white text-2xl">
              <i class="bx bx-menu"></i>
            </button>
          </div>
        </div>

        <!-- mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden">
          <a href="#home" class="block text-white py-2 mt-3 hover:bg-gray-700"
            >Home</a
          >
          <a href="#ListAnime" class="block text-white py-2 hover:bg-gray-700"
            >ListAnime</a
          >
          <a href="#Schedule" class="block text-white py-2 hover:bg-gray-700">#Schedule</a>
        </div>
      </nav>
    </header>

    <!-- banner section -->
    <section class="max-w-7xl mx-auto px-5 my-12" id="home">
      <div
        class="flex md:flex-row flex-col justify-between items-center text-white gap-4 py-10"
      >
        <div class="md:w-1/2">
          <p class="text-xl font-medium mb-4">
            Hello, <span class="text-primary">Welcome</span>
          </p>
          <h1 class="font-bold text-4xl tracking-[3.22px] mb-5">To AniStream!</h1>
          <p class="text-2xl font-montserrat mb-5">
            The Ultimate Anime Streaming Experience
          </p>
          <p class="text-xl mb-12 md:w-3/4 text-justify leading-8">
            AniStream is a dedicated streaming platform for anime enthusiasts around the globe, 
            offering an unparalleled viewing experience with a collection of the latest and classic anime,
            all in one place.
          </p>
          <button class="py-4 px-10 rounded-md bg-primary text-white font-bold">
            Let's Streaming
          </button>
          <!-- social btn -->
          <div class="mt-12 mb-8 flex gap-4 items-center">
            <p>Check out Our:</p>
            <div class="flex space-x-3">
            @foreach ($contacts as $contact)
              <a href="#"
                ><img src="{{ asset('storage/' . $contact->picture) }}" alt="" class="w-8 h-8"
              /></a>
              @endforeach
            </div>
          </div>
        </div>
        <div class="md:w-1/2 order-first md:order-none">
          <img src="{{ asset('src/img/Pampakapam.png') }}" alt="" class="md:ml-20 w-full" />
        </div>
      </div>
    </section>

    <!-- service section -->
    <section class="max-w-7xl mx-auto px-5 my-6 text-white" id="Services">
      <div class="text-center">
        <p class="mb-3 font-montserrat font-medium">Our Services</p>
        <h3 class="text-primary text-3xl font-bold mb-16">What We Do</h3>
      </div>
      <!-- service cards -->
      <div
    class="my-16 flex flex-col md:flex-row justify-around items-center gap-12"
>
    @foreach ($services as $service)
    <div
        class="w-[354px] px-5 py-8 rounded-lg border border-primary shadow-[#5dadec3b] cursor-pointer shadow-xl"
    >
        <img
            src="{{ asset('storage/' . $service->picture) }}"
            alt="{{ $service->title }}"
            class="w-[196px] mb-12 mx-auto"
        />
        <h5 class="text-center my-5 text-xl">{{ $service->title }}</h5>
        <p class="text-justify">
            {{ $service->description }}
        </p>
    </div>
    @endforeach
</div>
    </section>

    <!-- projects -->
    <section class="px-5 my-32 mx-auto max-w-7xl" id="projects">
      <div class="text-center text-white">
        <h3 class="text-3xl font-bold mb-5">
          Recent <span class="text-primary">Anime</span>
        </h3>
        <p class="mb-6 md:w-3/4 mx-auto">
          At AniStream, we are dedicated to providing the ultimate anime streaming experience for our community. 
          Our commitment to excellence is unwavering, and we strive to meet and exceed the expectations of our users every day.
        </p>
      </div>
      <div class="flex md:flex-row flex-col items-center justify-between gap-8 my-20">
    @foreach($streams as $stream)
    <div class="border border-primary shadow-xl shadow-[#5dadec3b] mx-auto rounded-2xl p-5 flex flex-col items-center video-card">
        <video controls class="w-full h-full object-cover">
            <source src="{{ asset('storage/' . $stream->video_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <h2 class="text-2xl font-bold mt-4 text-center text-white">{{ $stream->title }}</h2>
        <p class="text-base text-center text-white mt-2">{{ $stream->description }}</p>
    </div>
    @endforeach
</div>
    </section>

    <!-- reviews  -->
    <section class="my-16 max-w-7xl mx-auto px-5" id="resume">
      <div class="text-center">
        <p class="mb-3 font-montserrat font-medium text-white">Testimonials</p>
        <h3 class="text-primary text-3xl font-bold mb-16">
          What Our Customers Say
        </h3>
      </div>

      <!-- testimonial section -->
      <div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach($reviews as $review)
            <div class="swiper-slide py-8 px-3 text-white">
                <img src="{{ asset('storage/' . $review->picture) }}" alt="{{ $review->name }}" />
                <p class="text-sm px-2 my-5 text-justify">
                    {{ $review->description }}
                </p>
                <h5 class="text-primary mb-2">{{ $review->name }}</h5>
                <p class="text-sm px-2">User</p> <!-- You can change the user role dynamically if you have it in the database -->
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
    </section>

    <footer class="max-w-7xl mx-auto px-5 my-16">
        <h4 class="text-2xl text-white pt-12 mb-12">AniStream</h4>
        <div class="text-white md:ml-16 flex flex-col md:flex-row justify-between md:items-center gap-6">
          <div class="md:w-1/3 md:pl-10">
            <h5 class="mb-3">Company</h5>
            <a href="#" class="block my-2 text-sm text-slate-300">About Us</a>
            <a href="#" class="block my-2 text-sm text-slate-300">Why Choose me</a>
            <a href="#" class="block my-2 text-sm text-slate-300">Pricing</a>
            <a href="#" class="block my-2 text-sm text-slate-300">Testimonial</a>
          </div>

          <div class="md:w-1/3">
            <h5 class="mb-3">Resources</h5>
            <a href="#" class="block my-2 text-sm text-slate-300">Privacy Policy</a>
            <a href="#" class="block my-2 text-sm text-slate-300">Terms and Condition</a>
            <a href="#" class="block my-2 text-sm text-slate-300">Blog</a>
            <a href="#" class="block my-2 text-sm text-slate-300">Contact Us</a>
          </div>

          <div class="md:w-1/3">
            <h5 class="mb-5">Subscribe to our Streaming Services</h5>
            <div class="relative">
              <input type="email" name="email" id="email" placeholder="Enter your Email" class="bg-[#2B2E3C] py-5 pl-5 rounded-lg"> 
              <input type="submit" value="Subscribe" class="bg-primary py-4 px-8 rounded-lg absolute left-44 top-1">
            </div>
          </div>

        </div>
    </footer>

    <!-- script tags -->
    <script src="{{ asset('src/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('src/review.js') }}"></script>
  </body>
</html>
