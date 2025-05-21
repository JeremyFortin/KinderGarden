@extends('app')

@section('content')
<div class="container border border-info p-3">
    <div class="row row-cols-12">
        <div class="col fw-bold text-info text-decoration-underline">Nom</div>
        <div class="col fw-bold text-info text-decoration-underline">Adresse</div>
        <div class="col fw-bold text-info text-decoration-underline">Telephone</div>
        <div class="col"></div>
        <div class="col">
            <form action="{{route('Clear_List_Commerce')}}" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Vider la liste"
                    type="submit" onclick="return confirm('Êtes-vous sûr de vouloir vider la liste des commerce ?');"></input>
            </form>
        </div>
    </div>
    @if ($commerces->count() > 0)
    @foreach ($commerces as $commerce)
    <div class="row row-cols-12 my-4">
        <div class="col">{{$commerce->description ?? 'N/A'}}</div>
        <div class="col">{{$commerce->address ?? 'N/A'}}</div>
        <div class="col">{{$commerce->phone ?? 'N/A'}}</div>
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
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commerce ?');"></input>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <div class="col "><span>Aucun Commerce...</span></div>
    @endif
</div>
<div class="container w-25">
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

        <div class="my-3">
            <button type="submit" class="btn btn-success w-100">
                Créer
            </button>
        </div>
    </form>
</div>
@endsection