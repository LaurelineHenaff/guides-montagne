<x-layout>

  <form class="mb-4 bg-light p-4 rounded-2 border mx-auto" style="max-width: 25rem;" action="/guides" method="POST">
    <h1 class="mb-4 fs-3">Ajouter un Guide</h1>
    @csrf

    <label class="form-label" for="prenom_Guides">Prénom</label>
    <input id="prenom_Guides" class="form-control form-control-sm mb-1" type="text" name="prenom_Guides" value="{{ old('prenom_Guides') }}">
    @error('prenom_Guides')
      <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
    @enderror

    <label class="form-label mt-2" for="nom_Guides">Nom<sup>&nbsp;*</sup></label>
    <input id="nom_Guides" class="form-control form-control-sm" type="text" name="nom_Guides" value="{{ old('nom_Guides') }}">
    @error('nom_Guides')
      <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
    @enderror

    <label class="form-label mt-2" for="email_Guides">E-mail</label>
    <input id="email_Guides" class="form-control form-control-sm" type="text" name="email_Guides" value="{{ old('email_Guides') }}">
    @error('email_Guides')
      <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
    @enderror

    <label class="form-label mt-2" for="motdepasse_Guides">Mot de passe<sup>&nbsp;*</sup></label>
    <input id="motdepasse_Guides" class="form-control form-control-sm" type="password" name="motdepasse_Guides" value="{{ old('motdepasse_Guides') }}">
    @error('motdepasse_Guides')
      <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
    @enderror

    <p class="small text-secondary mt-4"><sup>&nbsp;*</sup> champs obligatoires.</p> 
    
    <button class="btn btn-primary btn-sm mt-3" type="submit">Ajouter</button>
    <a class="btn btn-secondary btn-sm mt-3" href="/guides">Retour</a>
  </form>

</x-layout>
