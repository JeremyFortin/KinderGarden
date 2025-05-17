<div id="navbar" class="container p-1 rounded">
    <div class="row row-cols-9 justify-content-center text-center align-items-center">
        <div class="col"><img id="logo" src="{{ asset('logo.png') }}" alt="logo garderie"></div>
        <div class="col fw-bold"><a href="{{ route('List_Nursery') }}">Garderies</a></div>
        <div class="col fw-bold"><a href="{{ route('List_Expense') }}">Dépenses</a></div>
        <div class="col fw-bold"><a href="{{ route('List_Commerce') }}">Commerces</a></div>
        <div class="col col-2 fw-bold"><a href="{{ route('List_CategoryExpense') }}">Catégories de dépense</a></div>
        <div class="col fw-bold"><a href="{{ route('List_Kid') }}">Enfants</a></div>
        <div class="col fw-bold"><a href="{{ route('List_Teacher') }}">Éducateurs</a></div>
        <div class="col fw-bold"><a href="{{ route('List_Presence') }}">Présences</a></div>
        <div class="col fw-bold"><a href="{{ route('List_State') }}">Provinces</a></div>
        <div class="col fw-bold"><a href="{{ route('Show_Rapport') }}">Rapport</a></div>
    </div>
</div>