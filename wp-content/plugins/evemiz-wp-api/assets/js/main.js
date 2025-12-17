jQuery(document).ready(function($){
    $('#myButton').on('click', function(){
        $.ajax({
            url: may_ajax_object .ajax_url, // این مقدار را با wp_localize_script ست کرده‌ای
            type: 'POST',
            datatype: 'json',
            data: {
                action: 'sum',
                num1: 5,
                num2: 7,
                // security: sum_ajax.nonce // اگر nonce اضافه کرده‌ای
            },
            success: function(response){
                console.log(response); // اینجا در کنسول چاپ می‌شود
                if(response.success){
                    console.log("Result:", response.data.result);
                    console.log("User ID:", response.data.user_id);
                }
            },
            error: function(xhr, status, error){
                console.error("AJAX Error:", error);
            }
        });
    });
});
