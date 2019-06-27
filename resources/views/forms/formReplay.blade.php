<div class="card-content collpase show">
    <div class="card-body">
        <div class="card-text">
            @include('fragments.error')
        </div>
        <form class="form form-horizontal" action="{{url("/tickets/replay/$ticket->id")}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @isset($ticket->id)
                {{method_field('PUT')}}
            @endisset
            <input type="hidden" name="sender_id" id="sender_id" value="{{auth::user()->id}}">
            <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket->ticket_id}}">
            <div class="form-body">
                <div class="form-group row">
                    <div class="col-md-12">
                                    <textarea name="text" id="text" class="form-control">
                                       {{$ticket->text??old('text')}}
                                    </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 form-group">
                        <blockquote class="blockquote pl-1 border-left-red border-left-3 mt-1">
                            <ul>
                                <li> سایز فایل ها حداکثر 200 کیلوبایت باید باشد.</li>
                                <li> نوع فایل ها باید xls, xlm, xla, xlc, xlt, xlw, xlam, xlsb, xlsm, xltm, xlsx,
                                    doc, csv, docx, ppt, txt, text, bmp, gif, jpeg, jpg, jpe, png, rtf باشد
                                </li>
                            </ul>
                        </blockquote>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4 col-md-6 col-12">@include('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_1"])</div>
                    <div class="col-lg-4 col-md-6 col-12">@include('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_2"])</div>
                    <div class="col-lg-4 col-md-6 col-12">@include('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_3"])</div>
                </div>

            </div>
            @include('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'])
        </form>
    </div>
</div>