<li class="nav-header">
<div class="dropdown profile-element">
    <span>
        <img alt="image" class="img-circle" src="/img/{{Auth::user()->usuario}}.jpg" />
    </span>

    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <span class="clear"><strong>{{Auth::user()->name}}</strong>
        <span class="text-muted text-xs block">Usuario<b class="caret"></b></span>
        </span>
    </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
        <li><a href="profile.html">Perfil</a></li>
        <li><a href="contacts.html">Contacto</a></li>
        <li><a href="mailbox.html">Buzon</a></li>
        <li class="divider"></li>
        <li><a href="/logout">Salir</a></li>
    </ul>
</div>
<div class="logo-element">
    IN+
</div>
</li>