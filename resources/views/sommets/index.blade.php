<x-layout>

    <h1 class="mb-4">Liste des Sommets <span class="small text-secondary fw-normal">[{{count($sommets)}}]</span></h1>
    
    <a class="btn btn-success btn-sm mb-3" href="/sommets/create">
      <i class="bi bi-plus-lg"></i> Ajouter
    </a>
    
    @if (count($sommets) > 0)
      <table class="table table-sm align-middle table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Altitude</th>
            <th style="width: 1%;">Actions</th>
          </tr>
        </thead>
    
        <tbody class="table-group-divider">
    
          @foreach ($sommets as $sommet)
            <tr>
              <td>{{ $sommet->code_Sommets }}</td>
              <td>{{ $sommet->nom_Sommets }}</td>
              <td>{{ $sommet->altitude_Sommets }}</td>
              <td class="d-flex gap-1">
                <a class="btn btn-primary btn-sm" href="/sommets/{{ $sommet->code_Sommets }}/edit"><i class="bi bi-pencil"></i></a>
                <a class="btn btn-danger btn-sm" href="/sommets/{{ $sommet->code_Sommets }}/delete"><i class="bi bi-trash"></i></a>
                {{-- Bouton d'action de suppression sans confirmation --}}
                {{-- <form action="/sommets/{{ $sommet->code_Sommets }}" method="POST">
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
      <div class="alert alert-info">Aucun sommet.</div>
    @endif
    
    </x-layout>