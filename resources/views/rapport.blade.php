@extends('app')

@section('content')
<div class="container mt-4">


    <form id="nurseryForm" action="{{ route('Show_Rapport') }}" method="GET">
        <div class="mt-3">
            <label for="nursery" class="col">Garderie</label>
            <select name="nursery_id" id="nursery" class="col" onchange="document.getElementById('nurseryForm').submit();">
                @foreach ($nurseries as $nursery)
                <option value="{{ $nursery->id }}"
                    {{ request('nursery_id') == $nursery->id ? 'selected' : '' }}>
                    {{ $nursery->name }}
                </option>
                @endforeach
            </select>
        </div>
    </form>



    <h3 class="text-info mt-4">Rapport</h3>

    <div class="border border-info rounded p-3 mt-3">
        <p>Total des revenus : {{ $nbPresences }} présences X 48$ = {{ $revenus }}$</p>
        <p>Total des dépenses : Dépenses admissibles : {{ $depensesAdmissibles }}$ + Total des salaires : {{ $salaires }}$ = {{ $depensesTotal }}$</p>
        <p>Profit = Revenus({{ $revenus }}$) - Dépenses ({{ $depensesTotal }}$) = {{ $profit }}$</p>
    </div>

    <p class="text-primary mt-2">
        *Total des salaires = nombre de présence d’éducatrice * 8h * 18$/heure
    </p>

</div>
@endsection