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
                    Trạng thái dữ liệu
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <span class="label label-success">1: Đã lấy URL</span> &rarr;
                <span class="label label-danger">2: Đã lấy content</span> &rarr;
                <span class="label label-primary">3: Đã làm sạch dữ liệu</span> &rarr;
                <span class="label label-yellow">4: Đã lấy giá sản phẩm</span> &rarr;
                <span class="label label-inverse">5: Đã xếp hạng sản phẩm</span>
                <table id="simple-table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Tên database</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($list_websites as $web) { ?>
                        <tr>
                            <td>{{ $web['database'] }}</td>
                            <td>
                            <?php
                            switch ($web['status']) {
                                case 1:
                                    echo '<span class="label label-success">1: Đã lấy URL</span>';
                                    break;
                                case 2:
                                    echo '<span class="label label-danger">2: Đã lấy content</span>';
                                    break;
                                case 3:
                                    echo '<span class="label label-primary">3: Đã làm sạch dữ liệu</span>';
                                    break;
                                case 4:
                                    echo '<span class="label label-yellow">4: Đã lấy giá sản phẩm</span>';
                                    break;
                                default:
                                    echo '<span class="label label-default">Chưa được xử lý</span>';
                                    break;
                            }
                            ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <!-- PAGE CONTENT ENDS -->
            </div>
        </div>
    </div>
@endsection