<x-layout>

    <h1 class="mb-4">Liste des Vallées <span class="small text-secondary fw-normal">[{{count($vallees)}}]</span></h1>
    
    <a class="btn btn-success btn-sm mb-3" href="/vallees/create">
      <i class="bi bi-plus-lg"></i> Ajouter
    </a>
    
    @if (count($vallees) > 0)
      <table class="table table-sm align-middle table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th style="width: 1%;">Actions</th>
          </tr>
        </thead>
    
        <tbody class="table-group-divider">
    
          @foreach ($vallees as $vallee)
            <tr>
              <td>{{ $vallee->code_Vallees }}</td>
              <td>{{ $vallee->nom_Vallees }}</td>
              <td class="d-flex gap-1">
                <a class="btn btn-primary btn-sm" href="/vallees/{{ $vallee->code_Vallees }}/edit"><i class="bi bi-pencil"></i></a>
                <a class="btn btn-danger btn-sm" href="/vallees/{{ $vallee->code_Vallees }}/delete"><i class="bi bi-trash"></i></a>
                {{-- Bouton d'action de suppression sans confirmation --}}
                {{-- <form action="/vallees/{{ $vallee->code_Vallees }}" method="POST">
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
      <div class="alert alert-info">Aucune vallée.</div>
    @endif
    
    </x-layout>