@extends('backend.layouts.master')
@section('content')

	<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Banner</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                            <h6><a href="" class="btn btn-xs btn-link btn-toggle-fullwidth"></a>
                            	Total Banners : {{App\Models\Banner::count()}}
                            </h6>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                            <ul class="breadcrumb">
                            	<a href="{{ route('banner.create') }}" class="btn btn-info"><i class="icon-plus"></i> Create New Banner</a>
                        	</ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>All Banner</strong> List</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Photo</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($data as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->title }}</td>
                                            <td>{{ Str::limit($row->description,50) }}</td>
                                            {{-- <td>{!! html_entity_decode($row->description) !!}</td> --}}
                                            <td><img src="{{ $row->photo }}" style="max-height: 50px; max-width: 75px;" alt="banner img"></td>
                                            <td>
                                            	<input type="checkbox" name="toogle" value="{{ $row->id }}" data-toggle="switchbutton" {{$row->status=='active' ? 'checked' : ''}} data-onlabel="Active" data-offlabel="Inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td class="">
                                            	<a href="{{ route('banner.edit',$row->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>

                                            	<form class="px-3" onclick="return confirm('Are you sure you want to delete?')" method="POST" action="{{ route('banner.destroy', $row->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
{{-- Status Update Ajax --}}
    <script>
		$('input[name=toogle]').change(function(){
			var mode=$(this).prop('checked');
			var id=$(this).val();
			//alert(id);
			$.ajax({
				url:"{{route('banner.status')}}",
				type:"POST",
				data:{
					_token:'{{csrf_token()}}',
					mode:mode,
					id:id,
				},
				success:function(response){
					if(response.status)
					{
						alert(response.msg);
					}
					else{
						alert('Please Try Again!');
					}
				}
			})
		});
	</script>
@endsection
