<script>
    $(document).ready(function () {
        $(".delete_button").on('click', function () {
            var r = confirm('{{trans('mb.messageDeleteModel',['name'=>$title])}}');
            if (r == true) {
                var id = $(this).data('id');
                var token = $(this).data('token');
                var url = "{{$url}}";
                $.ajax(
                    {
                        url: url + "/" + id,
                        type: 'delete',
                        data: {
                            "id": id,
                            "_method": 'DELETE',
                            "_token": token,
                        },
                        success: function () {
                            alert("{{trans('mb.successDeleteModel',['name'=>$title])}}");
                            var row_id = "row_" + id;
                            $('#' + row_id).hide();
                        }
                    });
            }

        });
    });
</script>