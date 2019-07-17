<script>
    $(document).ready(function () {
        setInterval(function () {
            $.ajax({
                type: 'get',
                url: '/refreshTopMenuTicket',
                success: function (result) {
                    //console.log(result);
                    var ticket = JSON.parse(result);
                    ////////////////////////////////////
                    var str = '';
                    var topmenu_number_email = 0;
                    ticket.forEach(function (item, index, arr) {
                        topmenu_number_email++;
                        str = str + '<li class="scrollable-container media-list w-100">\n' +
                            '    <a href="tickets/' + item["id"] + '">\n' +
                            '        <div class="media">\n' +
                            '            <div class="media-body">\n' +
                            '                <h6 class="media-heading text-bold-700">' + item["name"] + '<i\n' +
                            '                            class="ft-circle font-small-2 ' + item["status_color"] + ' float-right"></i></h6>\n' +
                            '                <p class="notification-text font-small-3 text-muted text-bold-600">\n' +
                            '                    ' + item["subject"] + '...</p>\n' +
                            '                <small>\n' +
                            '                    <time class="media-meta text-muted"\n' +
                            '                          datetime="2015-06-11T18:29:20+08:00">' + item["date"] + '\n' +
                            '                    </time>\n' +
                            '                </small>\n' +
                            '            </div>\n' +
                            '        </div>\n' +
                            '    </a>\n' +
                            '</li>';
                    });
                    $('#top_ticket_list').html(str);
                    $("#topmenu_number_email").html(topmenu_number_email);

                }
            });
        }, 3000000);
        setInterval(function () {
            $.ajax({
                type: 'get',
                url: '/refreshTopMenuNotify',
                success: function (result) {
                    var result = JSON.parse(result);
                    var div_content = "";
                    var tickets_duration = result[1]["tickets_duration"];
                    var counter = 0;
                    console.log(result);
                    //////////////////////////////////////////////////////////////////////////
                    tickets_duration.forEach(function (item, index, arr) {
                        var subject = "<?php echo e(trans("mb.notify_expire_date_ticket_subject")); ?> " + " " + item.id;
                        var icon = "<i class='fa fa-user'></i>";
                        var content = "<?php echo e(trans("mb.notify_expire_date_ticket_text")); ?>";
                        var url = "tickets/" + item.id_coder;
                        div_content = div_content + create_notify_div();
                        notifyMe(subject, icon, content, url);
                        counter++;
                    });
                    var tickets_expire_date = result[1]["tickets_expire_date"];
                    tickets_expire_date.forEach(function (item, index, arr) {
                        var subject = "<?php echo e(trans("mb.notify_expire_date_ticket_subject")); ?> " + " " + item.id;
                        var icon = "<i class='fa fa-user'></i>";
                        var content = "<?php echo e(trans("mb.notify_expire_date_ticket_text")); ?>";
                        var url = "tickets/" + item.id_coder;
                        div_content = div_content + create_notify_div(item.subject, item.text);
                        notifyMe(subject, icon, content, url);
                        counter++;
                    });
                    /////////////////////////////////////////////////////////////////////////////////////////
                    $("#top_notify_list").html(div_content);
                    $("#topmenu_number_notify").html(counter);
                }
            });
        }, 3000000);
    })
    ;
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (!Notification) {
            alert('Desktop notifications not available in your browser. Try Chromium.');
            return;
        }

        if (Notification.permission !== 'granted')
            Notification.requestPermission();
    });

    function notifyMe(notify_title = "", notify_icon, notify_text, url) {
        if (Notification.permission !== 'granted')
            Notification.requestPermission();
        else {
            var notification = new Notification(notify_title, {
                icon: notify_icon,
                body: notify_text,
            });

            notification.onclick = function () {
                window.open(url);
            };
        }
    }

    function create_notify_div(subject, text, icons) {
        var str = ' <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">\n' +
            '                                        <div class="media">\n' +
            '                                            <div class="media-left align-self-center"><i\n' +
            '                                                        class="ft-share info font-medium-4 mt-2"></i></div>\n' +
            '                                            <div class="media-body">\n' +
            '                                                <h6 class="media-heading info">' + subject + '</h6>\n' +
            '                                                <p class="notification-text font-small-3 text-muted text-bold-600">' + text + '</p>\n' +
            '                                            </div>\n' +
            '                                        </div>\n' +
            '                                    </a>\n' +
            '                                </li>';
        return str;
    }
</script>



<?php /**PATH D:\xampp\htdocs\asa\resources\views/fragments/js/ajax_blayout.blade.php ENDPATH**/ ?>