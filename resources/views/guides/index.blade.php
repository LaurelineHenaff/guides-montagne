<x-layout>

  <h1 class="mb-4">Liste des Guides <span class="small text-secondary fw-normal">[{{count($guides)}}]</span></h1>

  <a class="btn btn-success btn-sm mb-3" href="/guides/create">
    <i class="bi bi-plus-lg"></i> Ajouter
  </a>

  @if (count($guides) > 0)
    <table class="table table-sm align-middle table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Prénom</th>
          <th>Nom</th>
          <th>E-mail</th>
          <th style="width: 1%;">Actions</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">

        @foreach ($guides as $guide)
          <tr>
            <td>{{ $guide->code_Guides }}</td>
            <td>{{ $guide->prenom_Guides }}</td>
            <td>{{ $guide->nom_Guides }}</td>
            <td>{{ $guide->email_Guides }}</td>
            <td class="d-flex gap-1">
              <a class="btn btn-primary btn-sm" href="/guides/{{ $guide->code_Guides }}/edit"><i class="bi bi-pencil"></i></a>
              <a class="btn btn-danger btn-sm" href="/guides/{{ $guide->code_Guides }}/delete"><i class="bi bi-trash"></i></a>
              {{-- Bouton d'action de suppression sans confirmation --}}
              {{-- <form action="/guides/{{ $guide->code_Guides }}" method="POST">
                @csrf
                @method('DELETE')
                
                <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i></button> --}}
              </form>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  @else
    <div class="alert alert-info">Aucun guide.</div>
  @endif

</x-layout>