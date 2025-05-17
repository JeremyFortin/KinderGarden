@extends('app')

@section('content')


<div class="container border border-info p-3">
    <form id="nurseryForm" action="{{ route('List_Expense') }}" method="GET">
        <div class=" w-25">
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
    <div class="row row-cols-12">
        <div class="col fw-bold text-info text-decoration-underline">DateTemps</div>
        <div class="col fw-bold text-info text-decoration-underline">Montant</div>
        <div class="col fw-bold text-info text-decoration-underline">Montant admissible</div>
        <div class="col fw-bold text-info text-decoration-underline">Commerce</div>
        <div class="col fw-bold text-info text-decoration-underline">Catégorie de dépense</div>
        <div class="col fw-bold text-info text-decoration-underline"></div>
        <div class="col fw-bold text-info text-decoration-underline">
            <form action="{{route('Clear_List_Expense')}}" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Vider la liste"
                    type="submit" onclick="return confirm('Êtes-vous sûr de vouloir vider la liste des dépenses ?');"></input>
            </form>
        </div>
    </div>
    @if ($expenses->count() > 0)
    @foreach ($expenses as $expense)
    <div class="row row-cols-12 my-4">
        <div class="col">{{$expense->dateTime ?? 'N/A'}}</div>
        <div class="col">{{$expense->amount ?? 'N/A'}}</div>
        <div class="col">{{$expense->amount ?? 'N/A'}}</div>
        <div class="col">{{$expense->commerce->description ?? 'N/A'}}</div>
        <div class="col">{{$expense->categoryExpense->description ?? 'N/A'}}</div>
        <div class="col">
            <form action="/depense/{{$expense->id}}/edit" method="get">
                @csrf
                <input class="bg-warning border border-warning rounded text-white p-2" value="Modifier"
                    type="submit"></input>
            </form>
        </div>
        <div class="col">
            <form action="/depense/{{$expense->id}}/delete" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Supprimer" type="submit"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette dépense ?');"></input>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <div class="col "><span>Aucune dépense...</span></div>
    @endif
</div>
<div class="container w-25">
    <form action="{{ route('Add_Expense') }}" method="POST">
        @csrf

        <input type="hidden" name="nursery_id" value="{{ request('nursery_id') }}">

        <div class="row my-1">
            <label for="amount" class="col">Montant</label>
            <input type="text" name="amount" id="amount" class="col">
        </div>

        <div class="row my-1">
            <label for="commerce" class="col">Commerce</label>
            <select name="commerce_id" id="commerce" class="col">
                @foreach ($commerces as $commerce)
                <option value="{{$commerce->id}}">{{$commerce->description}}</option>
                @endforeach
            </select>
        </div>

        <div class="row my-1">
            <label for="expenseCategory" class="col">Catégorie de dépense</label>
            <select name="expenseCategory_id" id="expenseCategory" class="col">
                @foreach ($expenseCategories as $expenseCategory)
                <option value="{{$expenseCategory->id}}">{{$expenseCategory->description}}</option>
                @endforeach
            </select>
        </div>

        <div class="my-3">
            <button type="submit" class="btn btn-success w-100">
                Créer
            </button>
        </div>
    </form>

</div>
@endsection