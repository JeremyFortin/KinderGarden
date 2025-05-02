@extends('app')

@section('content')

<h1 class="m-5">Liste des dépense</h1>
<div class="container border border-info p-3">
    <div class="row row-cols-12">
        <div class="col col-2">DateTemps</div>
        <div class="col col-3">Montant</div>
        <div class="col col-2">Montant admissible</div>
        <div class="col">Commerce</div>
        <div class="col">Catégorie de dépense</div>
        <div class="col"></div>
        <div class="col">
            <form action="{{route('Clear_List_Expense')}}" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Vider la liste"
                    type="submit" onclick="alert('Êtes-vous sûr de vouloir vider la liste des dépenses ?');"></input>
            </form>
        </div>
    </div>
    @if ($expenses->count() > 0)
    @foreach ($expenses as $expense)
    <div class="row row-cols-12 my-4">
        <div class="col col-2">{{$expense->dateTime}}</div>
        <div class="col col-3">{{$expense->amount}}</div>
        <div class="col col-3">{{$expense->amount}}</div>
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
                    onclick="alert('Êtes-vous sûr de vouloir supprimer cette garderie ?');"></input>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <div class="col "><span>Aucune dépense...</span></div>
    @endif
</div>
<h1 class="m-5">Ajouter une dépense</h1>
<div class="container">
    <form action="{{ route('Add_Expense') }}" method="POST">
        @csrf
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
            <label for="expenseCategory" class="col">catégory de dépense</label>
            <select name="expenseCategory_id" id="expenseCategory" class="col">
                @foreach ($expenseCategories as $expenseCategory)
                <option value="{{$expenseCategory->id}}">{{$expenseCategory->description}}</option>
                @endforeach

            </select>
        </div>
        <div class="row my-3">
            <input type="submit" value="Ajouter">
        </div>
    </form>
</div>
@endsection