@extends('trangadmin.admin')

@section('title')
Dashboard | TÌNH TRẠNG ĐIỂM DANH
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">TÌNH TRẠNG ĐIỂM DANH </h4>
					
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
							
						
								
						</div>
					</div>
				</div>

			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary ">
						
							<th class="text-center"> STT </th>
                            <th> Ngày tháng</th>
                            <th> Mã sinh viên</th>
                            <th> Tên sinh viên</th>
                            <th> Lớp</th>
							<th> Môn học</th>
							<th> Giáo viên</th>					
                            <th> Tình trạng</th>
						</thead>
						<tbody >
                            @php
                            $count=1
                            @endphp
                            @foreach ($diemdanh as $row)
                            <tr>
                                <td class="text-center">{{$count++ }}</td>
                                <td>{{ $row->ngaythang}}</td>
                                
                                <td>{{ $row->masv }}</td>
                                
                                <td>{{ $row->ten }}</td>
                                <td>{{ $row->lop }}</td>
                                <td>{{ $row->monhoc }}</td>
                                <td>{{ $row->giaovien }}</td>
                                <td>{{ $row->tinhtrang }}</td>
                
                            </tr>
   
                            @endforeach
                            
						</tbody>
							
						</table>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							{{ $diemdanh->links() }}
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