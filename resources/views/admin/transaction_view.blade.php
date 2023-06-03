@extends('admin.layout.app')

@section('heading', 'View Transactions')

@section('right_top_button')
<a href="{{ route('admin_transaction_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> New Transaction</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Nama</th>
                                    <th>No. Kamar</th>
                                    <th>Durasi</th>
                                    <th>Broker</th>
                                    <th>Tanggal</th>
                                    <th>Check-In</th>
                                    <th>Check-Out</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($transactions as $row)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->transactionCustomer->name }}</td>
                                    <td>{{ $row->transactionKamar->no_kamar }}</td>
                                    <td>{{ $row->transactionDuration->duration }} Jam</td>
                                    <td>{{ $row->transactionBroker->name }}</td>
                                    <td>{{ $row->transaction_date }}</td>
                                    <td>{{ $row->checkin_date }}</td>
                                    <td>
                                        @if ( $row->checkout_date === 'null' )
                                        <a href="{{ route('admin_transaction_checkout',$row->id) }}" class="btn btn-success">Check-Out</a>
                                        @else
                                        {{ $row->checkout_date }}
                                        @endif
                                    </td>
                                    <td class="pt_10 pb_10">

                                        {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $i }}">Detail</button> --}}

                                        {{-- <a href="{{ route('admin_transaction_gallery',$row->id) }}" class="btn btn-success">Gallery</a> --}}


                                        <a href="{{ route('admin_transaction_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_transaction_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
@endsection
