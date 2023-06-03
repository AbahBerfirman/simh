@extends('admin.layout.app')

@section('heading', 'View Kamar')

@section('right_top_button')
<a href="{{ route('admin_kamar_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">

        @foreach ($kamars as $row)
        {{-- <h2>{{ $row[0]->kamarAlamat->alamatApartement->name }}</h2> --}}

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                @if ($row->status === 'AVAILABLE')
                    <div class="card-icon bg-success">
                        <i class="fa fa-bed"></i>
                    </div>
                @elseif ($row->status === 'UNAVAILABLE')
                    <div class="card-icon bg-secondary">
                        <i class="fa fa-bed"></i>
                    </div>
                @else
                    <div class="card-icon bg-danger">
                        <i class="fa fa-bed"></i>
                    </div>
                @endif
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ $row->no_kamar }}</h4>
                    </div>
                    <div class="card-body">
                        {{ $row->description }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
