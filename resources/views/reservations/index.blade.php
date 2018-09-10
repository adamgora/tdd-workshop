@extends('layouts.app')

@section('content')
    <a href="{{ route('reservations.create') }}" class="btn btn-success">Utwórz rezerwację</a>
    @foreach($reservations as $reservation)
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        {{$reservation->customer->name}} - {{$reservation->car->registration_number}}
                    </div>
                    @can('delete', \App\Reservation::class)
                        <div class="col text-right">
                            <form method="POST" action="{{ route('reservations.delete', $reservation->id) }}">
                                {{ @csrf_field()  }}
                                {{ @method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Anuluj</button>
                            </form>
                        </div>
                    @endcan
                </div>
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