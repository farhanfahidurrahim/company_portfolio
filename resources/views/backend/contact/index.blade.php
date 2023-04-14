@extends('backend.layouts.master')
@section('content')

	<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Contact-Us</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                            <h6><a href="" class="btn btn-xs btn-link btn-toggle-fullwidth"></a>
                            	Total Contact-Us : {{App\Models\Contact::count()}}
                            </h6>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                            <ul class="breadcrumb">
                            	<a href="{{ route('contact.create') }}" class="btn btn-info"><i class="icon-plus"></i> Create New Contact-Us</a>
                        	</ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>All Contact-Us</strong> List</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Phone(Optional)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($data as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{!! html_entity_decode($row->message) !!}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td class="">
                                            	<a href="{{ route('testimonial.edit',$row->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>

                                            	<form class="px-3" onclick="return confirm('Are you sure you want to delete?')" method="POST"
                                                action="{{ route('testimonial.destroy', $row->id) }}">
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
