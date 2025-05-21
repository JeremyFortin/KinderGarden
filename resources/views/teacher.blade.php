@extends('app')

@section('content')
<h1 class="m-5">Liste des educateurs</h1>
<div class="container border border-info p-3">
    <div class="row row-cols-12">
        <div class="col fw-bold text-info text-decoration-underline">Nom</div>
        <div class="col fw-bold text-info text-decoration-underline">Prenom</div>
        <div class="col fw-bold text-info text-decoration-underline">Date de naissance</div>
        <div class="col fw-bold text-info text-decoration-underline">Adresse</div>
        <div class="col fw-bold text-info text-decoration-underline">Ville</div>
        <div class="col fw-bold text-info text-decoration-underline">Province</div>
        <div class="col fw-bold text-info text-decoration-underline">Telephone</div>
        <div class="col"></div>
        <div class="col">
            <form action="{{route('Clear_List_Teacher')}}" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Vider la liste"
                    type="submit" onclick="return confirm('Êtes-vous sûr de vouloir vider la liste des éducateurs ?');"></input>
            </form>
        </div>
    </div>
    @if ($teachers->count() > 0)
    @foreach ($teachers as $teacher)
    <div class="row row-cols-12 my-4">
        <div class="col ">{{$teacher->name ?? 'N/A'}}</div>
        <div class="col ">{{$teacher->firstName ?? 'N/A'}}</div>
        <div class="col ">{{$teacher->birthdate ?? 'N/A'}}</div>
        <div class="col ">{{$teacher->address ?? 'N/A'}}</div>
        <div class="col ">{{$teacher->city ?? 'N/A'}}</div>
        <div class="col ">{{$teacher->state->description ?? 'N/A'}}</div>
        <div class="col ">{{$teacher->phone}}</div>

        <div class="col">
            <form action="/teacher/{{$teacher->id}}/edit" method="get">
                @csrf
                <input class="bg-warning border border-warning rounded text-white p-2" value="Modifier"
                    type="submit"></input>
            </form>
        </div>
        <div class="col">
            <form action="/teacher/{{$teacher->id}}/delete" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Supprimer" type="submit"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette éducateur ?');"></input>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <div class="col "><span>Aucun éducateur...</span></div>
    @endif
</div>
<div class="container w-25">
    <form action="{{ route('Add_Teacher') }}" method="POST">
        @csrf
        <div class="row my-1">
            <label for="name" class="col">Nom</label>
            <input type="text" name="name" id="name" class="col">
        </div>
        <div class="row my-1">
            <label for="firstName" class="col">Prenom</label>
            <input type="text" name="firstName" id="firstName" class="col">
        </div>
        <div class="row my-1">
            <label for="birthdate" class="col">Date de naissance</label>
            <input type="date" name="birthdate" id="birthdate" class="col">
        </div>
        <div class="row my-1">
            <label for="address" class="col">Adresse</label>
            <input type="text" name="address" id="address" class="col">
        </div>
        <div class="row my-1">
            <label for="city" class="col">Ville</label>
            <input type="text" name="city" id="city" class="col">
        </div>
        <div class="row my-1">
            <label for="state" class="col">Province</label>
            <select name="state_id" id="state" class="col">
                @foreach ($states as $state)
                <option value="{{$state->id}}">{{$state->description}}</option>
                @endforeach

            </select>
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