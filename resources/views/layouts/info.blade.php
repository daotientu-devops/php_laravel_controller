<?php
    sleep(1);
    $time = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
?>
<div class="rơw">
    <div class="col-xs-12" style="margin-top:20px">
        <div class="alert alert-block alert-info" style="margin-bottom:10px">
            <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            <p><strong><i class="ace-icon fa fa-info-circle"></i> Request method : </strong>{{ $_SERVER['REQUEST_METHOD'] }}</p>
        </div>
        <div class="alert alert-block alert-info" style="margin-bottom:10px">
            <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            <p><strong><i class="ace-icon fa fa-info-circle"></i> Query string : </strong>{{ empty($_SERVER['QUERY_STRING']) ? '/' : $_SERVER['QUERY_STRING'] }}</p>
        </div>
        <div class="alert alert-block alert-info" style="margin-bottom:10px">
            <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            <p><strong><i class="ace-icon fa fa-info-circle"></i> Request uri : </strong>{{ $_SERVER['REQUEST_URI'] }}</p>
        </div>
        <div class="alert alert-block alert-info" style="margin-bottom:10px">
            <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            <p><strong><i class="ace-icon fa fa-info-circle"></i> Script name : </strong>{{ $_SERVER['SCRIPT_NAME'] }}</p>
        </div>
        <div class="alert alert-block alert-info" style="margin-bottom:10px">
            <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            <p><strong><i class="ace-icon fa fa-info-circle"></i> Php self : </strong>{{ $_SERVER['PHP_SELF'] }}</p>
        </div>
        <div class="alert alert-block alert-info" style="margin-bottom:10px">
            <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            <p><strong><i class="ace-icon fa fa-info-circle"></i> Request time : </strong>{{ $time }} s</p>
        </div>
    </div>
</div>