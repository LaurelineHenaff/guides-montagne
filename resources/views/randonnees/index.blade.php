<x-layout>

  <h1 class="mb-4">Liste des Randonnées <span class="small text-secondary fw-normal">[{{count($randonnees)}}]</span></h1>
  
  @if (count($randonnees) > 0)
    <table class="table table-sm align-middle table-hover">
      <thead>
        <tr>
          {{-- <th>Id</th> --}}
          <th>Début</th>
          <th>Fin</th>
          <th>Nb Personnes</th>
          <th>Guide</th>
          <th style="width: 1%;">Actions</th>
        </tr>
      </thead>
  
      <tbody class="table-group-divider">
  
        @foreach ($randonnees as $randonnee)
          <tr>
            {{-- <td>{{ $randonnee->code_Randonnees }}</td> --}}
            <td>{{ $randonnee->dateDebut_Randonnees }}</td>
            <td>{{ $randonnee->dateFin_Randonnees }}</td>
            <td>{{ $randonnee->nbPersonnes_Randonnees }}</td>
            <td>{{ $randonnee->guide->prenom_Guides }} {{ $randonnee->guide->nom_Guides }}</td>
            <td>
              <div class="d-flex gap-1 justify-content-end">
                <a class="btn btn-success btn-sm" href="/randonnees/{{ $randonnee->code_Randonnees }}"><i class="bi bi-eye"></i></a>
              </div>
            </td>
          </tr>
        @endforeach
  
      </tbody>
    </table>
  @else
    <div class="alert alert-info">Aucune randonnée.</div>
  @endif
    
</x-layout>