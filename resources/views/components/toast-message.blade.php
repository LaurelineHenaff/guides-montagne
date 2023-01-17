@if (session()->has('toastMessage'))

  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="toast-message" class="toast" role="alert">
      <div class="toast-header">
        <i class="bi bi-check fs-2 text-success"></i>
        <strong class="me-auto">{{ session('toastTitle') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
      </div>
      <div class="toast-body">{{ session('toastMessage') }}</div>
    </div>
  </div>

  <script>
    const toast = new bootstrap.Toast(document.getElementById('toast-message'), {delay: 3000})
    toast.show()
  </script>

@endif
