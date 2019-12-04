@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')

@endsection
@section('content')
	<!--main-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách số điện thoại tư vấn</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">

								<a href="/admin/phone_order/detailorder" class="btn btn-success">Số điện thoại đã xử lý</a>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Số Điện Thoại</th>
											
											<th>Xử lý</th>
										</tr>
									</thead>
									<tbody>
									@foreach ($phone as $key=>$item)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $item->phone }}</td>
										<td>
											<a href="/admin/phone_order/xuly/{{ $item->id }}" class="btn-xl btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Xử lý</a>
										</td>
									</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
<script>
$('body').on('click','.btn-xl',function(){
		var sdt = $('#PhoneRegister').val();
		console.log(sdt)
		// $.ajax({
		// 	url:"{{ route("phone") }}",
		// 	type:'post',

		// 	data:{sdt:sdt,_token : `{{csrf_token()}}`,}, // xu ly
		// 	success:(function(data){ // hien thi
		// 		if(data == 'success'){
		// 			alert('Thêm Thành Công !!!');
		// 		}else if(data == 'Loi'){
		// 			alert('Thêm Không Thành Công !!!');
		// 		}
		// 	})
		// });
	})
</script>
<!--end main-->
@endsection