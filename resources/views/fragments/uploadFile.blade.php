<div class="row">
    @if(!isset($showLabel)|| $showLabel==true)
        <label class="col-md-4 label-control"
               for="image_path">{{trans('mb.file')}}</label>
    @endif
    <div class="{{(!isset($showLabel)|| $showLabel==true)?"col-8":"col-12"}}">
        <div class="form-group row">
            <input type="file" class="d-none" name="{{$field_name}}" id="{{$field_name}}"
                   onchange="change_file(this.id)">
            <div class="div-upload-image m-auto" name="div_{{$field_name}}" id="div_{{$field_name}}"
                 onclick="open_file_window('{{$field_name}}');">
                <div class="div-upload-image-text">
                    <i class="h1 ft-file-plus text-light"></i>
                </div>
            </div>
            <div class="col-12 text-center mt-1">
                <div id="label_{{$field_name}}"></div>

            </div>

        </div>
    </div>
</div>

<script>
    function open_file_window(name) {
        var e = document.getElementById(name);
        e.click();
    }

    function change_file(ids) {
        var e = document.getElementById(ids);
        if (e.files[0].size > 102400) {
            e.value = "";
            var message="{{trans("mb.fileTooBig")}}!";
            var className="red";
        } else {
            var f_p = document.getElementById(ids).value;
            var message = f_p.replace(/^.*[\\\/]/, '');
            var className="primary";
        }
        /////////////////////////////////////////////////////////
        var l_name = "label_" + ids;
        var btn_str = '<button type="button" class="btn btn-sm btn-outline-light" onclick="delete_s(' + ids + ')"><i class="ft-x"></i></button>';
        document.getElementById(l_name).innerHTML = '<p class="'+className+'">'+message + ' ' + btn_str+'</p>';
    }
    function delete_s(ids) {
        var l_name = "label_" + ids.name;
        document.getElementById(l_name).innerHTML = "";
        ids.value = "";
        console.log(ids);
    }
</script>