(function($) {
    $(function() {

        $('.button-collapse').sideNav();
        $('.parallax').parallax();

    }); // end of document ready
})(jQuery); // end of jQuery name space

function checkform()
{
    re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (!(re.test(jQuery("#email").val()))) {
        jQuery("#result").empty().append("请输入一个有效的邮箱");
        jQuery("#email").focus();
        return false;
    }

    if (jQuery("#attribute1").val() == "") {
        jQuery("#result").empty().append("请输入您的名字");
        jQuery("#attribute1").focus();
        return false;
    }

    return true;
}

function submitForm() {
    successMessage = '谢谢您的订阅。请去您的邮箱查看确认邮件.';
    data = jQuery('#subscribeform').serialize();
    jQuery.ajax({
        type: 'POST',
        data: data,
        url: 'http://www.vividwa.com.au/lists/?p=asubscribe&id=1',
        dataType: 'html',
        success: function(data, status, request) {
            alert(successMessage);
            jQuery('#email').val('');
            jQuery('#attribute1').val('');
            jQuery("#result").empty();
        },
        error: function(request, status, error) {
            alert('很抱歉，我们的系统的发生了故障，请联系我们的公司客服中心');
        }
    });
}

