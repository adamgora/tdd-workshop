@extends('layouts.app')

@section('content')
    <a href="{{ route('reservations.create') }}" class="btn btn-success">Utwórz rezerwację</a>
    @foreach($reservations as $reservation)
        <div class="card mt-3 mb-3">
            <div class="card-header">
                {{$reservation->customer->name}} - {{$reservation->car->registration_number}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p><strong>Wypożyczenie od: </strong> {{ $reservation->from }}</p>
                        <p><strong>Wypożyczenie do: </strong> {{ $reservation->to }}</p>
                    </div>
                    <div class="col">
                        <p><strong>Status: </strong> W TRAKCIE</p>
                        <p><strong>Koszt całkowity: </strong> {{ $reservation->total_cost }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection