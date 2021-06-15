@extends('trangadmin.admin')

@section('title')
Dashboard | DANH SÁCH GIÁO VIÊN
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">DANH SÁCH GIÁO VIÊN </h4>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Thêm giáo viên</button>
				<div class="input-group no-border">
                <input id="myInput" type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
				@if (session('status1'))
                        <div class="alert alert-success" role="alert" >
                            {{ session('status1') }}
                          {{-- 	<button   type="submit" rel="tooltip"  class="flex-row-reverse btn btn-danger btn-sm btn-icon navbar-right" >
											<i class="now-ui-icons ui-1_simple-remove"></i>
										</button> --}}
                        </div>
                    @endif
                    @if (session('status2'))
                        <div class="alert alert-danger" role="alert" >
                            {{ session('status2') }}
                          {{-- 	<button   type="submit" rel="tooltip"  class="flex-row-reverse btn btn-danger btn-sm btn-icon navbar-right" >
											<i class="now-ui-icons ui-1_simple-remove"></i>
										</button> --}}
                        </div>
                    @endif

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Thêm giáo viên</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
							</div>
							<div class="modal-body has-success">
								<form action="addgv" method="POST">
									{{ csrf_field() }}
									{{ method_field('POST') }}
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Tên giáo viên</label>
										<input type="text" class="form-control" name="name" id="recipient-name">
									</div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                                    
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword6">Password</label>
                                        <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="password">
                                        <small id="passwordHelpInline" class="text-muted">
                                        Must be 8-20 characters long.
                                        </small>
                                    </div>
									
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Chức vụ :</label>
										<input type="text" class="form-control" name="chucvu" id="recipient-email">
									</div>
									
									
								
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
							<th> Tên giáo viên</th>
                            <th> Email</th>
							<th> Chức vụ</th>
							
							<th class="text-center">Tác vụ</th>
						</thead>
							<tbody >
								@php
						$count = 1;
						@endphp
						@foreach ($gv as $row)
						<tr>
							<td class="text-center">{{$count++ }}</td>
							<td>{{ $row->name}}</td>
							<td>{{ $row->email }}</td>
                            <td>{{ $row->chucvu }}</td>
							<td class="td-actions text-center">
								<a href="#">
									
									<button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Sửa sản phẩm" data-target="#acc{{$row->id}}" data-whatever="@getbootstrap"><i class="now-ui-icons business_badge"></i></button>
								</a>

								<div class="modal fade" id="acc{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Sửa thông tin giáo viên</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body has-success">
												<form action="update-gv/{{ $row->id}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('PUT') }}
													
													<div class="form-group">
														<label for="recipient-name" class="col-form-label" style=" text-right:none!important">Tên giáo viên :</label>
														<input type="text" class="form-control" name="name" id="recipient-name" value="{{ $row -> name}}">
													</div>
                                                    <div class="form-group">
                                                         <label for="exampleInputEmail1">Email address</label>
                                                         <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $row -> email}}" name="email" >
                                    
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword6">Password</label>
                                                        <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="password" value="{{ $row -> email}}">
                                                        <small id="passwordHelpInline" class="text-muted">
                                                         Must be 8-20 characters long.
                                                        </small>
                                                    </div>

													<div class="form-group">
														<label for="recipient-phone" class="col-form-label">Chức vụ :</label>
														<input type="text" class="form-control" name="chucvu" id="recipient-phone" value="{{ $row -> chucvu}}">
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
								<form action="delete-gv/{{ $row->id }}" method="POST" class="btn btn-sm btn-icon">
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
							{{ $gv->links() }}
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