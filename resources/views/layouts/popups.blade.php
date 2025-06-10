@if (session('success') || session('error') || $errors->any())
  <div class="px-4 pt-3">
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show auto-dismiss" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if (session('error') || $errors->any())
      <div class="alert alert-danger alert-dismissible fade show auto-dismiss" role="alert">
        @if ($errors->any())
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
  </div>

  <script>
    setTimeout(function () {
      document.querySelectorAll('.auto-dismiss').forEach(function (alert) {
        alert.classList.remove('show');
        alert.classList.add('fade');
        setTimeout(() => alert.remove(), 500); // Remove after fade-out
      });
    }, 1000); // 1 second delay
  </script>
@endif
