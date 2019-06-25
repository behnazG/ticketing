<div class="row justify-content-md-center">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="horz-layout-card-center">{{$formTitle}}</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="card-text">
                        @include('fragments.error')
                    </div>
                    <form class="form form-horizontal" action="{{url("/tickets/$ticket->id")}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @isset($ticket->id)
                            {{method_field('PUT')}}
                        @endisset
                        <input type="hidden" name="sender_id" id="sender_id" value="{{auth::user()->id}}">
                        <input type="hidden" name="valid" id="valid" value="1">
                        <input type="hidden" name="status" id="status" value="0">
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-2 label-control"
                                       for="organizational_chart_id">{{trans('mb.organizationChart')}}</label>
                                <div class="col-md-4">
                                    <select class="form-control select2" name="organizational_chart_id"
                                            id="organizational_chart_id">
                                        <option></option>
                                        @foreach($organizational_charts as $organization_chart)
                                            <option value="{{$organization_chart->id}}"
                                                    {{(old("organizational_chart_id")==$organization_chart->id ||(!old('organizational_chart_id') && $ticket->organizational_chart_id && $ticket->organizational_chart_id==$organization_chart->id)) ?"selected":""}}
                                            >{{$organization_chart->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                @include('fragments.categories',['model_categories'=>$ticket])
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="subject">{{trans('mb.subject')}}</label>
                                <div class="col-md-8">
                                    <input type="text" id="subject" class="form-control"
                                           placeholder="{{trans('mb.subject')}}"
                                           name="subject" value="{{$ticket->subject??old('subject')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="text">{{trans('mb.text')}}</label>
                                <div class="col-md-10">
                                    <textarea name="text" id="text" class="form-control">
                                       {{$ticket->text??old('text')}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 label-control" for="text">{{trans('mb.fileUpload')}}</label>
                                <div class="col-lg-10 col-12 row">
                                    <div class="col-12 form-group">
                                        <blockquote class="blockquote pl-1 border-left-red border-left-3 mt-1">
                                          <ul>
                                              <li> سایز فایل ها حداکثر 200 کیلوبایت باید باشد.</li>
                                              <li> نوع فایل ها باید xls, xlm, xla, xlc, xlt, xlw, xlam, xlsb, xlsm, xltm, xlsx, doc, csv, docx, ppt, txt, text, bmp, gif, jpeg, jpg, jpe, png, rtf باشد</li>
                                          </ul>
                                        </blockquote>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">@include('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_1"])</div>
                                    <div class="col-lg-4 col-md-6 col-12">@include('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_2"])</div>
                                    <div class="col-lg-4 col-md-6 col-12">@include('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_3"])</div>
                                </div>
                            </div>
                            <div class="form-group row">
                            </div>

                        </div>
                        @include('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>