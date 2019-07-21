@if($errors->any())
    <div class="alert alert-asa">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="white" aria-hidden="true">×</span>
        </button>
        <ul>
            @foreach($errors->all() as $error)
               <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif