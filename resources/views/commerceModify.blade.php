@extends('app')

@section('content')
<h1 class="m-5">Modifier le commerce</h1>
<div class="container">
    <form action="/commerce/{{ $commerce->id }}/update" method="POST">
        @method('PUT')
        @csrf
        <div class="row my-1">
            <label for="name" class="col">Nom</label>
            <input type="text" name="description" id="description" value="{{ $commerce->description }}" class="col">
        </div>
        <div class="row my-1">
            <label for="address" class="col">Adresse</label>
            <input type="text" name="address" id="address" value="{{ $commerce->address }}" class="col">
        </div>
        <div class="row my-1">
            <label for="phone" class="col">Telephone</label>
            <input type="text" pattern="{0 - 9}" name="phone" id="phone" value="{{ $commerce->phone }}" class="col">
        </div>
        <div class="row my-3">
            <input type="submit" value="Modifier">
        </div>
    </form>
</div>
@endsection