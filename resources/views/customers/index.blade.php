@extends('layouts.app')

@section('content')
    <a href="{{ route('customers.create') }}" class="btn btn-success">Dodaj klienta</a>
    <div class="card mt-3 mb-3">
        <div class="card-header">
            Jan Kowalski
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p><strong>Adres klienta:</strong><br/>
                        Klonowa 53A/94<br />
                        54-132 Pisz
                    </p>
                </div>
                <div class="col">
                    <p><strong>Email: </strong> jasinska.ada@sikorski.pl</p>
                    <p><strong>Prawo jazdy: </strong> DA7785</p>
                </div>
            </div>
        </div>
    </div>
@endsection