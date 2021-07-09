@extends('layouts.default')
@section('content')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ URL::to('/') }}">Tổng quan</a>
        </li>
        <li class="active">Tool cập nhật</li>
    </ul><!-- /.breadcrumb -->

    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="ace-icon fa fa-search nav-search-icon"></i>
            </span>
        </form>
    </div><!-- /.nav-search -->
</div>

<div class="page-content">
    <div class="page-header">
        <h1>
            Collection
            <small>
                <i class="ace-icon fa fa-angle-right"></i>&nbsp;
                Thêm column
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="database"> Tên database </label>
                    <div class="col-sm-9">
                        <input type="text" id="database" placeholder="Ví dụ: mydb" class="col-xs-10 col-sm-5" name="database"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="collection"> Tên collection </label>
                    <div class="col-sm-9">
                        <input type="text" id="collection" placeholder="Ví dụ: users" class="col-xs-10 col-sm-5" name="collection"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="column"> Tên column </label>
                    <div class="col-sm-9">
                        <input type="text" id="column" placeholder="Ví dụ: salary" class="col-xs-10 col-sm-5" name="column"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="column"> Giá trị mặc định </label>
                    <div class="col-sm-9">
                        <input type="text" id="column" placeholder="Ví dụ: true" class="col-xs-10 col-sm-5" name="default_value"/>
                    </div>
                </div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-success" type="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Thêm column
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Làm lại
                        </button>
                    </div>
                </div>
            </form>
            <!-- PAGE CONTENT ENDS -->
        </div>
    </div>
</div>
@endsection