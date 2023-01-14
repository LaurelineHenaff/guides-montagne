<x-layout>

    <h1 class="mb-4">Liste des Ascensions</h1>
    
    <a class="btn btn-success btn-sm mb-3" href="/ascension/create">
      <i class="bi bi-plus-lg"></i> Ajouter
    </a>
    
    @if (count($ascensions) > 0)
      <table class="table table-sm align-middle table-hover">
        <thead>
          <tr>
            <th>Id Abris</th>
            <th>Nom Abris</th>
            <th>Id Sommet</th>
            <th>Nom Sommet</th>
            <th>Difficulté</th>
            <th>Durée</th>
            <th style="width: 1%;">Actions</th>
          </tr>
        </thead>
    
        <tbody class="table-group-divider">
    
          @foreach ($ascensions as $ascension)
            <tr>
              <td>{{ $ascension->code_Abris }}</td>
              <td>{{ $ascension->nom_Abris }}</td>
              <td>{{ $ascension->code_Sommets }}</td>
              <td>{{ $ascension->nom_Sommets }}</td>
              <td>{{ $ascension->difficulte_Ascension }}</td>
              <td>{{ $ascension->duree_Ascension }}</td>
              <td class="d-flex gap-1">
                <a class="btn btn-primary btn-sm" href="/ascension/{{ $ascension->code_Abris }}/{{ $ascension->code_Sommets }}/edit"><i class="bi bi-pencil"></i></a>
                <form action="/ascension/{{ $ascension->code_Abris }}/{{ $ascension->code_Sommets }}" method="POST">
                  @csrf
                  @method('DELETE')
                  
                  <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
    
        </tbody>
      </table>
    @else
      <div class="alert alert-info">Aucune ascension.</div>
    @endif
    
    </x-layout>