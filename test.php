<script>
    function Itest(r){
        var n="";
        for(i=0;i<r.length;++i)
            n+=String.fromCharCode(128^r.charCodeAt(i));
        return n
    }
</script>

<?php

function contentDecode($content){
    $str2 = "<script>var str = Itest('$content'); document.write(str);</script>";
    return $str2;
}


$str = "勧恅澔繎悧憟鹑亝蠜姳肁庈蠫苲實疟赟躪噞嬶ﾌ枀咎轘繙亊丆￞";
echo contentDecode($str);

?>


