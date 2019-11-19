@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Footer
@endsection
@section('content')
<!-- main content -->
<div class="row">
    <div class="col-sm-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm mới footer
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <form id=create_category method="post">
                  @csrf
                   
                    <div class="form-group">
                        <label for="name">Chi tiêt footer</label>
                        <textarea class="form-control" name="footer" id="" cols="" rows="4">

                        </textarea>
                    </div>
               
                    <div class="form-group" style="margin-top:20px">
                        <button class=" btn btn-success" type="submit">Lưu</button>
                    </div>
                </form>
                <!-- end content here -->
            </div>
        </div>
    </div>
    {{-- /////////////////// --}}
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Footer của bạn
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped text-center" id="table-categories">
                        <div class="form-group">
                            <textarea class="form-control" name="" id="" rows="4">
                                {{ $json['footer'] }}
                            </textarea>
                            <div class="text-center" style="margin-top:5px;">
                                <a href="/admin/options/del_footer" class="btn btn-danger">Xóa</a>
                            </div>
                        </div>
                    </table>
                </div>
                <!-- end content here -->
            </div>
        </div>
    </div>
</div>
<!-- end main content -->
@endsection
