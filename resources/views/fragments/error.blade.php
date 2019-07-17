@if($errors->any())
    <div class="alert alert-asa">
        <ul>
            @foreach($errors->all() as $error)
               <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif