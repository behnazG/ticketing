<?php
$genderList=[
    0=>trans('mb.unknown'),
    1=>trans('mb.man'),
    2=>trans('mb.woman')
]
?>
<label class="col-md-2 col-sm-3 label-control" for="gender">{{trans('mb.gender')}}</label>
<div class="col-md-4">
    <div class="row skin skin-square">
        @foreach($genderList as $index=>$value)
            <div class="col-md-4">
                <fieldset>
                    <input type="radio" id="gender" name="gender"
                           value="{{$index}}" {{old('type')==$index ?'checked':''}}>
                    <label for="gender">{{$value}}</label>
                </fieldset>
            </div>
        @endforeach
    </div>
</div>