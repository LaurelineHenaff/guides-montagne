<x-layout>

  <h1 class="mb-4">Détail de la Randonnée</h1>

  <a class="btn btn-secondary btn-sm mb-3" href="/randonnees">
    <i class="bi bi-arrow-left"></i> Retour
  </a>

  @if(count($concerner) > 0)
    <div class="card mx-auto text-bg-light" style="max-width: 35rem;">
      <div class="card-header">
        Randonnée du <strong>{{ $debut }}</strong> au <strong>{{ $fin }}</strong>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col">
                <p class="card-text">Guide : <span class="fw-semibold">{{ $guide }}</span></p>
            </div>
            <div class="col">
                <p class="card-text">Nombre de Personnes : <span class="fw-semibold">{{ $nbPersonnes }}</span></p>
            </div>
        </div>

        <table class="table table-sm align-middle table-hover mt-4">
          <thead>
            <tr>
              <th>Date</th>
              <th>Abris</th>
              <th>Sommet</th>
              <th>Statut</th>
            </tr>
          </thead>
      
          <tbody class="table-group-divider">
      
            @foreach ($concerner as $c)
              <tr>
                <td>{{ $c->date_Concerner }}</td>
                <td>{{ $c->nom_Abris }}</td>
                <td>{{ $c->nom_Sommets }}</td>
                <td>{{ $c->statut_Reserver }}</td>
              </tr>
            @endforeach
      
          </tbody>
        </table>
      </div>
    </div>
  @else
    <div class="alert alert-info">Aucune donnée.</div>
  @endif            
        
</x-layout>