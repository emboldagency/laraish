<div id="mobile-nav" class="fixed inset-0 pl-[20vw] z-50">
  <nav class="w-full h-full bg-gray-600" id="mobile-nav-wrapper" aria-label="Mobile navigation" tabindex="-1">
    <div id="mobile-nav-header" class="flex justify-end px-2 py-3 border-b border-gray-100">
      <button type="button" aria-label="Close" class="flex flex-col items-center justify-center w-10 h-10 cursor-pointer toggleMobileNav em-x md:hidden">
        <span class="left"></span>
        <span class="right"></span>
      </button>
    </div>
    {!! wp_nav_menu(['theme_location' => 'main-navigation', 'menu_id' => 'main-nav']) !!}
  </nav>
</div>