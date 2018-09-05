@extends('layouts.app')

@section('content')
    <div class="card">
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
                    <p><strong>Koszt całkowity: </strong> {{ $reservation->cost }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection