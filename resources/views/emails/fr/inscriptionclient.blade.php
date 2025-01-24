@component('mail::message')
{{$contact['nom']}},<br>
## Bienvenue chez Heavenly Praise,<br>
Votre compte Auditeur Heavenly Praise a été créé avec succès.<br>
Vous pouvez à présent profiter de la bonne musique et suivre depuis votre compte, la livraison de vos tickets. <br>
## Vos informations de connexion sont les suivantes:
<ul>
    <li><strong>Email de connexion : </strong> {{$contact['email']}}</li>
    <li><strong>Mot de passe : </strong> {{$password}}</li>
</ul><br>

Ces informations sont strictement personnelles et ne doivent pas être communiquées à un tiers.<br>
<br><br>
Heavenly Praise,<br>
Que toute gloire revienne à Dieu
<br><br>
<a href="https://heavenly-praise.com" target="_blank" class="btn btn-success" style="font-size: 12px">Heavenly Praise</a> | <a href="https://afincocapital.com/login" target="_blank" class="btn btn-success" style="font-size: 12px">Connexion à votre compte</a>
@endcomponent
