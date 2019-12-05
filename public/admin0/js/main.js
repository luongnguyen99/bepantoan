$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
    $('body').on('click', '#checkAll', function () {
        $('input:checkbox[name=checkbox]').not(this).prop('checked', this.checked);
    })
})

function ajaxFunc(route, data, method = 'POST') {
    $.ajax({
        url: route,
        method: method,
        processData: false,
        contentType: false,
        data: data,
            
    }).done(
        result => {
            console.log(result);

        }
    )
}

function ChangeToSlug(n, s) {
    var title, slug;
    //Lấy text từ thẻ input title
    title = document.getElementById(n).value;
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    document.getElementById(s).value = slug;
}


   $(function () {
        $('body').on('submit', '#form-action', function (e) {
            e.preventDefault();
            var action = $('body').find('#action').val();
            if (parseInt(action) != 0) {
                if (action == 'delete') {
                    var categories = [];
                    $.each($("input[name='checkbox']:checked"), function () {
                        categories.push($(this).val());
                    });
                    if (categories.length != 0) {
                        var c = confirm("Bạn có chắc chắn muốn xoá mục đã chọn?");
                        if (c === true) {
                            var formData = new FormData();
                            formData.append('categories', categories);
                            ajaxFunc("{{ route('admin.categories.multiDel') }}", formData);
                        }
                    } else {
                        alert('Vui lòng chọn danh mục!')
                    }
                }
            }
        })
    })

$('#add_seo').on('click', function () {
    checked = $('#add_seo:checked').length;
    if (checked == 1) {
        $('.seo_content').css('display', 'block');
    } else {
        $('.seo_content').css('display', 'none');
    }
});