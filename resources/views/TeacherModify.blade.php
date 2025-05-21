@extends('app')

@section('content')
<div class="container w-25">
    <form action="/teacher/{{ $teacher->id }}/update" method="POST">
        @method('PUT')
        @csrf
        <div class="row my-1">
            <label for="name" class="col">Nom</label>
            <input readonly type="text" name="name" id="name" value="{{ $teacher->name }}" class="col bg-light">
        </div>
        <div class="row my-1">
            <label for="firstName" class="col">Prenom</label>
            <input readonly type="text" name="firstName" id="firstName" value="{{ $teacher->firstName }}" class="col bg-light">
        </div>
        <div class="row my-1">
            <label for="birthdate" class="col">Date de naissance</label>
            <input readonly type="date" name="birthdate" id="birthdate" value="{{ $teacher->birthdate }}" class="col bg-light">
        </div>
        <div class="row my-1">
            <label for="address" class="col">Adresse</label>
            <input type="text" name="address" id="address" value="{{ $teacher->address }}" class="col">
        </div>
        <div class="row my-1">
            <label for="city" class="col">Ville</label>
            <input type="text" name="city" id="city" value="{{ $teacher->city }}" class="col">
        </div>
        <div class="row my-1">
            <label for="state" class="col">Province</label>
            <select name="state_id" id="state" class="col">
                @foreach($states as $state)
                <option value="{{ $state->id }}" {{ $state->id == $teacher->state_id ? 'selected' : '' }}>
                    {{ $state->description }}
                </option>
                @endforeach

            </select>
        </div>
        <div class="row my-1">
            <label for="phone" class="col">Telephone</label>
            <input type="text" pattern="{0 - 9}" name="phone" id="phone" value="{{ $teacher->phone }}" class="col">
        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-warning w-100">
                Modifier
            </button>
        </div>
    </form>
</div>
<div class="container border border-info p-3">
    <h4 class="">Liste des présences</h4>
    <div class="row row-cols-12">
        <div class="col  fw-bold text-info text-decoration-underline">Date</div>
        <div class="col fw-bold text-info text-decoration-underline">Nom enfant</div>
        <div class="col fw-bold text-info text-decoration-underline">Prenom enfant</div>
        <div class="col fw-bold text-info text-decoration-underline">Date de naissance enfant</div>
        <div class="col fw-bold text-info text-decoration-underline">Nom éducateur</div>
        <div class="col fw-bold text-info text-decoration-underline">Prénom éducateur</div>
        <div class="col fw-bold text-info text-decoration-underline">Date de naissance éducateur</div>

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


    </div>
    @endforeach
    @else
    <div class="col "><span>Aucune présence...</span></div>
    @endif
</div>
@endsection