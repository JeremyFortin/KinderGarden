@extends('app')

@section('content')
<h1 class="m-5">Liste des commerce</h1>
<div class="container border border-info p-3">
    <div class="row row-cols-12">
        <div class="col col-2">Nom</div>
        <div class="col col-3">Adresse</div>
        <div class="col col-2">Telephone</div>
        <div class="col"></div>
        <div class="col">
            <form action="{{route('Clear_List_Commerce')}}" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Vider la liste"
                    type="submit" onclick="alert('Êtes-vous sûr de vouloir vider la liste des commerce ?');"></input>
            </form>
        </div>
    </div>
    @if ($commerces->count() > 0)
    @foreach ($commerces as $commerce)
    <div class="row row-cols-12 my-4">
        <div class="col col-2">{{$commerce->description ?? 'N/A'}}</div>
        <div class="col col-3">{{$commerce->address}}</div>
        <div class="col col-2">{{$commerce->phone}}</div>
        <div class="col">
            <form action="/commerce/{{$commerce->id}}/edit" method="get">
                @csrf
                <input class="bg-warning border border-warning rounded text-white p-2" value="Modifier"
                    type="submit"></input>
            </form>
        </div>
        <div class="col">
            <form action="/commerce/{{$commerce->id}}/delete" method="post">
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
<h1 class="m-5">Ajouter un commerce</h1>
<div class="container">
    <form action="{{ route('Add_Commerce') }}" method="POST">
        @csrf
        <div class="row my-1">
            <label for="description" class="col">Nom</label>
            <input type="text" name="description" id="description" class="col">
        </div>
        <div class="row my-1">
            <label for="address" class="col">Adresse</label>
            <input type="text" name="address" id="address" class="col">
        </div>
        <div class="row my-1">
            <label for="phone" class="col">Telephone</label>
            <input type="text" pattern="{0 - 9}" name="phone" id="phone" class="col">
        </div>

        <div class="row my-3">
            <input type="submit" value="Ajouter">
        </div>
    </form>
</div>
@endsection