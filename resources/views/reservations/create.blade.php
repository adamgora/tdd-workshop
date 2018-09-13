@extends('layouts.app')

@section('content')
    <form action="#">
        <div class="form-group">
            <label for="car">Wybierz samochód</label>
            <select class="form-control" id="car_id" name="car_id">
                <option>-- WYBIERZ --</option>
                <option>samochód 1</option>
                <option>samochód 2</option>
            </select>
        </div>

        <div class="form-group">
            <label for="car">Wybierz klienta</label>
            <select class="form-control" id="customer_id" name="customer_id">
                <option>-- WYBIERZ --</option>
                <option>klient 1</option>
                <option>klient 2</option>
            </select>
        </div>

        <div class="form-group">
            <label for="from">Wypożyczenie od</label>
            <input type="text" class="form-control" id="from" name="from" placeholder="1970-01-01 00:00:00">
        </div>

        <div class="form-group">
            <label for="from">Wypożyczenie do</label>
            <input type="text" class="form-control" id="to" name="to" placeholder="1970-01-01 00:00:00">
        </div>

        <div class="form-group">
            <label for="total_cost">Kwota całkowita</label>
            <input type="text" class="form-control" id="total_cost" name="total_cost" placeholder="100.00">
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Zapisz</button>
        </div>
    </form>
@endsection