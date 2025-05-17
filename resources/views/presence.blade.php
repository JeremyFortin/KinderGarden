@extends('app')

@section('content')
<div class="container border border-info p-3">
    <div class="row row-cols-12">
        <div class="col  fw-bold text-info text-decoration-underline">Date</div>
        <div class="col  fw-bold text-info text-decoration-underline">Nom enfant</div>
        <div class="col  fw-bold text-info text-decoration-underline">Prenom enfant</div>
        <div class="col  fw-bold text-info text-decoration-underline">Date de naissance enfant</div>
        <div class="col  fw-bold text-info text-decoration-underline">Nom éducateur</div>
        <div class="col  fw-bold text-info text-decoration-underline">Prénom éducateur</div>
        <div class="col  fw-bold text-info text-decoration-underline">Date de naissance éducateur</div>
        <div class="col">
            <form action="{{route('Clear_List_Presence')}}" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Vider la liste"
                    type="submit" onclick="return confirm('Êtes-vous sûr de vouloir vider la liste des présences ?');"></input>
            </form>
        </div>
    </div>
    @if ($presences->count() > 0)
    @foreach ($presences as $presence)
    <div class="row row-cols-12 my-4">
        <div class="col ">{{$presence->presence_date ?? 'N/A'}}</div>
        <div class="col ">{{$presence->kid->name ?? 'N/A'}}</div>
        <div class="col ">{{$presence->kid->firstName ?? 'N/A'}}</div>
        <div class="col ">{{$presence->kid->birthdate ?? 'N/A'}}</div>
        <div class="col ">{{$presence->teacher->name ?? 'N/A'}}</div>
        <div class="col ">{{$presence->teacher->firstName ?? 'N/A'}}</div>
        <div class="col ">{{$presence->teacher->birthdate ?? 'N/A'}}</div>

        <div class="col">
            <form action="/presence/{{$presence->id}}/delete" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Supprimer" type="submit"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette présence ?');"></input>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <div class="col "><span>Aucune présence...</span></div>
    @endif
</div>
<div class="container  w-25">
    <form action="{{ route('Add_Presence') }}" method="POST">
        @csrf
        <div class="row my-1">
            <label for="presence_date" class="col">Date:</label>
            <input type="date" name="presence_date" id="presence_date" class="col">
        </div>

        <div class="row my-1">
            <label for="kid_id" class="col">Enfant:</label>
            <select name="kid_id" id="kid_id" class="col">
                @foreach ($kids as $kid)
                <option value="{{$kid->id}}">{{$kid->name . " | " . $kid->firstName . " | " . $kid->birthdate}}</option>
                @endforeach

            </select>
        </div>
        <div class="row my-1">
            <label for="teacher_id" class="col">Éducateur:</label>
            <select name="teacher_id" id="teacher_id" class="col">
                @foreach ($teachers as $teacher)
                <option value="{{$teacher->id}}">{{$teacher->name . " | " . $teacher->firstName . " | " . $teacher->birthdate}}</option>
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