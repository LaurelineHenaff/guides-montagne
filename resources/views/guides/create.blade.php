<x-layout>

  <h1 class="mb-4">Ajouter un Guide</h1>

  <form class="mb-4" action="/guides" method="POST">
    @csrf

    <label class="form-label" for="prenom_Guides">Prénom</label>
    <input id="prenom_Guides" class="form-control mb-1" type="text" name="prenom_Guides" value="{{ old('prenom_Guides') }}">
    @error('prenom_Guides')
      <p class="text-danger small mt-1">{{ $message }}</p>
    @enderror

    <label class="form-label" for="nom_Guides">Nom</label>
    <input id="nom_Guides" class="form-control" type="text" name="nom_Guides" value="{{ old('nom_Guides') }}">
    @error('nom_Guides')
      <p class="text-danger small mt-1">{{ $message }}</p>
    @enderror

    <button class="btn btn-primary btn-sm mt-3" type="submit">Ajouter</button>
    <a class="btn btn-secondary btn-sm mt-3" href="/guides">Retour</a>
  </form>

</x-layout>
