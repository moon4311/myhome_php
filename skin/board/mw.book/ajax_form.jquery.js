var reg_wr_subject_check = function() {
    $.ajax({
        type: 'POST',
        url: _skin_path+'/ajax_wr_subject_check.php',
        data: {
            'reg_wr_subject': unescape($('#reg_wr_subject').val()),
            'reg_bo_table': encodeURIComponent($('#reg_bo_table').val()),
            'chk_wr_subject': unescape($('#chk_wr_subject').val())
         },
        cache: false,
        async: false,
        success: function(result) {
            var msg = $('#msg_wr_subject');
            switch(result) {
                case '100' : msg.html('중복 원룸명이 있습니다.').css('color', 'red'); break;
                case '000' : msg.html('중복 원룸명이 없습니다.').css('color', 'blue'); break;
                case '120' : msg.html('원룸명 입력하세요.').css('color', 'red'); break;
                default : alert( '잘못된 접근입니다.\n\n' + result ); break;
            }
            $('#wr_subject_enabled').val(result);
        }
    });
}