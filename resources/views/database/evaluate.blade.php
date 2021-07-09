@extends('layouts.default')
@section('content')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ URL::to('/') }}">Tổng quan</a>
        </li>
        <li class="active">Đánh giá</li>
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
            Database <a class="btn btn-sm btn-primary blue" href="#modal-form" role="button" data-toggle="modal"><i class="ace-icon fa fa-bolt bigger-110"></i> Công thức <i class="ace-icon fa fa-arrow-right icon-on-right"></i></a>
        </h1>
        <div id="modal-form" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="blue bigger">Phân tích dữ liệu văn bản và trích xuất thông tin</h4>
                    </div>
                    <div class="modal-body">
                        <div class="bootbox-body">
                            <span class="bigger-110">
                                <b>1. Trích xuất thông tin</b><br/>
                                Trích xuất thông tin (Information Retrieval - IR) là một khái niệm được phát triển song song với các hệ thống cơ sở dữ
                                liệu. Tuy nhiên, không giống như hệ thống cơ sở dữ liệu chủ yếu tập trung vào việc truy vấn và xử lý giao tác của dữ liệu
                                cấu trúc, IR quan tâm tới việc tổ chức và trích xuất thông tin từ một lượng lớn các văn bản. Như vậy IR và các hệ thống cơ sở
                                dữ liệu tập trung vào những loại dữ liệu hoàn toàn khác nhau, một số bài toán quan trọng cần phải tính đến trong cơ sở dữ liệu nhưng lại không cần phải quan tâm trong IR, ví dụ như điều khiển tương
                                tranh, khôi phục và quản lý giao tác... Ngược lại, có một số bài toán trong IR nhưng trong cơ sở dữ liệu lại không vướng phải, chẳng hạn xử lý văn bản phi
                                cấu trúc hoặc tìm kiếm xấp xỉ dựa vào từ khóa.<br/>
                                <b>2. Độ đo cơ bản cho trích xuất văn bản</b><br/>
                                Giả sử một hệ thống trích xuất văn bản trả về một tâp tài liệu dựa vào truy vấn đầu vào. Câu hỏi đặt ra là làm cách nào chúng ta đánh giá được độ chính xác hoặc độ đúng đắn của hệ thống.
                                Gọi tập các tài liệu có liên quan đến câu truy vấn là {Relevant}, tập các tài liệu được trích xuất trả về là {Retrieval}. Tập các tài liệu vừa có liên quan vừa được trích xuất trả
                                về sẽ được ký hiệu là {Relevant} ∩ {Retrieval}. Có hai độ đo cơ bản cho việc đánh giá chất lượng trích xuất văn bản:<br/>
                                <b>Precison:</b> là tỷ lệ các tài liệu được trả về thực sự có liên quan đến tài liệu truy vấn<br/>
                                precision = |{Relevant} ∩ {Retrieval}| / |{Retrieval}|<br/>
                                <b>Recall:</b> là tỷ lệ các tài liệu có liên quan đến tài liệu truy vấn và trên thực tế được trích xuất trả về.<br/>
                                recall = |{Relevant} ∩ {Retrieval}| / |{Relevant}|<br/>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            Lọc theo:
            <form action="{{ URL::to('/evaluate') }}" method="get">
            {{ csrf_field() }}
            <div class="radio">
                <label>
                    <input name="type" type="radio" class="ace" value="shop" <?php echo (isset($_GET['type']) && $_GET['type']=='shop') ? 'checked' : ''; ?>/>
                    <span class="lbl"> Shop</span>
                </label>
                <label>
                    <input name="type" type="radio" class="ace" value="forum" <?php echo (isset($_GET['type']) && $_GET['type']=='forum') ? 'checked' : ''; ?>/>
                    <span class="lbl"> Rao vặt</span>
                </label>
                <label>
                    <button type="submit" class="btn btn-sm btn-inverse btn-white">
                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                        Tìm kiếm
                    </button>
                </label>
            </div>
            </form>
            <!-- PAGE CONTENT BEGINS -->
            <table id="simple-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tên database</th>
                        <th>Tên collection</th>
                        <th>Độ chính xác</th>
                        <th>Độ bao phủ</th>
                        <th>Ghi chú</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursor as $p)
                        <tr>
                            <td>{{ $p['database'] }}</td>
                            <td>{{ $p['collection'] }}</td>
                            <td>{{ ($p['precision']!='N/A')?$p['precision'].' %':$p['precision'] }}</td>
                            <td>{{ ($p['recall']!='N/A')?$p['recall'].' %':$p['recall'] }}</td>
                            <td>{{ isset($p['note']) ? $p['note'] : '' }}</td>
                            <td><a class="btn btn-white btn-yellow btn-minier" href="#modal-note{{ $p['_id'] }}" role="button" data-toggle="modal">
                                    <i class="ace-icon fa fa-pencil  bigger-110 icon-only"></i>
                                </a></td>
                        </tr>
                        <form action="{{ URL::to('/note_evaluate/'.$p['_id']) }}" method="post">
                            {{ csrf_field() }}
                            <div id="modal-note{{ $p['_id'] }}" class="modal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="blue bigger">Ghi chú</h4>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="form-control" id="form-field-8" placeholder="Default Text" name="note">{{ isset($p['note']) ? $p['note'] : '' }}</textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button data-bb-handler="confirm" type="submit" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </tbody>
            </table>
            <!-- PAGE CONTENT ENDS -->
        </div>
    </div>
</div>
@endsection