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
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Thêm lịch học</button>
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
								<h5 class="modal-title" id="exampleModalLabel">Thêm lịch học</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
							</div>
							<div class="modal-body has-success">
								<form action="{{route('addthoikhoabieu')}}" method="POST">
									{{ csrf_field() }}
									{{ method_field('POST') }}
									<div class="form-group">
                                    <select class="custom-select my-1 mr-sm-2" name="monhoc_id">
										  		
                                                  <option selected>Choose...</option>
                                                  @foreach ($monhoc as $rowmh)
  
                                                  <option value="{{ $rowmh -> id}}">{{ $rowmh -> ten}}</option>
  
                                                  @endforeach 
  
                                              </select>
										
									</div>
								
                                    <div class="form-group ">
                                    <label for="example-datetime-local-input" class="col-2 col-form-label">Date</label>
                                   
                                        <input class="form-control" type="date"  id="example-datetime-local-input" name="ngaythang">
                                    
                                    </div>
   

                                    <div class="form-group">
										<label for="recipient-name" class="col-form-label">Tiết học :</label>
										<input type="text" class="form-control" name="tiethoc" id="recipient-email">
									</div>

                                    <div class="form-group">
                                    
										<label for="recipient-name" class="col-form-label">Lớp học :</label>
                                        @foreach ($dslop as $rowds)
										<input type="text" class="form-control" name="idlop" id="recipient-email" value="{{ $rowds -> id}}" placeholder="{{ $rowds -> name}}">
                                        @endforeach
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
							<th> Môn học</th>
							<th> Lớp</th>
							<th> Ngày tháng</th>
                            <th> Tiết học</th>
                            <th> Khoa</th>
							<th class="text-center">Tác vụ</th>
						</thead>
							<tbody >
								@php
						
						@endphp
						@foreach ($thoikhoabieu as $row)
						<tr>
							<td class="text-center">{{$row->id }}</td>
							<td>{{ $row->ten}}</td>
                            
							<td>{{ $row->name }}</td>
                            
							<td>{{ $row->ngaythang }}</td>
                            <td>{{ $row->tiethoc }}</td>
                            <td>{{ $row->khoa }}</td>
			
							<td class="td-actions text-center">
								


							<a>
								<form action="{{route('delete-thoikhoabieu',$row->id)}}" method="POST" class="btn btn-sm btn-icon">
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
							{{ $thoikhoabieu->links() }}
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