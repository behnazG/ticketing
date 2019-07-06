<div class="col-10 offset-1">
    <div class="card-content collpase show">
        <div class="card-body">
            <div class="card-text">
                @include('fragments.error')
            </div>
            <form class="form form-horizontal" action="{{url("/tickets/reffral/$ticket->id")}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @isset($ticket->id)
                    {{method_field('PUT')}}
                @endisset
                <input type="hidden" name="user_id" id="user_id" value="{{auth::user()->id}}">
                <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket->ticket_id}}">
                <div class="form-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                                    <textarea name="comment" id="comment" class="form-control">
                                       {{old('comment')}}
                                    </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <select class="form-control" name="receiver_id" id="receiver_id">
                                <option></option>
                                @foreach($authorise_user_reffral  as $user)
                                    @if($current_user->id != $user->id)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                @include('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'])
            </form>
        </div>
    </div>
</div>