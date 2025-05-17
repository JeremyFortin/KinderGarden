@extends('app')

@section('content')
<div class="container w-25">
    <form action="/garderies/{{ $nursery->id }}/update" method="POST">
        @method('PUT')
        @csrf
        <div class="row my-1">
            <label for="name" class="col">Nom</label>
            <input readonly type="text" name="name" id="name" value="{{ $nursery->name }}" class="col bg-light">
        </div>
        <div class="row my-1">
            <label for="address" class="col">Adresse</label>
            <input type="text" name="address" id="address" value="{{ $nursery->address }}" class="col">
        </div>
        <div class="row my-1">
            <label for="city" class="col">Ville</label>
            <input type="text" name="city" id="city" value="{{ $nursery->city }}" class="col">
        </div>
        <div class="row my-1">
            <label for="state" class="col">Province</label>
            <select name="state_id" id="state" class="col">
                @foreach($states as $state)
                <option value="{{ $state->id }}" {{ $state->id == $nursery->state_id ? 'selected' : '' }}>
                    {{ $state->description }}
                </option>
                @endforeach

            </select>
        </div>
        <div class="row my-1">
            <label for="phone" class="col">Telephone</label>
            <input type="text" pattern="{0 - 9}" name="phone" id="phone" value="{{ $nursery->phone }}" class="col">
        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-warning w-100">
                Modifier
            </button>
        </div>
    </form>
</div>
<div class="container border border-info">

    <h4>Liste des dépenses</h4>
    <div class="row row-cols-12">
        <div class="col fw-bold text-info text-decoration-underline">DateTemps</div>
        <div class="col fw-bold text-info text-decoration-underline">Montant</div>
        <div class="col fw-bold text-info text-decoration-underline">Montant admissible</div>
        <div class="col fw-bold text-info text-decoration-underline">Commerce</div>
        <div class="col fw-bold text-info text-decoration-underline">Catégorie de dépense</div>

    </div>
    @if ($expenses->count() > 0)
    @foreach ($expenses as $expense)
    <div class="row row-cols-12 my-4">
        <div class="col">{{$expense->dateTime ?? 'N/A'}}</div>
        <div class="col">{{$expense->amount ?? 'N/A'}}</div>
        <div class="col">{{$expense->amount ?? 'N/A'}}</div>
        <div class="col">{{$expense->commerce->description ?? 'N/A'}}</div>
        <div class="col">{{$expense->categoryExpense->description ?? 'N/A'}}</div>


    </div>
    @endforeach
    @else
    <div class="col "><span>Aucune dépense...</span></div>
    @endif
</div>
</div>
@endsection