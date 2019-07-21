@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="white" aria-hidden="true">×</span>
        </button>
        {{ Session::get('message') }}
    </p>
@endif