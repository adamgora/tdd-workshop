@extends('layouts.app')

@section('content')
    <div class="col-6 offset-3">
        <form action="{{ route('customers.store') }}" method="POST">
            {{ @csrf_field() }}
            <div class="form-group">
                <label for="from">Imię i nazwisko</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="from">Ulica i numer</label>
                <input type="text" class="form-control" id="street" name="street">
            </div>

            <div class="form-group">
                <label for="from">Miejscowość</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>

            <div class="form-group">
                <label for="from">Kod pocztowy</label>
                <input type="text" class="form-control" id="zip" name="zip">
            </div>

            <div class="form-group">
                <label for="from">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="from">Seria i numer prawa jazdy</label>
                <input type="text" class="form-control" id="driver_licence_number" name="driver_licence_number">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Zapisz</button>
            </div>
        </form>
    </div>
@endsection