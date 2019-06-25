<?php
$list_categories = [];
foreach ($categories as $category) {
    $index = $category->id;
    $value = $category->name;
    if ($category->parent == 0)
        $list_categories[$index][0] = $value;
    else {
        $p = $category->parent;
        $list_categories[$p][$index] = $value;
    }
}
?>
<label class="col-md-2 label-control"
       for="category_id">{{trans('mb.category')}}</label>
<div class="col-md-4">
    <select id="category_id" name="category_id" class="select2 form-control">
        @foreach($list_categories as $ll)
            <optgroup label="{{$ll[0]}}">
                @foreach($ll as $key=>$value)
                    @if($key !=0)
                        <option value="{{$key}}" {{((old("category_id")==$key)||(!old("category_id") && $key==$model_categories->category_id))?"selected":""}} >{{$value}}</option>
                    @endif
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>