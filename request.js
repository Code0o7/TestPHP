
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
        dataType : "text",
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
            console.log("请求成功");
            successFunc ? successFunc(data) : "";
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