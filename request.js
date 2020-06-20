
var loadCoverIndex;
// 显示hud
function showHud() {
    layui.use('layer', function() {
        var layer = layui.layer;
        layer.ready(function () {
            loadCoverIndex = layer.load(0,{
                shade: [0.6, '#FFF'],
                shadeClose: true
            });
        });
    });
};

// 隐藏hud
function hideHud() {
    layui.use('layer', function() {
        var layer = layui.layer;
        layer.ready(function () {
            layer.close(loadCoverIndex);
        });
    });
}

/**
 * 显示提示信息
 * @param message
 */
function toast(message,success=true) {
    layui.use('layer',function () {
        var layer = layui.layer;
        if (typeof message == 'string'){
            var time = message.length * 0.3 * 1000;
            var skin = success ? "" : "toast-fail-style";
            layer.msg(message, {
                // 多长事件后自动关闭(ms)
                time: time,
                offset: 'auto',
                skin: skin
            });
        }
    });
}

// 发送网络请求
function sendRequest(url,successFunc=null,failFunc=null,showToast=false,hud=true) {
    if (hud){
        showHud();
    }
    $.ajax({
        type : "GET",
        url : url,
        cache : false,
        async : true,
        timeout: 10000,
        dataType : "json",
        beforeSend:function (jqxhr,settings) {
            jqxhr.requestURL = url;
        },
        complete: function () {
            console.log("请求完成");
            if (hud){
                hideHud();
            }
        }
        ,success: function (data,state,xhr) {
            var message = typeof(data.data) == 'string' ? data.data : data.message;
            if (data.code == 200){
                showToast ? toast(message) : "";
                successFunc ? successFunc(data) : "";

            }else if(data.code != 200){
                // 提示失败信息
                toast(message,false);
            }
        },
        error: function (xhr,textStatus,errorMessage) {
            console.log("请求失败:" + errorMessage);
            if (showToast){
                toast("请求服务器失败");
            }

            if (failFunc){
                failFunc();
            }
        }
    });
}