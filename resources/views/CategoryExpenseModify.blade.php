@extends('app')

@section('content')
<h1 class="m-5">Modifier la carégorie de dépense</h1>
<div class="container">
    <form action="/categoryExpense/{{ $categoryExpense->id }}/update" method="POST">
        @method('PUT')
        @csrf
        <div class="row my-1">
            <label for="name" class="col">description</label>
            <input type="text" name="description" id="description" value="{{ $categoryExpense->description }}" class="col">
        </div>
        <div class="row my-1">
            <label for="address" class="col">pourcentage</label>
            <input type="text" name="pourcentage" id="pourcentage" value="{{ $categoryExpense->pourcentage }}" class="col">
        </div>
        <div class="row my-3">
            <input type="submit" value="Modifier">
        </div>
    </form>
</div>
@endsection