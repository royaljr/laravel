@extends('admin.admin_master')
@section('admin_main_content')
<div class="container-fluid">
<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
   <div class="span12">
	  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
	   <h3 class="page-title">
		 Form Components
	   </h3>
	   <ul class="breadcrumb">
		   <li>
			   <a href="#">Home</a>
			   <span class="divider">/</span>
		   </li>
		   <li>
			   <a href="#">Form Stuff</a>
			   <span class="divider">/</span>
		   </li>
		   <li class="active">
			   Form Components
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
				<h4><i class="icon-reorder"></i> Sample Form </h4>
				<span class="tools">
				<a href="javascript:;" class="icon-chevron-down"></a>
				<a href="javascript:;" class="icon-remove"></a>
				</span>
			</div>
			<div class="widget-body">
				<h3 style="text-align: center; color: #f5c147;">
					<?php 
						$message = Session::get('message');

						if ($message) {
							echo $message;
							Session::put('message');
						}

					?>
				</h3>
				<!-- BEGIN FORM-->
				{!! Form::open(['url' => '/update-category', 'method'=>'POST']) !!}
				<div class="form-horizontal">
					<div class="control-group">
						<label class="control-label">Category Name</label>
						<div class="controls">
							<input type="text" class="span6 " name="category_name" value="{{$category_info->category_name}}"/>
							<input type="hidden" class="span6 " name="category_id" value="{{$category_info->category_id}}"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Category Description</label>
						<div class="controls">
							<textarea class="span6 " rows="4" name="category_description">{{$category_info->category_description}}</textarea>
						</div>
					</div>
					<!-- <div class="control-group">
						<label class="control-label">Default Dropdown</label>
						<div class="controls">
							<select class="span6 " name="publication_status" data-placeholder="Choose a Category" tabindex="1">
								<option value="">Select...</option>
								<option value="1">Published</option>
								<option value="0">Unpublished</option>
							</select>
						</div>
					</div> -->
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

@endsection