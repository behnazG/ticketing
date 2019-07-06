<script>
    $(document).ready(function () {
        $(".delete_button").on('click', function () {
            var r = confirm('<?php echo e(trans('mb.messageDeleteModel',['name'=>$title])); ?>');
            if (r == true) {
                var id = $(this).data('id');
                var token = $(this).data('token');
                var url = "<?php echo e($url); ?>";
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
                            alert("<?php echo e(trans('mb.successDeleteModel',['name'=>$title])); ?>");
                            var row_id = "row_" + id;
                            $('#' + row_id).hide();
                        }
                    });
            }

        });
    });
</script><?php /**PATH D:\xampp\htdocs\asa\resources\views/fragments/js/delete.blade.php ENDPATH**/ ?>