<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Identifiant:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nom et prénom:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'E-mail:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Password Field -->
<!--div class="form-group">
    {!! Form::label('password', 'Mot de passe:') !!}
    <p>{!! $user->password !!}</p>
</div-->

<!-- Photo Field -->
<div class="form-group">
    {!! Form::label('photo', 'Photo de profil:') !!}
    <br>
    <img src="{!! $user->photo !!}" width="50" height="50">
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Crée le:') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Dernière modification le:') !!}
    <p>{!! $user->updated_at !!}</p>
</div>

