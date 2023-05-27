<x-layout>

  @auth
    <h1 class="mb-4">Bienvenue, <small class="small text-secondary">{{ Auth::user()->name }}</small>.</h1>
    <p>Vous pouvez régénérer la base de données avec ses données d'origine en 
        exécutant la commande suivante depuis le dossier racine de l'application&nbsp;:</p>
    <code class="bg-dark text-bg-dark p-3 border rounded-2 d-block">
      php artisan migrate:refresh --seed
    </code>
  @else
    <div class="h-100 p-5 bg-light border rounded-3">
      <h2>La Compagnie des Guides</h2>
      <p>Bienvenue sur le back-office de La Compagnie des Guides. Vous devez être connecter en tant qu'administrateur pour utiliser l'application.</p>
      <p>Les services suivants sont disponibles :</p>
      <ul>
        <li>Création, suppression, modification des abris</li>
        <li>Création, suppression, modification des guides</li>
        <li>Création, suppression, modification des sommets</li>
        <li>Création, suppression, modification des vallées</li>
        <li>Création, suppression, modification des ascensions</li>
        <li>Consultation des randonnées avec les sommets concernés et les abris réservés</li>
      </ul>
    </div>
  @endauth
    
</x-layout>