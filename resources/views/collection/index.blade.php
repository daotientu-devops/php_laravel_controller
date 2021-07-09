@extends('layouts.default')
@section('content')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ URL::to('/') }}">Tổng quan</a>
            </li>
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
                    Đánh chỉ mục dữ liệu
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <!-- PAGE CONTENT BEGINS -->
            <?php
              if (null !== Session::get('note') && time() - Session::get('last_activity') < 5*60 ) { ?>
            <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                    <p>
                  <?php echo Session::get('note'); ?>
                    </p></div>
            <?php
              }
            ?>
            <form method="post">
                {{ csrf_field() }}
            <div class="col-xs-4">
                <select name="database" class="form-control">
                    @foreach($database as $data)
                        <option value="{{ $data['_id'] }}">{{ $data['database'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-4">
                <select name="collection" class="form-control">
                    <option value="dienthoai">Điện thoại</option>
                    <option value="maytinh">Máy tính</option>
                </select>
            </div>
            <div class="col-xs-4">
                <button class="btn btn-white btn-primary btn-bold" type="submit">
                    <i class="ace-icon fa fa-mouse-pointer primary"></i>
                    Index
                </button>
            </div>
            </form>
            <div class="col-xs-8">
                <a href="{{ URL::to('/index_all') }}" class="btn btn-white btn-success btn-bold btn-block" type="submit">
                    <i class="ace-icon fa fa-mouse-pointer primary"></i>
                    Index All
                </a>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div>
    </div>
@endsection