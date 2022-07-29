<header class="relative z-10 mlg:border-b-4 mlg:border-red-500 site-header">
  <div class="container !px-0 mlg:!px-4">
    <div class="flex flex-wrap justify-between mlg:flex-nowrap mlg:items-center">
      <div class="flex items-center justify-between w-full h-20 px-4 py-2 border-b-4 border-red-500 mlg:p-4 mlg:w-auto mlg:border-none lg:h-auto">
        <a href="{{ home_url() }}">
          <img
            src="{{ $site['header_logo']->sizes->medium }}"
            alt="{{ $site['header_logo']->alt }}"
            width="{{ $site['header_logo']->width }}"
            height="{{ $site['header_logo']->height }}"
            class="w-auto h-14 lg:h-auto lg:w-60"
          />
        </a>
        <nav class="hidden ml-12 mlg:flex" id="main-nav-wrapper" aria-label="Primary navigation">{!! wp_nav_menu(['theme_location' => 'main-navigation', 'menu_id' => 'main-nav']) !!}</nav>

        <button type="button" aria-label="Menu" class="flex flex-col items-end justify-center cursor-pointer toggleMobileNav em-burger mlg:hidden h-14 w-14">
          <span class="cheese"></span>
          <span class="lettuce"></span>
          <span class="patty"></span>
        </button>
      </div>

      <div id="search-form-wrapper" class="relative w-full h-12 mlg:w-80 xl:!w-96">
        <h2 class="sr-only">Search Form</h2>
        <form class="relative z-50 flex items-center w-full mlg:h-12 mlg:w-80 xl:!w-96" id="search-form" action="/" method="get">
          <input type="text" name="s" placeholder="Search" aria-label="Search" class="absolute inset-0 w-full h-12 py-2 pl-2 pr-12 bg-white border border-gray-50 border-x-0 mlg:border-x" />
          <button type="submit" aria-label="Submit" class="absolute top-0 bottom-0 right-0 flex items-center justify-center w-12 h-12 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 36.136 36.45"><defs><clipPath><rect data-name="Rectangle 7" width="36.136" height="36.45" fill="red"/></clipPath></defs><g data-name="Group 1" clip-path="url(#clip-path)"><path d="M22.089,26.545a14.219,14.219,0,0,1-18.861-3A14.461,14.461,0,0,1,4.14,4.309,14.125,14.125,0,0,1,22.306,2.491a14,14,0,0,1,6.02,9.094,14.441,14.441,0,0,1-2.091,10.824q4.414,4.328,8.852,8.682a3.076,3.076,0,0,1,.882,3.317,2.971,2.971,0,0,1-4.616,1.422c-.739-.611-1.4-1.324-2.074-2.006q-3.376-3.395-6.74-6.8c-.147-.149-.288-.305-.45-.479M14.311,4.559a9.875,9.875,0,1,0,9.777,9.861,9.849,9.849,0,0,0-9.777-9.861" transform="translate(0 0)" class="fill-gray-300 mlg:fill-red-500"/></g></svg>
          </button>
        </form>

        <div id="closeSearch" class="hidden fixed z-[60] top-0 right-[2px] p-0">
          <button type="button" aria-label="Close" class="flex flex-col items-center justify-center w-12 h-12 cursor-pointer em-x">
            <span class="left"></span>
            <span class="right"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</header>