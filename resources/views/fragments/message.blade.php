@if(Session::has('message'))
    @if( Session::get('message')==1)
        <div class="alert  bg-success alert-icon-left alert-dismissible mb-2" role="alert">
							<span class="alert-icon">
								<i class="ft-thumbs-up"></i>
							</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{trans("mb.wellDone")}}</strong> {{trans('mb.success',["modelName"=>Session::get('modelName')])}}
            <a href="#" class="alert-link">important</a> alert message.
        </div>
    @elseif(Session::get('message')==0)
        <div class="alert  bg-asa alert-icon-left alert-dismissible mb-2" role="alert">
							<span class="alert-icon">
								<i class="ft-thumbs-down"></i>
							</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{trans("mb.sorry")}}</strong> {{trans('mb.success',["modelName"=>Session::get('modelName')])}}
            <a href="#" class="alert-link">few things up</a> and submit again.
        </div>
    @else
        <div class="alert  alert-{{ Session::get('alert-class', 'info') }} alert-icon-left alert-dismissible mb-2"
             role="alert">
							<span class="alert-icon">
								<i class="ft-info"></i>
							</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{ Session::get('message') }}
        </div>
    @endif
@endif