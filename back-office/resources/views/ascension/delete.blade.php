<x-layout>

  <h1 class="mb-4 fs-3">Confirmer la suppression</h1>

  <div class="alert alert-warning">
    <i class="bi bi-exclamation-triangle-fill me-3"></i>Vous êtes sur le point de supprimer l'ascension depuis l'abri <strong>{{$abri->nom_Abris}}</strong> vers le sommet <strong>{{$sommet->nom_Sommets}}</strong> !
  </div>

  @php
    $numRandonnees = count($randonnees) ?? 0;
  @endphp
      
  {{-- Affichage des randonnées --}}
  @if ($numRandonnees > 0)
    <div class="alert alert-info">
      <i class="bi bi-info-circle-fill me-3"></i>Cela entrainera la suppression de <strong>{{$numRandonnees}}</strong> randonnée{{$numRandonnees > 1 ? 's' : ''}} associée{{$numRandonnees > 1 ? 's' : ''}} à cet abri ainsi que ses réservations :
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

  <form action="/ascension/{{ $abri->code_Abris }}/{{ $sommet->code_Sommets }}" method="POST" class="mt-5">
    @csrf
    @method('delete')

    <button type="submit" class="btn btn-danger me-2">Confirmer</button>
    <a href="/ascension" class="btn btn-secondary">Annuler</a>
  </form>
  
</x-layout>