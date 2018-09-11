@extends('layouts.app')

@section('content')
    <a href="{{ route('customers.create') }}" class="btn btn-success">Dodaj klienta</a>
    @foreach($customers as $customer)
        <div class="card mt-3 mb-3">
            <div class="card-header">
                {{ $customer->name }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p><strong>Adres klienta:</strong><br/>
                            {{ $customer->address }}<br />
                            {{ $customer->zip }} {{ $customer->city }}
                        </p>
                    </div>
                    <div class="col">
                        <p><strong>Email: </strong> {{ $customer->email }}</p>
                        <p><strong>Prawo jazdy: </strong> {{ $customer->driver_licence_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection