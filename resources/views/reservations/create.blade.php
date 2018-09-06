@extends('layouts.app')

@section('content')
    <form action="{{ route('reservations.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="car">Wybierz samochód</label>
            <select class="form-control" id="car_id" name="car_id">
                <option value="0">-- WYBIERZ --</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->registration_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="car">Wybierz klienta</label>
            <select class="form-control" id="customer_id" name="customer_id">
                <option value="0">-- WYBIERZ --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="from">Wypożyczenie od</label>
            <input type="text" class="form-control" name="from" id="from" placeholder="1970-01-01 00:00:00">
        </div>

        <div class="form-group">
            <label for="from">Wypożyczenie do</label>
            <input type="text" class="form-control" name="to" id="to" placeholder="1970-01-01 00:00:00">
        </div>

        <div class="form-group">
            <label for="total_cost">Kwota całkowita</label>
            <input type="text" class="form-control" name="total_cost" id="total_cost" placeholder="100.00">
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Zapisz</button>
        </div>
    </form>
@endsection