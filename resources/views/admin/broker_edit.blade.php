@extends('admin.layout.app')

@section('heading', 'Edit Broker')

@section('right_top_button')
<a href="{{ route('admin_broker_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_broker_update',$broker_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ $broker_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Komisi *</label>
                                    <input type="text" class="form-control" name="komisi" value="{{ $broker_data->komisi }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status *</label>
                                    <input type="text" class="form-control" name="status" value="{{ $broker_data->status }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
