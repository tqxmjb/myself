  //验证 业务员 格式 并查找 业务员姓名 select_countermanidd
    function select_countermanid(file){
        if(!countermanidreg.test(file.value)){
            file.style.borderColor="#A94442";
            counterman = false;
            //countermanmsg.innerText="<i><u>设置或获取位于对象起始和结束标签内的文本.</u></i>";
            document.getElementById('countermanmsg').innerHTML="业务员ID错误";
        }else{
            //根据业务员ID查找姓名
            $.ajax(
                {
                    type: "POST",
                    url: '/shop/shopcontract/getcountermanidajax',
                    data: {'msg':file.value},
                    //data: {['bank':bank],['province',province],['city',city]},
                    asynic: false,
                    dataType: "json",
                    beforeSend: function () {
                    },
                    success: function (result) {
                        if(result==0){
                            //alert("业务员没东西");
                            counterman = false;
                            document.getElementById('countermanmsg').innerHTML="未找到ID为:";
                            document.getElementById('countermanmsg').innerHTML+=file.value;
                            document.getElementById('countermanmsg').innerHTML+="的业务员！";
                        }else{
                            //alert("业务员有东西");
                            //alert(result['name']);
                            counterman = true;
                            document.getElementById('countermanmsg').innerHTML=result['name'];
                            file.style.borderColor="#ddd";
                        }
                    }
                }
            );

        }
    }