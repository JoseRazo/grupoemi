@if (session('error'))
<div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
    <span class="fas fa-times-circle text-danger fs-5 me-3"></span>
    <div class="flex-fill">
        {{ session('error') }}
    </div>
    <button type="button" class="btn-close ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
