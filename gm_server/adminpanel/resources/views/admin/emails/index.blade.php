@extends('layouts.admin.base')
@section('styles')
<link href="{{asset('admin_design/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin_design/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin_design/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-12">
			@if(Session::has('success'))
		        <div class="note note-success">
		            <p>{{ Session::get('success') }}</p>
		        </div>
		    @elseif(Session::has('error'))
		    	<div class="note note-danger">
		            <p>{{ Session::get('error') }}</p>
		        </div>    
		    @endif
		    
		    <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">Emails</span>
                    </div>
                    <div class="actions">
                    	<!--<a class="btn btn-success pull-right" href="{{ route('admin.tags.create') }}">
                    		<i class="glyphicon glyphicon-plus"></i> Create</a>-->
                    	
                        <div>
                        	<a class="label-info btn-outline btn-circle btn-sm" href="{{ route('admin.emails.create') }}" style="color:#fff;text-decoration: none;">
                				<i class="glyphicon glyphicon-plus"></i> Create
                			</a>
                            
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        
                        <table class="table table-striped table-bordered table-hover table-checkable" id="categories-records">
                            <thead>
                                <tr role="row" class="heading">
                                    <th width="150"> Email </th>
		                            <th> Subject </th>
		                            <th> Body </th>
		                            <th> DateTime </th>
		                            <th> Status </th>
		                            <th> Actions </th>
                               </tr>
                                
                            </thead>
                   <!--         @foreach($emails as $email)
                            <tr>
								<td >{{$email->email}}</td>
								<td>{{$email->subject}}</td>
								<td>{{$email->body}}</td>
								<td>{{$email->datetime}}</td>
								@if($email->sent==1)
								<td>sent</td>
								@else
								<td>pending</td>
								@endif
                            </tr>
                            @endforeach -->
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>    
@stop

@section('scripts')

<script src="{{asset('admin_design/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_design/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_design/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_design/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_design/pages/scripts/table-datatables-ajax.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_design/js/custom-jquery.js')}}" type="text/javascript"></script>

<script>
	$(document).ready(function(){
		$('#categories-records').dataTable({
			"ajax": "<?php echo url('/admin/ajax_get_emails');?>",
	        "columns": [
	            { "data": "email" },
	            { "data": "subject" },
	            { "data": "body" },
	            { "data": "datetime" },
	            { "data": "status" },
	            { "data": "actions" },
	        ],
	   /*     "drawCallback": function( settings ) {
		        $('.change_status').click(function(e) { 
					e.preventDefault();
							
					var thisBtn = this;
					
					var status = $(this).attr('data-status');
					var id = $(this).attr('data-id');
					var token = $('#token').val();
					var data = {'id':id,
								'status':status,
								'token':token
							  };
					 $.ajax({
					 	url: "<?php echo url('/admin/change_category_status');?>/"+id, 
					 	data : $('#status_change_form_'+id).serialize(),
					 	method: "PUT",
					 	success: function(result){
					 		$('#status_'+id).val((($('#status_'+id).val()) == 0)?1:0);
				        	$(thisBtn).toggleClass('btn-success btn-danger');
				        		
				        	$(thisBtn).text(($(thisBtn).text() == 'Active' )?'Inactive':'Active');
				        	
				    	}
				    });
				});
		    },*/
		    "aoColumnDefs": [
		        { 'bSortable': false, 'aTargets': [ 4] }
		    ]
		});
		
	});
	
	$(window).load(function(){
		setTimeout(function(){
			$('.note').fadeOut();	
		},2000);
	});
</script>

<script src="{{asset('admin_design/js/custom-jquery.js')}}" type="text/javascript"></script>
@stop
