<x-layout>

  <form action="/sommets/{{ $sommet->code_Sommets }}" method="POST" class="mb-4 bg-light p-4 rounded-2 border mx-auto" style="max-width: 25rem;">
    <h1 class="mb-4 fs-3">Modifier un Sommet</h1>
    @csrf
    @method('PUT')

    <label class="form-label" for="nom_Sommets">Nom<sup>&nbsp;*</sup></label>
    <input id="nom_Sommets" class="form-control form-control-sm mb-1" type="text" name="nom_Sommets" value="{{ old('nom_Sommets') ?? $sommet->nom_Sommets }}">
    @error('nom_Sommets')
      <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
    @enderror

    <label class="form-label mt-2" for="altitude_Sommets">Altitude (m)<sup>&nbsp;*</sup></label>
    <input id="altitude_Sommets" class="form-control form-control-sm" type="number" name="altitude_Sommets" value="{{ old('altitude_Sommets') ?? $sommet->altitude_Sommets }}">
    @error('altitude_Sommets')
      <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
    @enderror
  
    <p class="small text-secondary mt-4"><sup>&nbsp;*</sup> champs obligatoires.</p> 
    
    <button class="btn btn-primary btn-sm mt-3" type="submit">Modifier</button>
    <a class="btn btn-secondary btn-sm mt-3" href="/sommets">Retour</a>
  </form>

</x-layout>
  