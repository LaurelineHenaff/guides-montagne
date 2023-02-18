<x-layout>

  <h1 class="mb-4 fs-3">Confirmer la suppression</h1>

  <div class="alert alert-warning">
    <i class="bi bi-exclamation-triangle-fill me-3"></i>Vous êtes sur le point de supprimer la vallée : <strong>{{$vallee->nom_Vallees}}</strong> !
  </div>

  @php
    $numAbris = count($abris) ?? 0;
    $numAscensions = count($ascensions) ?? 0;
    $numRandonnees = count($randonnees) ?? 0;
  @endphp

  @if ($numAbris > 0)
    {{-- Affichage des abris --}}
    <div class="alert alert-info">
      <i class="bi bi-info-circle-fill me-3"></i>Cela entrainera la suppression de <strong>{{$numAbris}}</strong> abri{{$numAbris > 1 ? 's' : ''}} présent{{$numAbris > 1 ? 's' : ''}} dans cette vallée :
    </div>
    <table class="table table-sm align-middle table-hover">
      <thead>
        <tr>
          <th>Abris</th>
          <th>Type</th>
          <th>Altitude</th>
        </tr>
      </thead>
  
      <tbody class="table-group-divider">
      @foreach ($abris as $abri)
        <tr>
          <td>{{$abri->nom_Abris}}</td>
          <td>{{$abri->type_Abris}}</td>
          <td>{{$abri->altitude_Abris}}</td>
        </tr>
      @endforeach
    </table> 
  @endif
  
  @if ($numAscensions > 0)
    {{-- Affichage des ascensions --}}
    <div class="alert alert-info">
      <i class="bi bi-info-circle-fill me-3"></i>Cela entrainera aussi la suppression de <strong>{{$numAscensions}}</strong> ascension{{$numAscensions > 1 ? 's' : ''}} associée{{$numAscensions > 1 ? 's' : ''}} :
    </div>
    <table class="table table-sm align-middle table-hover">
      <thead>
        <tr>
          <th>Ascension</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">
      @foreach ($ascensions as $ascension)
        <tr>
          <td>Depuis <span class="fw-semibold">{{$ascension->nom_Abris}}</span> vers <span class="fw-semibold">{{$ascension->nom_Sommets}}</span></td>
        </tr>
      @endforeach
    </table> 
  @endif

  @if ($numRandonnees > 0)
    {{-- Affichage des randonnées --}}
    <div class="alert alert-info">
      <i class="bi bi-info-circle-fill me-3"></i>Cela entrainera la suppression de <strong>{{$numRandonnees}}</strong> randonnée{{$numRandonnees > 1 ? 's' : ''}} associée{{$numRandonnees > 1 ? 's' : ''}} à cette vallée ainsi que ses réservations :
    </div>
    <table class="table table-sm align-middle table-hover">
      <legend>Randonnée{{$numRandonnees > 1 ? 's' : ''}}</legend>
      <thead>
        <tr>
          <th>Guide</th>
          <th>Date début</th>
          <th>Date fin</th>
          <th>Réservations</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">
      @foreach ($randonnees as $randonnee)
        <tr>
          <td>{{$randonnee->nom_guide}}</td>
          <td>{{$randonnee->dateDebut_Randonnees}}</td>
          <td>{{$randonnee->dateFin_Randonnees}}</td>
          <td>{{$randonnee->nombre_reservations}}</td>
        </tr>
      @endforeach
    </table> 
  @endif

  <form action="/vallees/{{ $vallee->code_Vallees }}" method="POST" class="mt-5">
    @csrf
    @method('delete')

    <button type="submit" class="btn btn-danger me-2">Confirmer</button>
    <a href="/vallees" class="btn btn-secondary">Annuler</a>
  </form>

</x-layout>