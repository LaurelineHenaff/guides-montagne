<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark" aria-label="Navigation principale">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img class="rounded-1" src="/images/logo-48.png" alt="Guides de Montagne" width="" height="32">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          @auth
            
          <li class="nav-item">
            <a class="nav-link" href="/abris">Abris</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/guides">Guides</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sommets">Sommets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/vallees">Vallées</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/ascension">Ascensions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/randonnees">Randonnées</a>
          </li>
          
          @endauth
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item dropdown me-4">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-fill"></i>
              @auth
                {{ auth()->user()->name }}
              @else
                Utilisateur
              @endauth
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              @auth
              <li>
                {{-- <a class="dropdown-item" href="/deconnecter"><i class="bi bi-power me-2"></i>Déconnexion</a> --}}
                <form action="/deconnecter" method="POST">
                  @csrf
                  <button class="btn btn-link text-decoration-none text-reset" type="submit"><i class="bi bi-power me-2"></i>Déconnexion</button>
                </form>
              </li>
              @else
              {{-- <li><a class="dropdown-item text-danger" href="/enregistrer"><i class="bi bi-person-plus-fill me-2"></i></i>S'enregistrer</a></li> --}}
              <li>
                <a class="dropdown-item" href="/connecter"><i class="bi bi-box-arrow-in-right me-2"></i>Se connecter</a></li>
              @endauth
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
