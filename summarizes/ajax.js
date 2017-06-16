
$.ajax(
    {
        type: "POST",
        url: '/shop/shopcontract/getcountermanidajax',
        data: {'msg':file.value},
        //data: {['bank':bank],['province',province],['city',city]},
        dataType: "json",
        beforeSend: function () {
        },
        success: function (result) {
            if(result==0){}
        }
    }
);
