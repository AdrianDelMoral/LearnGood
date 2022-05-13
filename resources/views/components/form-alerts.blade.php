<div>
    @if (Session::has('createMsj'))
        <div class="alert alert-success h5">
            {{ Session::get('createMsj') }}
        </div>
    @endif

    @if (Session::has('updateMsj'))
        <div class="alert alert-warning h5">
            {{ Session::get('updateMsj') }}
        </div>
    @endif

    @if (Session::has('errorMsj'))
        <div class="alert alert-danger h5">
            {{ Session::get('errorMsj') }}
        </div>
    @endif
</div>
