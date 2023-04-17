@extends('backend.layouts.master')
@section('content')

    <div id="main-content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Social-Link</strong> Information</h2>
                        </div>
                        {{-- <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                            <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                                <ul class="breadcrumb">
                                    <a href="{{ route('social-link.create') }}" class="btn btn-info"><i class="icon-plus"></i> Create New</a>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Facebook</th>
                                            <th>Instagram</th>
                                            <th>Twitter</th>
                                            <th>LinkedIn</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($data as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->facebook }}</td>
                                            <td>{{ $row->instagram }}</td>
                                            <td>{{ $row->twitter }}</td>
                                            <td>{{ $row->linkedin }}</td>
                                            <td class="">
                                            	<a href="{{ route('social-link.edit',$row->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>

                                            	{{-- <form class="px-3" onclick="return confirm('Are you sure you want to delete?')" method="POST"
                                                action="{{ route('contact.destroy', $row->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                                </form> --}}
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
