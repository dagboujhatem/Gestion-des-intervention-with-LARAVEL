<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{!! route('home') !!}"><i class="fa fa-dashboard"></i><span> Tableau de bord</span></a>
</li>
@if( ! Auth::user()->type_account)
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Gestion des utilisateurs</span></a>
</li>
<li class="{{ Request::is('pieces*') ? 'active' : '' }}">
    <a href="{!! route('pieces.index') !!}"><i class="fa fa-product-hunt"></i><span> Gestion de stock </span></a>
</li>

<li class="{{ Request::is('equipements*') ? 'active' : '' }}">
    <a href="{!! route('equipements.index') !!}"><i class="fa fa-list-ul"></i><span>Gestion des équipements</span></a>
</li>
@endif
<li class="{{ Request::is('pannes*') ? 'active' : '' }}">
    <a href="{!! route('pannes.index') !!}"><i class="fa fa-list-ul"></i><span>Déclaration des pannes</span></a>
</li>
@if( ! Auth::user()->type_account)
<li class="{{ Request::is('interventions*') ? 'active' : '' }}">
    <a href="{!! route('interventions.index') !!}"><i class="fa fa-list-ul"></i><span> Rapports d'interventions</span></a>
</li>

<!-- <hr> -->

<li class="{{ Request::is('calendar*') ? 'active' : '' }}">
    <a href="{!! route('calendar') !!}"><i class="fa fa-calendar"></i><span>Calendrier d'entretien</span></a>
</li>

<li class="{{ Request::is('entretiens*') ? 'active' : '' }}">
    <a href="{!! route('entretiens.index') !!}"><i class="fa fa-list-ul"></i><span>Gestion d'entretien</span></a>
</li>

<li class="{{ Request::is('defaillances*') ? 'active' : '' }}">
    <a href="{!! route('defaillances.index') !!}"><i class="fa fa-list-ul"></i><span>Défaillances constatée</span></a>
</li>

<!-- 
<hr> -->

<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{!! route('settings') !!}"><i class="fa fa-cog"></i><span> Paramètres</span></a>
</li>

@endif