@extends('app')

@section('content')
<div class="container border border-info w-25">
    <form action="/commerce/{{ $commerce->id }}/update" method="POST">
        @method('PUT')
        @csrf
        <div class="row my-1">
            <label for="name" class="col">Nom</label>
            <input readonly type="text" name="description" id="description" value="{{ $commerce->description }}" class="col bg-light">
        </div>
        <div class="row my-1">
            <label for="address" class="col">Adresse</label>
            <input type="text" name="address" id="address" value="{{ $commerce->address }}" class="col">
        </div>
        <div class="row my-1">
            <label for="phone" class="col">Telephone</label>
            <input type="text" pattern="{0 - 9}" name="phone" id="phone" value="{{ $commerce->phone }}" class="col">
        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-warning w-100">
                Modifier
            </button>
        </div>
    </form>
</div>
@endsection