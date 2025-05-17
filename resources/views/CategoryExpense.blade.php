@extends('app')

@section('content')
<div class="container border border-info p-3">
    <div class="row row-cols-12">
        <div class="col fw-bold text-info text-decoration-underline">description</div>
        <div class="col fw-bold text-info text-decoration-underline">pourcentage</div>
        <div class="col"></div>
        <div class="col">
            <form action="{{route('Clear_List_CategoryExpense')}}" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Vider la liste"
                    type="submit" onclick="return confirm('Êtes-vous sûr de vouloir vider la liste des catégorie de dépenses ?');"></input>
            </form>
        </div>
    </div>
    @if ($categoriesExpenses->count() > 0)
    @foreach ($categoriesExpenses as $categoryExpense)
    <div class="row row-cols-12 my-4">
        <div class="col">{{$categoryExpense->description ?? 'N/A'}}</div>
        <div class="col">{{$categoryExpense->pourcentage ?? 'N/A'}}</div>
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
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie de dépense ?');"></input>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <div class="col "><span>Aucune catégorie de dépense...</span></div>
    @endif
</div>

<div class="container w-25">
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

        <div class="my-3">
            <button type="submit" class="btn btn-success w-100">
                Créer
            </button>
        </div>
    </form>
</div>
@endsection