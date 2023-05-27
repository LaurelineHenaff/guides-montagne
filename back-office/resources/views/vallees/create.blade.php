<x-layout>

  <form class="mb-4 bg-light p-4 rounded-2 border mx-auto" style="max-width: 25rem;" action="/vallees" method="POST">
    <h1 class="mb-4 fs-3">Ajouter une Vallées</h1>
    @csrf

    <label class="form-label" for="nom_Vallees">Nom<sup>&nbsp;*</sup></label>
    <input id="nom_Vallees" class="form-control form-control-sm mb-1" type="text" name="nom_Vallees" value="{{ old('nom_Vallees') }}">
    @error('nom_Vallees')
      <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
    @enderror

    <p class="small text-secondary mt-4"><sup>&nbsp;*</sup> champs obligatoires.</p> 
    
    <button class="btn btn-primary btn-sm mt-3" type="submit">Ajouter</button>
    <a class="btn btn-secondary btn-sm mt-3" href="/vallees">Retour</a>
  </form>
  
</x-layout>
  