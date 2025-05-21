@extends('app')

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@section('content')
<div class="container border border-info p-3">
    <div class="row row-cols-12">
        <div class="col col-2  fw-bold text-info text-decoration-underline">Nom</div>
        <div class="col"></div>
    </div>
    @if ($states->count() > 0)
    @foreach ($states as $state)
    <div class="row row-cols-12 my-4">
        <div class="col col-2">{{$state->description ?? 'N/A'}}</div>
        <div class="col">
            <form action="/state/{{$state->id}}/delete" method="post">
                @method('DELETE')
                @csrf
                <input class="bg-danger border border-danger rounded text-white p-2" value="Supprimer" type="submit"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette province ?');"></input>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <div class="col "><span>Aucune province...</span></div>
    @endif
</div>
<div class="container  w-25">
    <form action="{{ route('Add_State') }}" method="POST">
        @csrf
        <div class="row my-1">
            <label for="description" class="col">Nom</label>
            <input type="text" name="description" id="description" class="col">
        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-success w-100">
                Créer
            </button>
        </div>
    </form>
</div>
@endsection