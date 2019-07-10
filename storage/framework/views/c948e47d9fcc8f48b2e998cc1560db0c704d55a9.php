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
        }, 3000);
        // setInterval(function () {
        //     $.ajax({
        //         type: 'get',
        //         url: '/refreshTopMenuNotify',
        //         success: function (result) {
        //             alert(result);
        //         }
        //     });
        // }, 100000);
    });
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

    function notifyMe() {
        if (Notification.permission !== 'granted')
            Notification.requestPermission();
        else {
            var notification = new Notification('Notification title', {
                icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
                body: 'Hey there! Youve been notified!',
            });

            notification.onclick = function () {
                window.open('http://stackoverflow.com/a/13328397/1269037');
            };
        }
    }
</script>



<?php /**PATH D:\xampp\htdocs\asa\resources\views/fragments/js/ajax_blayout.blade.php ENDPATH**/ ?>