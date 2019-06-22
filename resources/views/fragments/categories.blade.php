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
$model_categories_list = [];
foreach ($model_categories as $qq) {
array_push($model_categories_list,$qq->category_id);
}
?>
<label class="col-md-2 label-control"
       for="category">{{trans('mb.category')}}</label>
<div class="col-md-10">
    <select id="category" name="category[]" class="select2 form-control" multiple="multiple">
        @foreach($list_categories as $ll)
            <optgroup label="{{$ll[0]}}">
                @foreach($ll as $key=>$value)
                    @if($key !=0)
                        <option value="{{$key}}" {{((old("category")!=null && in_array($key,old("category")))||(is_null(old("category")) && in_array($key,$model_categories_list)))?"selected":""}} >{{$value}}</option>
                    @endif
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>