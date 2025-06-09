@include('layouts.head')

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      @include('layouts.sidebar')

      <div class="layout-page">

        @include('layouts.navbar')

        <div class="content-wrapper">

          <!-- Main Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
          </div>
          <!-- /Main Content -->

          @include('layouts.footer')

          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  @include('layouts.scripts')
</body>
</html>
