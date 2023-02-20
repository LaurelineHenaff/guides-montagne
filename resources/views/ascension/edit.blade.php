<x-layout>

  <form action="/ascension/{{ $ascension->code_Abris }}/{{ $ascension->code_Sommets }}" method="POST" class="mb-4 bg-light p-4 rounded-2 border mx-auto" style="max-width: 25rem;">
    <h1 class="mb-4 fs-3">Modifier une Ascension</h1>
    @csrf
    @method('PUT')

    <div class="row mb-1">
      <div class="col">
        <label class="form-label" for="code_Abris">Nom Abris</label>
        <input class="form-control form-control-sm" type="text" readonly disabled value="{{$ascension->nom_Abris}}"> 

        {{-- <select id="code_Abris" class="form-select form-select-sm" name="code_Abris">
          @foreach ($abris as $a)
            @php
              $selected = (old('code_Abris') ?? $ascension->code_Abris) == $a->code_Abris ? 'selected' : '';
            @endphp
            <option value="{{ $a->code_Abris }}" {{$selected}}>{{ $a->nom_Abris }}</option>
          @endforeach
        </select>
        @error('code_Abris')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror --}}
      </div>

      <div class="col">
        <label class="form-label" for="code_Sommets">Nom Sommet</label>
        <input class="form-control form-control-sm" type="text" readonly disabled value="{{$ascension->nom_Sommets}}"> 

        {{-- <select id="code_Sommets" class="form-select form-select-sm" name="code_Sommets">
          @foreach ($sommets as $s)
            @php
              $selected = (old('code_Sommets') ?? $ascension->code_Sommets) == $s->code_Sommets ? 'selected' : '';
            @endphp
            <option value="{{ $s->code_Sommets }}" {{$selected}}>{{ $s->nom_Sommets }}</option>
          @endforeach
        </select>
        @error('code_Sommets')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror     --}}
      </div>
    </div>

    <div class="row mb-1">
      <div class="col">
        <label class="form-label mt-2" for="difficulte_Ascension">Difficulté<sup>&nbsp;*</sup></label>
        <select id="difficulte_Ascension" class="form-select form-select-sm mb-1" name="difficulte_Ascension">
          <option value="débutant">Débutant</option>
          @php
            $selected = (old('difficulte_Ascension') ?? $ascension->difficulte_Ascension) == 'confirmé' ? 'selected' : '';
          @endphp
          <option value="confirmé" {{$selected}}>Confirmé</option>
          @php
            $selected = (old('difficulte_Ascension') ?? $ascension->difficulte_Ascension) == 'expert' ? 'selected' : '';
          @endphp
          <option value="expert" {{$selected}}>Expert</option>
        </select>
        @error('difficulte_Ascension')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>

      <div class="col">
        <label class="form-label mt-2" for="duree_Ascension">Durée (heures)<sup>&nbsp;*</sup></label>
        <input id="duree_Ascension" class="form-control form-control-sm" type="number" min="0" name="duree_Ascension" value="{{ old('duree_Ascension') ?? $ascension->duree_Ascension }}">
        @error('duree_Ascension')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <p class="small text-secondary mt-4"><sup>&nbsp;*</sup> champs obligatoires.</p> 
    
    <button class="btn btn-primary btn-sm mt-3" type="submit">Modifier</button>
    <a class="btn btn-secondary btn-sm mt-3" href="/ascension">Retour</a>
  </form>

</x-layout>
