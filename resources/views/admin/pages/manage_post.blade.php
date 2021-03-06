@extends('admin.admin_master')
@section('admin_main_content')
 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
	<!-- BEGIN PAGE HEADER-->   
	<div class="row-fluid">
	   <div class="span12">
		  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
		   <h3 class="page-title">
			 Basic Table
		   </h3>
		   <ul class="breadcrumb">
			   <li>
				   <a href="#">Home</a>
				   <span class="divider">/</span>
			   </li>
			   <li>
				   <a href="#">Data Table</a>
				   <span class="divider">/</span>
			   </li>
			   <li class="active">
				   Basic Table
			   </li>
			   <li class="pull-right search-wrap">
				   <form action="http://thevectorlab.net/metrolab/search_result.html" class="hidden-phone">
					   <div class="input-append search-input-area">
						   <input class="" id="appendedInputButton" type="text">
						   <button class="btn" type="button"><i class="icon-search"></i> </button>
					   </div>
				   </form>
			   </li>
		   </ul>
		   <!-- END PAGE TITLE & BREADCRUMB-->
	   </div>
	</div>
	<!-- END PAGE HEADER-->
	<!-- BEGIN PAGE CONTENT-->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN BASIC PORTLET-->
				<div class="widget orange">
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> Advanced Table</h4>
					<span class="tools">
						<a href="javascript:;" class="icon-chevron-down"></a>
						<a href="javascript:;" class="icon-remove"></a>
					</span>
					</div>
					<div class="widget-body">
						<table class="table table-striped table-bordered table-advance table-hover">
							<thead>
							<tr>
								<th><i class="icon-thmbs-up"></i> Post Id</th>
								<th><i class="icon-bookmark"></i> Post Title</th>
								<th><i class=" icon-edit"></i> Publication Status</th>
								<th></th>
							</tr>
							</thead>

							<?php foreach ($all_post_info as $v_post) { ?>

							<tbody>
							<tr>
								<td><a href="#">{{$v_post->blog_id}}</a></td>
								<td>{{$v_post->blog_title}}</td>
								<?php
									if ($v_post->publication_status == 1) {
										echo '<td><span class="label label-success label-mini">Published</span></td>';
									}else{
										echo '<td><span class="label label-important label-mini">Unpublished</span></td>';
									}
								?>
								
								<td>
									<?php
										if ($v_post->publication_status == 1) {
									?>	
										<a title="Unpublished" class="btn btn-danger" href="{{URL::to('/unpublished-post', $v_post->blog_id)}}"><i class="icon-thumbs-down"></i></a>
									<?php } else{
									?>	
											<a title="Published" class="btn btn-success" href="{{URL::to('/published-post', $v_post->blog_id)}}"><i class="icon-thumbs-up"></i></a>
									<?php } ?>
									<a title="Edit" class="btn btn-primary" href="{{URL::to('/edit-post', $v_post->blog_id)}}"><i class="icon-pencil"></i></a>
									<a title="Delete" class="btn btn-danger" href="{{URL::to('/delete-post', $v_post->blog_id)}}" onclick="return checkDelete()"><i class="icon-trash "></i></a>
								</td>
							</tr>
							</tbody>
							<?php } ?>
						</table>
					</div>
				</div>
				<!-- END BASIC PORTLET-->
			</div>
		</div>
	</div>
	
@endsection	
	