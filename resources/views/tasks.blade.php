<?php
?>
@extends('layouts.app');
@section('content')

<!-- dinh nghia phan noi dung trang task -->
<div class="panel-body">
	<!-- hien thi thong bao loi -->
	@include('errors.503')
	
	<!-- form nhap task moi -->
	<form action="{{url('/taskk')}}" method="post" class="form-horizontal">
		{{csrf_field()}}

		<!-- ten task -->
		<div class="form-group">
			<label for="tak" class="col-sm-3 control label">Task</label>
			<div class="col-sm-6">
				<input type="text" name="name" id="task-name" class="form-control">
			</div>
		</div>

		<!-- nut task -->
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
					<i class="fa fa-plus"></i>Add Task
				</button>
			</div>
		</div>
	</form>

	<!-- hien thi task trong database -->
	@if(count($tasks)>0)

		<div class="panel panel-default">
			<!-- <div class="panel-heading">
				Current Task
			</div> -->

			<div class="panel-body">
				<table class="table table-striped ">
					<!-- tao tieu de cac cot -->
					<!-- <thread>
						<td>Task</td>
						<td>&nbsp;</td>
					</thread> -->
					<!-- tao cac dong hien thi body -->
					<tbody>
						@foreach($tasks as $tas)
							<tr>
								<!-- hien thi ten task -->
								<td class="tabel-text">
									<div>{{$tas->name}}</div>
								</td>

								<!-- them nut xoa -->
								<td>
									<form action="/taskk/{{$tas->id}}" method="post">
										{{csrf_field()}}
										{{method_field('DELETE')}}
										<button>Delete Task</button>
										<!-- <input type="hidden" name="_method" value="DELETE"> -->
									</form>
								</td>

							</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	@endif
</div>
@endsection

