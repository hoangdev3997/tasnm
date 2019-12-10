@extends('website.master')
@section('website.content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Tài Khoản</h2>
                        <p><a href="{{ url('./') }}">Trang chủ</a> | Tài Khoản</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- my account content section start -->
    <section class="collapse_area coll2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="check">
                        <h2>Thông tin tài khoản</h2>
                    </div>
                    <div class="faq-accordion">
                        <div class="panel-group pas7" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="collapsed method">Thông tin của bạn</a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse in">
                                    <div class="row">
                                        <div class="easy2">
                                            <form class="form-horizontal" action="#">
                                                <fieldset>
                                                    <div class="form-group required">
                                                        <label class="col-sm-2 control-label">Họ và tên :</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" value="{{  Auth::user()->FullName }}" type="text" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="col-sm-2 control-label">Tài khoản :</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="tel" value="{{  Auth::user()->username }}" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="col-sm-2 control-label">Địa chỉ :</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="{{  Auth::user()->Address }}" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="col-sm-2 control-label">Telephone :</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="phone" value="{{  Auth::user()->Phone }}" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="col-sm-2 control-label">Email :</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="email" value="{{  Auth::user()->email }}" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="col-sm-2 control-label">Ngày tạo :</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="{{ substr(Auth::user()->created_at, 0, -9) }}" readonly="">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="buttons clearfix">
                                                    <div class="pull-left">
                                                        <a class="btn btn-default ce5" href="{{ url('./') }}">&lt;&lt; Trang chủ</a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <a class="btn btn-default ce5" href="{{ URL::asset('/logout') }}">Đăng xuất</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account  content section end -->
@endsection
