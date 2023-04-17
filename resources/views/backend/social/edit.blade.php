@extends('backend.layouts.master')
@section('content')

    <div id="main-content">

        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Social-Link Information</h2>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{ route('social-link.update',$data->id) }}" method="post">
                            @csrf
                            @method('PUT')
                                <div class="row clearfix">

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Facebook Link</label>
                                            <input type="url" class="form-control" name="facebook" value="{{ $data->facebook }}" placeholder="Facebook">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Instagram Link</label>
                                            <input type="url" class="form-control" name="instagram" value="{{ $data->instagram }}" placeholder="Instagram">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Twitter Link</label>
                                            <input type="url" class="form-control" name="twitter" value="{{ $data->twitter }}" placeholder="Twiiter">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">LinkedIn Link</label>
                                            <input type="url" class="form-control" name="linkedin" value="{{ $data->linkedin }}" placeholder="LinkedIn">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('social-link.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
