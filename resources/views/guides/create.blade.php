<x-layout>

  <h1 class="mb-4">Ajouter un Guide</h1>

  <form class="mb-4" action="/guides" method="POST">
    @csrf

    <label class="form-label" for="prenom_Guides">Prénom</label>
    <input id="prenom_Guides" class="form-control form-control-sm mb-1" type="text" name="prenom_Guides" value="{{ old('prenom_Guides') }}">
    @error('prenom_Guides')
      <p class="text-danger small mt-1">{{ $message }}</p>
    @enderror

    <label class="form-label" for="nom_Guides">Nom</label>
    <input id="nom_Guides" class="form-control form-control-sm" type="text" name="nom_Guides" value="{{ old('nom_Guides') }}">
    @error('nom_Guides')
      <p class="text-danger small mt-1">{{ $message }}</p>
    @enderror

    <label class="form-label" for="email_Guides">E-mail</label>
    <input id="email_Guides" class="form-control form-control-sm" type="text" name="email_Guides" value="{{ old('email_Guides') }}">
    @error('email_Guides')
      <p class="text-danger small mt-1">{{ $message }}</p>
    @enderror

    <label class="form-label" for="motdepasse_Guides">Mot de passe</label>
    <input id="motdepasse_Guides" class="form-control form-control-sm" type="password" name="motdepasse_Guides" value="{{ old('motdepasse_Guides') }}">
    @error('motdepasse_Guides')
      <p class="text-danger small mt-1">{{ $message }}</p>
    @enderror

    <button class="btn btn-primary btn-sm mt-3" type="submit">Ajouter</button>
    <a class="btn btn-secondary btn-sm mt-3" href="/guides">Retour</a>
  </form>

</x-layout>
