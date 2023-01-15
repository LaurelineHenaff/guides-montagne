<x-layout>

  <h1 class="mb-4">Détail de la Randonnée</h1>

  <a class="btn btn-secondary btn-sm mb-3" href="/randonnees">
    <i class="bi bi-arrow-left"></i> Retour
  </a>

  <div class="card mx-auto text-bg-light" style="max-width: 30rem;">
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
            <th>Sommet</th>
          </tr>
        </thead>
    
        <tbody class="table-group-divider">
    
          @foreach ($concerner as $c)
            <tr>
              <td>{{ $c->date_Concerner }}</td>
              <td>{{ $c->nom_Sommets }}</td>
            </tr>
          @endforeach
    
        </tbody>
      </table>            
    </div>
  </div>
        
    {{-- {{dd($concerner, $debut)}} --}}
</x-layout>