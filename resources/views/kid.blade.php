@extends('app')

@section('content')
<div class="container border border-info p-3">
    <div class="row row-cols-12">
        <div class="col  fw-bold text-info text-decoration-underline">Nom</div>
        <div class="col fw-bold text-info text-decoration-underline">Prenom</div>
        <div class="col fw-bold text-info text-decoration-underline">Date de naissance</div>
        <div class="col fw-bold text-info text-decoration-underline">Adresse</div>
        <div class="col fw-bold text-info text-decoration-underline">Ville</div>
        <div class="col fw-bold text-info text-decoration-underline">Province</div>
        <div class="col fw-bold text-info text-decoration-underline">Telephone</div>
        <div class="col"></div>
        <div class="col">
            <form action="{{route('Clear_List_Kid')}}" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="    💣    "
                    type="submit" onclick="return confirm('Êtes-vous sûr de vouloir vider la liste des enfants ?');"></input>
            </form>
        </div>
    </div>
    @if ($kids->count() > 0)
    @foreach ($kids as $kid)
    <div class="row row-cols-12 my-4">
        <div class="col">{{$kid->name ?? 'N/A'}}</div>
        <div class="col">{{$kid->firstName ?? 'N/A'}}</div>
        <div class="col">{{$kid->birthdate ?? 'N/A'}}</div>
        <div class="col">{{$kid->address ?? 'N/A'}}</div>
        <div class="col">{{$kid->city ?? 'N/A'}}</div>
        <div class="col">{{$kid->state->description ?? 'N/A'}}</div>
        <div class="col">{{$kid->phone ?? 'N/A'}}</div>

        <div class="col">
            <form action="/kid/{{$kid->id}}/edit" method="get">
                @csrf
                <input class="bg-warning border border-warning rounded text-white p-2" value="Modifier"
                    type="submit"></input>
            </form>
        </div>
        <div class="col">
            <form action="/kid/{{$kid->id}}/delete" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Tuer 🔪" type="submit"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette enfant ?');"></input>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <div class="col "><span>Aucun enfant...</span></div>
    @endif
</div>
<div class="container  w-25">
    <form action="{{ route('Add_Kid') }}" method="POST">
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