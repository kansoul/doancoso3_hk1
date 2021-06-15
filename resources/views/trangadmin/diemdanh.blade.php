@extends('trangadmin.admin')

@section('title')
Dashboard | DANH SÁCH LỚP
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">ĐIỂM DANH LỚP </h4>
					
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

				

			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary ">
						
							<th class="text-center"> STT </th>
							<th> Tên lớp</th>
							<th> Khóa</th>
							
							
						</thead>
							<tbody >
								
						@foreach ($dslop as $row)
						    <tr>
						    <td class="text-center">{{$row->id }} </td> 

							
							<td><a type="button" class="btn btn-link tags" href="chitietdiemdanh/{{$row->name}}" gloss="Xem tình trạng điểm danh">{{$row->name }}</a></td>
							
							<td>{{ $row->khoa }}</td>
			
							
							
							<tr>
						@endforeach
						
							</tbody>
							
						</table>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							{{ $dslop->links() }}
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