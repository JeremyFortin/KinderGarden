@extends('app')

@section('content')
<h1 class="m-5">Modifier la dépsense</h1>
<div class="container">
    <form action="/depense/{{ $expense->id }}/update" method="POST">
        @method('PUT')
        @csrf
        <div class="row my-1">
            <label for="amount" class="col">amount</label>
            <input type="text" name="amount" id="amount" value="{{ $expense->amount }}" class="col">
        </div>
        <div class="row my-1">
            <label for="commerce" class="col">commerce</label>
            <select name="commerce_id" id="commerce" class="col">
                @foreach($commerces as $commerce)
                <option value="{{ $commerce->id }}" {{ $commerce->id == $expense->commerce_id ? 'selected' : '' }}>
                    {{ $commerce->description }}
                </option>
                @endforeach

            </select>
        </div>
        <div class="row my-3">
            <input type="submit" value="Modifier">
        </div>
    </form>
</div>
@endsection