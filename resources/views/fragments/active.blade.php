@isset($showActiveMessage)
    @if($showActiveMessage==1)
        <span class="success"><i class="ft-check-square"></i> {{__('mb.showHomePage')}}</span>
    @else
        <span class="danger"><i class="ft-square"></i> {{__('mb.dontShow')}}</span>
    @endif
@else
    @if(isset($showLabel) && $showLabel==true)
        <label class="col-md-2 label-control"></label>
    @endif
    <div class="col-md-4">
        <div class="row skin skin-square">
            <div class="col-md-12 col-sm-12">
                <fieldset>
                    <input type="checkbox" name="active" id="active" {{old('active')==1 ?'checked':''}} >
                    <label for="active"
                           id="label_active">{{(old('active')==1)?trans('mb.show'):trans('mb.hide')}}</label>
                </fieldset>
            </div>
        </div>
    </div>
@endisset
