@extends('trangadmin.admin')

@section('title')
Dashboard | DANH SÁCH SINH VIÊN
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">DANH SÁCH SINH VIÊN </h4>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Thêm sinh viên</button>
				<div class="input-group no-border">
                <input id="myInput" type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
				@if (session('status'))
                        <div class="alert alert-success" role="alert" >
                            {{ session('status') }}
                          {{-- 	<button   type="submit" rel="tooltip"  class="flex-row-reverse btn btn-danger btn-sm btn-icon navbar-right" >
											<i class="now-ui-icons ui-1_simple-remove"></i>
										</button> --}}
                        </div>
                    @endif

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Thêm sinh viên</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
							</div>
							<div class="modal-body has-success">
								<form action="{{route('addsinhvien')}}" method="POST">
									{{ csrf_field() }}
									{{ method_field('POST') }}
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Tên đầy đủ :</label>
										<input type="text" class="form-control" name="ten" id="recipient-name">
									</div>
									
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Mã sinh viên :</label>
										<input type="text" class="form-control" name="masv" id="recipient-email">
									</div>
                                    @foreach ($dslop as $row2)
									
										<div class="form-group">
											<label for="disabledTextInput">Lớp</label>
											<input type="text" class="form-control" name="idlop" placeholder="{{ $row2 -> name}}" value="{{ $row2 -> id}}">
										</div>
									
									@endforeach
									
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
								<button type="submit" class="btn btn-primary">Thêm</button>
							</div>
							</form>
						</div>
					</div>
				</div>

			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary ">
						
							<th class="text-center"> STT </th>
							<th> Tên đầy đủ</th>
							<th> Mã sinh viên</th>
							<th> Lớp</th>
							<th class="text-center">Tác vụ</th>
						</thead>
							<tbody >
								@php
						
						@endphp
						@foreach ($sinhvien as $row)
						<tr>
							<td class="text-center">{{$row->id }}</td>
							<td>{{ $row->ten}}</td>
							<td>{{ $row->masv }}</td>
							<td>{{ $row->name }}</td>
			
							<td class="td-actions text-center">
								<a href="#">
									
									<button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Sửa sản phẩm" data-target="#acc{{$row->id}}" data-whatever="@getbootstrap"><i class="now-ui-icons business_badge"></i></button>
								</a>

								<div class="modal fade" id="acc{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Sửa thông tin sinh viên</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body has-success">
												<form action="{{route('update-sinhvien',$row->id)}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('PUT') }}
													
													<div class="form-group">
														<label for="recipient-name" class="col-form-label" >Mã sinh viên</label>
														<input type="text" class="form-control" name="masv" id="recipient-phone" value="{{ $row -> masv}}">
													</div>
													
													<div class="form-group">
														<label for="recipient-name" class="col-form-label" style=" text-right:none!important">Tên sinh viên :</label>
														<input type="text" class="form-control" name="ten" id="recipient-name" value="{{ $row -> ten}}">
													</div>
													
														<div class="form-group">
															<label for="disabledTextInput">Lớp</label>
															<input type="text" id="disabledTextInput" class="form-control" name='idlop' placeholder="{{ $row -> name}}" value="{{ $row -> idlop}}">
														</div>
													

													
													

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
													<button type="submit" class="btn btn-primary">Cập nhật</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>




							<a>
								<form action="{{route('delete-sinhvien',$row->id)}}" method="POST" class="btn btn-sm btn-icon">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button   type="submit" rel="tooltip"  class="btn btn-danger btn-sm btn-icon" >
										<i class="now-ui-icons ui-1_simple-remove"></i>
									</button>
								</form>
							</a>
							</td>
							<tr>
						@endforeach
						
							</tbody>
							
						</table>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							{{ $sinhvien->links() }}
						</div>
					</div>
					</table>
				</div>
			</div>
		</div>
	</div>
	
@endsection


@section('scripts')
{{-- expr --}}
@endsection