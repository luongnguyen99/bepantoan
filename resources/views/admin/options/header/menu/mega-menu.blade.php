@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Mega menu
@endsection
@section('style')
<style>
    .cke_contents {
        min-height: 100px !important;
    }

    .col-xs-12 {
        margin-top: 10px !important;
    }

    .pull-right {
        margin-left: 5px;
    }

    .dd-empty {
        display: none
    }

    #nestable3 {
        padding: 4px 8px !important;
        border: 1px #e0e0e0 solid;
        min-height: 40px;
    }
</style>
@endsection

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

<div class="row">

    {{-- ****************** --}}

    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">

                {{-- ************** --}}

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Thêm danh mục</label>
                        <select name="categories" id="categories2" class="form-control categories2">
                            @forelse ($categories as $item)
                            <option value="{{$item->id}}" slug="{{route('category_detail',['slug' => $item->slug])}}">
                                {{$item->name}}
                            </option>
                            @empty

                            @endforelse
                        </select>
                        <div style="margin: 10px 0px">
                            <button style="margin: 5px 0px" class="btn btn-bitbucket btn-sm btn_add_element">Thêm <i
                                    class="fa fa-long-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Thêm link tùy chọn</label>
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề" autocomplete="off">
                            <input type="text" name="link" class="form-control" placeholder="Đường dẫn" autocomplete="off">
                        <div style="margin: 10px 0px">
                            <button style="margin: 5px 0px" class="btn btn-bitbucket btn-sm btn_add_element_custom">Thêm <i
                                    class="fa fa-long-arrow-right"></i></button>
                        </div>
                    </div>


                </div>
                <div class="col-sm-6">
                    <div>
                        <label for="">Thứ tự danh mục hiển thị trang chủ</label>
                    </div>
                    <div class="dd" id="nestable3">

                        <ol class="dd-list">
                            @php
                            $arr = json_decode(get_option_by_key('mega_menu'),true);

                            @endphp
                            @if (is_array($arr) && count($arr) > 0)
                            @foreach ($arr as $key => $item)

                            <li class="dd-item dd3-item" data-id="{{ $item['id']}}" data-slug="{{$item['slug']}}" data-text="{{$item['text'] }}">
                                @if (!empty($item['children']) && is_array($item['children']) &&
                                count($item['children']) > 0)
                                    <button class="dd-collapse" data-action="collapse" type="button">Collapse</button>
                                    <button class="dd-expand" data-action="expand" type="button">Expand</button>
                                @endif
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">
                                    <div class="text-box">
                                        {{ $item['text'] }}
                                    </div>
                                </div>
                                <div class="pull-right2">
                                    <span style="cursor: pointer" class="btn_remove_element">
                                        <i class="fa fa-close"></i>
                                    </span>
                                </div>
                                @if (!empty($item['children']) && is_array($item['children']) && count($item['children']) > 0)
                                <ol class="dd-list">
                                    @foreach ($item['children'] as $item1)

                                    <li class="dd-item dd3-item" data-id="{{ !empty($item1['id']) ? $item1['id'] : null}}" data-slug="{{$item1['slug']}}" data-text="{{$item1['text'] }}">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">{{$item1['text'] }}</div>
                                        <div class="pull-right2">
                                            <span style="cursor: pointer" class="btn_remove_element">
                                                <i class="fa fa-close"></i>
                                            </span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>
                                @endif
                            </li>
                            @endforeach
                            @endif

                        </ol>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div style="margin: 20px 0px" class="">
                        <button class="btn btn-success btn_save">Lưu</button>
                    </div>
                </div>
                {{-- ----------------- --}}


                {{-- **************** --}}
            </div>
        </div>
    </div>
</div>







@endsection
<!----- javascript here -------->
@section('js')
<script>
    $(document).ready(function () {
        $('#categories2').select2();

    });

</script>
<script>
    $('.dd').nestable({
        maxDepth: 2,
        group: 2
    });
    $('.btn_save').click(function () {
        var a = $('.dd').nestable('serialize');
        var myJSON = JSON.stringify(a);
        console.log(myJSON);
        var formData = new FormData();
        $.ajax({
            url : `{{route('admin.options.mega_menu')}}`,
            method: 'post',
            type: 'json',
            dataType: 'json',
            data: {
                categories: myJSON,
                _token: '{{ csrf_token() }}'
            },
        }).done(
            result => {
                var msg = result;
                if (result.error == false) {
                    window.location.reload();
                } else {
                    window.location.reload();
                }

            });
    })

</script>
<script>
    function buildItem(text, value, slug) {
        // console.log(text);
        var html = `<li class="dd-item dd3-item" data-id="${value}" data-slug="${slug}" data-text="${text}">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">${text}</div>
                        <div class="pull-right2">
                            <span style="cursor: pointer" class="btn_remove_element">
                                <i class="fa fa-close"></i>
                            </span>
                        </div>
                    </li>`;
        return html;
    }
    $(function () {
        $('body').on('click', '.btn_add_element', function () {
            let text = $("#categories2 option:selected").text();
            let slug = $("#categories2 option:selected").attr('slug');
            // console.log(text);
            text = $.trim(text);
            let value = $("#categories2").val();
            $('#nestable3 > .dd-list').append(buildItem(text, value,slug));
        });

        $('body').on('click', '.btn_add_element_custom', function () {

            text = $(this).parents('div.form-group').find('input[name=title]').val();
            slug = $(this).parents('div.form-group').find('input[name=link]').val();
            value = null;
            text = $.trim(text);
            if (text.length > 0) {
                $('#nestable3 > .dd-list').append(buildItem(text, value, slug));
            }
        });

        $('body').on('click', '.fa-close', function (e) {
            $(this).parents('.dd3-item').remove();
        })
    })

</script>



@endsection
