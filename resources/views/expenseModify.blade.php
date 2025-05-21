@extends('app')

@section('content')
<div class="container border border-info w-25">
    <form action="/depense/{{ $expense->id }}/update" method="POST">
        @method('PUT')
        @csrf
        <div class="row my-1">
            <label for="amount" class="col">Montant(CAD$)</label>
            <input type="text" name="amount" id="amount" value="{{ $expense->amount }}" class="col">
        </div>
        <div class="row my-1">
            <label for="commerce" class="col">Commerce</label>
            <select name="commerce_id" id="commerce" class="col">
                @foreach($commerces as $commerce)
                <option value="{{ $commerce->id }}" {{ $commerce->id == $expense->commerce_id ? 'selected' : '' }}>
                    {{ $commerce->description }}
                </option>
                @endforeach

            </select>
        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-warning w-100">
                Modifier
            </button>
        </div>
    </form>
</div>
@endsection