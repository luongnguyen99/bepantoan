@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
	Danh sách số điện thoại đăng ký khuyến mãi
@endsection
@section('content')
<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách số điện thoại đăng ký khuyến mãi</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<a href="/admin/phone_order/phone_order" class="btn btn-warning"><span class="glyphicon glyphicon-gift"></span>Số điện thoại chưa xử lý</a>
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Số Điện Thoại</th>
										<th>Thông tin</th>
										<th>Thời gian</th>
										<th>Thao Tác</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($phone as $key=>$row)
										<tr>
											<td>{{ $key+1 }}</td>
											<td>{{ $row->phone }}</td>
											<?php 
												if(isset($row->info) && !empty($row->info)){ 
													$info = json_decode($row->info , true);
												}
											
											?>											
											<td> 
												<ul>
													<li>Thời gian tư vấn : {{ $info['sp_time']}} </li>
													@if (!empty(get_detail_products_by_id($info['product_id'])->slug))
													<li>Sản phẩm cần tư vấn : <a href="{{ url('/').'/'.get_detail_products_by_id($info['product_id'])->slug  }}"
															target="_blank"> {{ $info['product_name'] }} </a> </li>
													@endif
												</ul>
											</td>
											<td>{{ Carbon\Carbon::parse($row->updated_at)->format('d/m/Y') }}</td>
										
										<td>
											<a href="/admin/phone_order/del/{{ $row->id }}" class="btn btn-warning"><i class="fa" aria-hidden="true"></i>Xóa</a>
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
	</div>
	<!--end main-->
	@endsection