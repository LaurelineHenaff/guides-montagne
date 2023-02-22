<x-layout>

  <h1 class="mb-4">Liste des Abris <span class="small text-secondary fw-normal">[{{count($abris)}}]</span></h1>
  
  <a class="btn btn-success btn-sm mb-3" href="/abris/create">
    <i class="bi bi-plus-lg"></i> Ajouter
  </a>
  
  @if (count($abris) > 0)
    <table class="table table-sm align-middle table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nom</th>
          <th>Type</th>
          <th>Altitude</th>
          <th>Places</th>
          <th>Prix Nuit</th>
          <th>Prix Repas</th>
          <th>Tel. Gardien</th>
          <th>Vallée</th>
          <th style="width: 1%;">Actions</th>
        </tr>
      </thead>
  
      <tbody class="table-group-divider">
  
        @foreach ($abris as $abri)
          <tr>
            <td>{{ $abri->code_Abris }}</td>
            <td>{{ $abri->nom_Abris }}</td>
            <td>{{ $abri->type_Abris }}</td>
            <td>{{ $abri->altitude_Abris }}</td>
            <td>{{ $abri->places_Abris }}</td>
            <td>{{ $abri->prixNuit_Abris }}</td>
            <td>{{ $abri->prixRepas_Abris }}</td>
            <td>{{ $abri->telGardien_Abris }}</td>
            <td>{{ $abri->vallee->nom_Vallees }}</td>
            <td class="d-flex gap-1">
              <a class="btn btn-primary btn-sm" href="/abris/{{ $abri->code_Abris }}/edit"><i class="bi bi-pencil"></i></a>
              <a class="btn btn-danger btn-sm" href="/abris/{{ $abri->code_Abris }}/delete"><i class="bi bi-trash"></i></a>
              {{-- Bouton d'action de suppression sans confirmation --}}
              {{-- <form action="/abris/{{ $abri->code_Abris }}" method="POST">
                @csrf
                @method('DELETE')
                
                <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i></button>
              </form> --}}
            </td>
          </tr>
        @endforeach
  
      </tbody>
    </table>
  @else
    <div class="alert alert-info">Aucun abri.</div>
  @endif
    
</x-layout>