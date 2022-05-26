<div>
    <!-- Warning Alert -->
    @if (Session::has('createMsj'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center fade show h7">
            <i class="fa-solid fa-2xl fa-circle-check"></i>
            <span class="mx-2"></span> {{ Session::get('createMsj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Update Alert -->
    @if (Session::has('updateMsj'))
        <div class="alert alert-info alert-dismissible d-flex align-items-center fade show h7">
            <i class="fa-solid fa-2xl fa-pen-to-square"></i>
            <span class="mx-2"></span> {{ Session::get('updateMsj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Error Alert -->
    @if (Session::has('errorMsj'))
        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show h7">
            <i class="fa-solid fa-2xl fa-trash-can"></i>
            <span class="mx-2"></span> {{ Session::get('errorMsj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Warning Alert -->
    @if (Session::has('warningMsj'))
        <div class="alert alert-warning alert-dismissible d-flex align-items-center fade show">
            <i class="fa-solid fa-2xl fa-triangle-exclamation"></i>
            <span class="mx-2"></span> {{ Session::get('warningMsj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- infoErrorMsj --}}

    <!-- Info Error -->
    @if (Session::has('infoErrorMsj'))
        <div class="alert alert-info alert-dismissible d-flex align-items-center fade show">
            <i class="fa-solid fa-2xl fa-circle-info"></i>
            <span class="mx-2"></span> {{ Session::get('infoErrorMsj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</div>




