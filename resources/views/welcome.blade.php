@extends('layouts.default')
@section('content')
<?php //echo '<pre/>'; print_r($_SERVER); die(); ?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            Bảng điều khiển
        </li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Cấu hình kết nối (Server)
        </h1>
    </div><!-- /.page-header -->
    <div class="rơw">
        <div class="col-xs-12">
            <?php
            require '../autoload.php';
            ?>
            <!-- PAGE CONTENT BEGINS -->
            <div>
                <div id="user-profle-1" class="user-profile row">
                    <div class="col-xs-12 col-sm-3 center">
                        <div>
                            <span class="profile-picture">
                                <img id="avatar" class="editable img-responsive" alt="Robot"
                                src="{{ URL::to('assets/images/avatars/avatar.png') }}" width="180px"/>
                            </span>
                        </div>
                        <?php
                            $config = Config::get('database.default');
                            $connect = Config::get('database.connections');
                        ?>
                        <div class="space-6"></div>
                        <div class="profile-contact-infos">
                            <div class="profile-contact-links align-left">
                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}" class="btn btn-link">
                                    <i class="ace-icon fa fa-globe bigger-125 blue"></i>
                                    {{ $_SERVER['HTTP_HOST'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Database connection</div>
                                <div class="profile-info-value">{{ $_SERVER['DB_CONNECTION'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Database host</div>
                                <div class="profile-info-value">{{ $_SERVER['DB_HOST'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Database port</div>
                                <div class="profile-info-value">{{ $_SERVER['DB_PORT'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Database name</div>
                                <div class="profile-info-value">{{ $_SERVER['DB_DATABASE'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Database name</div>
                                <div class="profile-info-value">{{ $_SERVER['DB_DATABASE'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Server signature</div>
                                <div class="profile-info-value">{{ $_SERVER['SERVER_SIGNATURE'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Server software</div>
                                <div class="profile-info-value">{{ $_SERVER['SERVER_SOFTWARE'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Server name</div>
                                <div class="profile-info-value">{{ $_SERVER['SERVER_NAME'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Server address</div>
                                <div class="profile-info-value">{{ $_SERVER['SERVER_ADDR'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Server port</div>
                                <div class="profile-info-value">{{ $_SERVER['SERVER_PORT'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Remote address</div>
                                <div class="profile-info-value">{{ $_SERVER['REMOTE_ADDR'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Document root</div>
                                <div class="profile-info-value">{{ $_SERVER['DOCUMENT_ROOT'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Request scheme</div>
                                <div class="profile-info-value">{{ $_SERVER['REQUEST_SCHEME'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Context document root</div>
                                <div class="profile-info-value">{{ $_SERVER['CONTEXT_DOCUMENT_ROOT'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Script filename</div>
                                <div class="profile-info-value">{{ $_SERVER['SCRIPT_FILENAME'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Mysql home</div>
                                <div class="profile-info-value">{{ isset($_SERVER['MYSQL_HOME']) ? $_SERVER['MYSQL_HOME'] : '' }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Tmp</div>
                                <div class="profile-info-value">{{ isset($_SERVER['TMP']) ? $_SERVER['TMP'] : '' }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Http connection</div>
                                <div class="profile-info-value">{{ $_SERVER['HTTP_CONNECTION'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Http cache control</div>
                                <div class="profile-info-value">{{ isset($_SERVER['HTTP_CACHE_CONTROL']) ? $_SERVER['HTTP_CACHE_CONTROL'] : '' }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Http user agent</div>
                                <div class="profile-info-value">{{ $_SERVER['HTTP_USER_AGENT'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Http accept</div>
                                <div class="profile-info-value">{{ $_SERVER['HTTP_ACCEPT'] }}</div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Http accept encoding</div>
                                <div class="profile-info-value">{{ $_SERVER['HTTP_ACCEPT_ENCODING'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Http accept language</div>
                                <div class="profile-info-value">{{ $_SERVER['HTTP_ACCEPT_LANGUAGE'] }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">System root</div>
                                <div class="profile-info-value">{{ isset($_SERVER['SystemRoot']) ? $_SERVER['SystemRoot'] : '' }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Comspec</div>
                                <div class="profile-info-value">{{ isset($_SERVER['COMSPEC']) ? $_SERVER['COMSPEC'] : '' }}</div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width:210px">Path ext</div>
                                <div class="profile-info-value">{{ isset($_SERVER['PATHEXT']) ? $_SERVER['PATHEXT'] : '' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
