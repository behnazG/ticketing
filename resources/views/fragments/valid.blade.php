@isset($showValidMessage)
    @if($showValidMessage==1)
        <span class="success"><i class="ft-check-square"></i> {{__('mb.valid')}}</span>
    @else
        <span class="danger"><i class="ft-square"></i> {{__('mb.invalid')}}</span>
    @endif
@else
    @if(!isset($showLabel) || $showLabel==true)
        <label class="col-md-2 label-control">{{trans('mb.validStatus')}}</label>
    @endif
    <div class="col-md-4">
        <div class="row skin skin-square">
            <div class="col-md-12 col-sm-12">
                <fieldset>
                    <input type="checkbox" name="valid"
                           id="valid" {{(old('valid')==1 ||(isset($isValid)&&$isValid==1)) ?'checked':''}} >
                    <label for="valid"
                           id="label_valid">{{(old('valid')==1||(isset($isValid)&&$isValid==1))?trans('mb.valid'):trans('mb.invalid')}}</label>
                </fieldset>
            </div>
        </div>
    </div>
@endisset
