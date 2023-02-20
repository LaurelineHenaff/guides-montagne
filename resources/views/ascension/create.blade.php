<x-layout>

  {{-- TODO: Le formulaire ne devrait pas s'afficher s'il n'y a pas d'abri ou de sommet --}}
  <form action="/ascension" method="POST" class="mb-4 bg-light p-4 rounded-2 border mx-auto" style="max-width: 25rem;">
    <h1 class="mb-4 fs-3">Ajouter une Ascension</h1>
    @csrf

    <div class="row mb-1">
      <div class="col">
        <label class="form-label z-1" for="code_Abris">Nom Abris<sup>&nbsp;*</sup></label>  
        <select id="code_Abris" class="form-select form-select-sm" name="code_Abris">
          @foreach ($abris as $abri)
            @php
              $selected = intval(old('code_Abris')) === $abri->code_Abris ? 'selected' : '';
            @endphp
            <option value="{{ $abri->code_Abris }}" {{$selected}}>{{ $abri->nom_Abris }}</option>
          @endforeach
        </select>
      </div>

      <div class="col">
        <label class="form-label" for="code_Sommets">Nom Sommet<sup>&nbsp;*</sup></label>
        <select id="code_Sommets" class="form-select form-select-sm" name="code_Sommets">
          @foreach ($sommets as $sommet)
            @php
              $selected = intval(old('code_Sommets')) === $sommet->code_Sommets ? 'selected' : '';
            @endphp
            <option value="{{ $sommet->code_Sommets }}" {{$selected}}>{{ $sommet->nom_Sommets }}</option>
          @endforeach
        </select>
        @error('code_Sommets')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror    
      </div>

      @error('code_Abris')
        <p class="text-danger small mt-1 mb-0">Cette ascension existe déjà.</p>
      @enderror

    </div>

    <div class="row mb-1">
      <div class="col">
        <label class="form-label mt-2" for="difficulte_Ascension">Difficulté<sup>&nbsp;*</sup></label>
        <select id="difficulte_Ascension" class="form-select form-select-sm mb-1" name="difficulte_Ascension">
          <option value="débutant">Débutant</option>
          <option value="confirmé">Confirmé</option>
          <option value="expert">Expert</option>
        </select>
        @error('difficulte_Ascension')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>

      <div class="col">
        <label class="form-label mt-2" for="duree_Ascension">Durée (minutes)<sup>&nbsp;*</sup></label>
        <input id="duree_Ascension" class="form-control form-control-sm" type="number" name="duree_Ascension" value="{{ old('duree_Ascension') }}">
        @error('duree_Ascension')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <p class="small text-secondary mt-4"><sup>&nbsp;*</sup> champs obligatoires.</p> 
    
    <button class="btn btn-primary btn-sm mt-3" type="submit">Ajouter</button>
    <a class="btn btn-secondary btn-sm mt-3" href="/ascension">Retour</a>
  </form>

</x-layout>
