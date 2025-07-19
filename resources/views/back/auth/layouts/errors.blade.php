@if ($errors->any())
<div class="alert alert-danger alert-dismissible d-flex align-items-start" role="alert">
    <span class="fas fa-times-circle text-danger fs-5 me-3 mt-1"></span>
    <div class="flex-fill">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
    <button type="button" class="btn-close ms-3 mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
