<header>
  <div class="background">
    <div class="container">
      <div class="d-flex">
        <img src="{{ asset('assets/logo.jpg') }}" alt="">
        <nav class="d-flex white">
          <a href="" class="{% if app.request.get('_route') == 'foo_products_overview' %} class="active"{% endif %}">Accueil</a>
          <a href="/logout">Déconnexion</a>
        </nav>
      </div>
    </div>
  </div>
</header>