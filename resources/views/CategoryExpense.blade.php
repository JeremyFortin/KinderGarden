@extends('app')

@section('content')
<h1 class="m-5">Liste des catégories de dépense</h1>
<div class="container border border-info p-3">
    <div class="row row-cols-12">
        <div class="col col-2">description</div>
        <div class="col col-3">pourcentage</div>
        <div class="col"></div>
        <div class="col">
            <form action="{{route('Clear_List_CategoryExpense')}}" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Vider la liste"
                    type="submit" onclick="alert('Êtes-vous sûr de vouloir vider la liste des catégorie de dépenses ?');"></input>
            </form>
        </div>
    </div>
    @if ($categoriesExpenses->count() > 0)
    @foreach ($categoriesExpenses as $categoryExpense)
    <div class="row row-cols-12 my-4">
        <div class="col col-2">{{$categoryExpense->description ?? 'N/A'}}</div>
        <div class="col col-3">{{$categoryExpense->pourcentage ?? 'N/A'}}</div>
        <div class="col">
            <form action="/categoryExpense/{{$categoryExpense->id}}/edit" method="get">
                @csrf
                <input class="bg-warning border border-warning rounded text-white p-2" value="Modifier"
                    type="submit"></input>
            </form>
        </div>
        <div class="col">
            <form action="/CategoryExpense/{{$categoryExpense->id}}/delete" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Supprimer" type="submit"
                    onclick="alert('Êtes-vous sûr de vouloir supprimer ce commerce ?');"></input>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <div class="col "><span>Aucun Commerce...</span></div>
    @endif
</div>
<h1 class="m-5">Ajouter une carégory de dépense</h1>
<div class="container">
    <form action="{{ route('Add_CategoryExpense') }}" method="POST">
        @csrf
        <div class="row my-1">
            <label for="description" class="col">Description</label>
            <input type="text" name="description" id="description" class="col">
        </div>
        <div class="row my-1">
            <label for="address" class="col">Pourcentage</label>
            <input type="text" name="address" id="address" class="col">
        </div>

        <div class="row my-3">
            <input type="submit" value="Ajouter">
        </div>
    </form>
</div>
@endsection