@extends('layouts.app')

@section('content')
    <a href="{{ route('reservations.create') }}" class="btn btn-success">Utwórz rezerwację</a>
    <div class="card mt-3 mb-3">
        <div class="card-header">
            Jan Kowalski - SC 000AA
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p><strong>Wypożyczenie od: </strong> 2018-09-01</p>
                    <p><strong>Wypożyczenie do: </strong> 2018-09-10</p>
                </div>
                <div class="col">
                    <p><strong>Status: </strong> W TRAKCIE</p>
                    <p><strong>Koszt całkowity: </strong> 200 zł</p>
                </div>
            </div>
        </div>
    </div>
@endsection