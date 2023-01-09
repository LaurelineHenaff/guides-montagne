<x-layout>

    <form action="/vallees/{{ $vallee->code_Vallees }}" method="POST" class="mb-4 bg-light p-4 rounded-2 border mx-auto" style="max-width: 25rem;">
      <h1 class="mb-4 fs-3">Modifier une Vallée</h1>
      @csrf
      @method('PUT')
  
      <label class="form-label" for="nom_Vallees">Nom<sup>&nbsp;*</sup></label>
      <input id="nom_Vallees" class="form-control form-control-sm mb-1" type="text" name="nom_Vallees" value="{{ old('nom_Vallees') ?? $vallee->nom_Vallees }}">
      @error('nom_Vallees')
        <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
      @enderror
     
      <p class="small text-secondary mt-4"><sup>&nbsp;*</sup> champs obligatoires.</p> 
      
      <button class="btn btn-primary btn-sm mt-3" type="submit">Modifier</button>
      <a class="btn btn-secondary btn-sm mt-3" href="/vallees">Retour</a>
    </form>
  
  </x-layout>
  