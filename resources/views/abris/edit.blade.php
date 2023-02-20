<x-layout>

  <form action="/abris/{{ $abri->code_Abris }}" method="POST" class="mb-4 bg-light p-4 rounded-2 border mx-auto" style="max-width: 28rem;">
    <h1 class="mb-4 fs-3">Modifier un Abri</h1>
    @csrf
    @method('PUT')

    <div class="row">
      {{-- Nom de l'abris --}}
      <div class="col-7">
        <label class="form-label" for="nom_Abris">Nom<sup>&nbsp;*</sup></label>
        <input id="nom_Abris" class="form-control form-control-sm mb-1" type="text" name="nom_Abris" value="{{ old('nom_Abris') ?? $abri->nom_Abris }}">
        @error('nom_Abris')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>
      {{-- Type de l'abris --}}
      <div class="col-5">
        <label class="form-label" for="type_Abris">Type<sup>&nbsp;*</sup></label>
        <select id="type_Abris" class="form-select form-select-sm mb-1" name="type_Abris">
          <option value="cabane">Cabane</option>
          <option value="refuge" @php echo (old('type_Abris') ?? $abri->type_Abris) === 'refuge' ? 'selected' : ''; @endphp>
            Refuge
          </option>
        </select>
        @error('type_Abris')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="row mt-2">
      <div class="col">
        {{-- Select de la Vallée de l'abris --}}
        <label class="form-label" for="code_Vallees">Vallée<sup>&nbsp;*</sup></label>
        <select id="code_Vallees" class="form-select form-select-sm mb-1" name="code_Vallees">
          @foreach ($vallees as $vallee)
          @php
            $selected = (old('code_Vallees') ?? $vallee->code_Vallees) == $abri->code_Vallees ? 'selected' : '';
          @endphp
            <option value="{{ $vallee->code_Vallees }}" {{$selected}}>{{ $vallee->nom_Vallees }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="row mt-2">
      <div class="col">
        {{-- Altitude de l'abri --}}
        <label class="form-label" for="altitude_Abris">Altitude (m)<sup>&nbsp;*</sup></label>
        <input id="altitude_Abris" class="form-control form-control-sm mb-1" type="number" name="altitude_Abris" value="{{ old('altitude_Abris') ?? $abri->altitude_Abris }}">
        @error('altitude_Abris')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>
      <div class="col">
        {{-- Nb places de l'abri --}}
        <label class="form-label" for="places_Abris">Places<sup>&nbsp;*</sup></label>
        <input id="places_Abris" class="form-control form-control-sm mb-1" type="number" min="0" name="places_Abris" value="{{ old('places_Abris') ?? $abri->places_Abris }}">
        @error('places_Abris')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>
      <div class="col">
        {{-- Prix de la nuit de l'abri --}}
        <label class="form-label" for="prixNuit_Abris">Prix Nuit (€)<sup>&nbsp;*</sup></label>
        <input id="prixNuit_Abris" class="form-control form-control-sm mb-1" type="text" name="prixNuit_Abris" value="{{ old('prixNuit_Abris') ?? $abri->prixNuit_Abris }}">
        @error('prixNuit_Abris')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div id="info-type_Abris" class="row mt-2">
      <div class="col">
        {{-- Prix des repas dans le refuge --}}
        <label class="form-label" for="prixRepas_Abris">Prix Repas (€)<sup>&nbsp;-</sup></label>
        <input id="prixRepas_Abris" class="form-control form-control-sm mb-1" type="text" name="prixRepas_Abris" value="{{ old('prixRepas_Abris') ?? $abri->prixRepas_Abris }}">
        @error('prixRepas_Abris')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>
      <div class="col">
        {{-- Téléphone du gardien du refuge --}}
        <label class="form-label" for="telGardien_Abris">Téléphone Gardien<sup>&nbsp;-</sup></label>
        <input id="telGardien_Abris" class="form-control form-control-sm mb-1" type="text" name="telGardien_Abris" value="{{ old('telGardien_Abris') ?? $abri->telGardien_Abris }}">
        @error('telGardien_Abris')
          <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <p class="small text-secondary mt-4"><sup>&nbsp;*</sup> champs obligatoires.</p> 
    
    <button class="btn btn-primary btn-sm mt-3" type="submit">Modifier</button>
    <a class="btn btn-secondary btn-sm mt-3" href="/abris">Retour</a>
  </form>
  @include('partials._abris-js')

</x-layout>
