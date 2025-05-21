@extends('app')

@section('content')
<div class="container border border-info w-25">
    <form action="/categoryExpense/{{ $categoryExpense->id }}/update" method="POST">
        @method('PUT')
        @csrf
        <div class="row my-1">
            <label for="name" class="col">Nom</label>
            <input readonly type="text" name="description" id="description" value="{{ $categoryExpense->description }}" class="col bg-light">
        </div>
        <div class="row my-1">
            <label for="address" class="col">Pourcentage</label>
            <input type="text" name="pourcentage" id="pourcentage" value="{{ $categoryExpense->pourcentage }}" class="col">
        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-warning w-100">
                Modifier
            </button>
        </div>
    </form>
</div>
@endsection