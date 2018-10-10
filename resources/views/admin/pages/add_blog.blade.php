@extends('admin.admin_master')
@section('admin_main_content')
 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
	<!-- BEGIN PAGE HEADER-->
	<div class="row-fluid">
	   <div class="span12">
		  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
		   <h3 class="page-title">
			 Add Blog Post
		   </h3>
		   <ul class="breadcrumb">
			   <li>
				   <a href="{{URL::to('/admin')}}">Home</a>
				   <span class="divider">/</span>
			   </li>
			   <li class="active">
				   Add Post
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
			<!-- BEGIN SAMPLE FORMPORTLET-->
			<div class="widget green">
				<div class="widget-title">
					<h4><i class="icon-reorder"></i>Add Post</h4>
					<span class="tools">
					<a href="javascript:;" class="icon-chevron-down"></a>
					<a href="javascript:;" class="icon-remove"></a>
					</span>
				</div>
				<div class="widget-body">
					<h3>
						<?php 
							$message = Session::get('message');
							if ($message) {
								echo $message;
								Session::put('message');
							}
						?>
					</h3>
					<!-- BEGIN FORM-->
					{!! Form::open(['url' => '/save-post', 'method'=>'POST']) !!}
					<div class="form-horizontal">
						<div class="control-group">
							<label class="control-label">Blog Title</label>
							<div class="controls">
								<input type="text" class="span6" name="blog_title" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Post Category</label>
							<div class="controls">
								<select class="span6 chzn-select" data-placeholder="Choose a Category" tabindex="1" name="category_id">
									@foreach($published_category as $v_category)
									<option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Long Description</label>
							<div class="controls">
								<textarea class="span6 " rows="4" name="blog_long_description"></textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Short Description</label>
							<div class="controls">
								<textarea class="span6" rows="3" name="blog_short_description"></textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Image</label>
							<div class="controls">
								<input type="file" class="default" name="blog_image">
							</div>
						</div>
						<div class="control-group">
						<label class="control-label">Publication Status</label>
						<div class="controls">
							<select class="span6 " name="publication_status" data-placeholder="Choose a Category" tabindex="1">
								<option value="">Select Status</option>
								<option value="1">Published</option>
								<option value="0">Unpublished</option>
							</select>
						</div>
					</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-success">Submit</button>
							<button type="button" class="btn">Cancel</button>
						</div>
					</div>
					{!! Form::close() !!}
					<!-- END FORM-->
				</div>
			</div>
			<!-- END SAMPLE FORM PORTLET-->
		</div>
	</div>


 <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->

@endsection