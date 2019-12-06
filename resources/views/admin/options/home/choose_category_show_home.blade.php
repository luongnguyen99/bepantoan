@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Chọn danh mục nổi bật
@endsection

    <style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        float:none !important;
    }
    </style>

{{-- content --}}
@section('content')

{{-- alert --}}
@if (session('success'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible show" role="alert">
            <strong>Thông báo!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif

@if (session('error'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible show" role="alert">
            <strong>Thông báo!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
{{-- end alert --}}


<!-- main content -->
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Chọn danh mục nổi bật
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                @php
                    $categories_show_home = json_decode(get_option_by_key('categories_show_home'),true);
                @endphp
                <form method="POST" action="{{route('admin.options.choose_category_show_home')}}">
                    @csrf
                    <div classs="form-group">
                        <label for="categories">Chọn danh mục nổi bật</label><br>
                        <select class="categories_select2 form-control" style="width:20%" name="categories[]" multiple="multiple">
                           
                        </select>
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
    
</div>
<!-- end main content -->








<!----- javascript here -------->
@section('js')


<script>
    $(function () {
        $(document).ready(function() {
            $('.categories_select2').select2({
                ajax: {
                    url: `{{route('admin.categories.searchCategory')}}`,
                    method: 'post',
                    data: function (params) {
                        var query = {
                            search: params.term,
                        }
                    },
                    processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.name,
                                        id: item.id,
                                        value: item.id
                                    }
                                })
                            };
                    },
                }
            });
            
        });
    })
    
</script>

@endsection


@endsection