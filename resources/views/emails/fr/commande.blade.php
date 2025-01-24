@component('mail::message')
## Félicitation pour votre commande HP-{{$commandes->first()->reference}}{{$commandes->first()->session_id}} ! 🎉,<br>
Vous avez payé avec succès un (ou des) ticket(s) pour l'évènement <strong>{{$commandes->first()->Evenement->titre}}</strong>.<br>
## Ci-dessous les détails de vos tickets:
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                Ticket
            </th>
            <th>
                Total
            </th>
        </tr>
    </thead>
    <tbody>
        @php
            $total=0;
        @endphp
        @forelse ($commandes as $commande)
            <tr>
                <td>
                    <i class="ti-check-box font-small text-muted mr-10"></i>
                    <strong>Ticket {{$commande->Ticketevenement->libelle}}</strong> - {{number_format(round($commande->Ticketevenement->prix,2), 0, ',', ' ')}}
                    <span class="product-qty">x {{$commande->qte}}</span>
                </td>
                <td>
                    {{number_format(round($commande->montant,2), 0, ',', ' ')}} FCFA
                </td>
            </tr>
            @php
                $total=$total+$commande->montant;
            @endphp
        @empty
            
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th>
                Total
            </th>
            <td class="product-subtotal">
                <strong>{{number_format(round($total,2), 0, ',', ' ')}} F CFA</strong>
            </td>
        </tr>
    </tfoot>
</table>
<br>

La livraison de votre(s) ticket(s) est en cours de traitement.<br>
<br><br>
Heavenly Praise,<br>
Que toute gloire revienne à Dieu
<br><br>
<a href="https://heavenly-praise.com" target="_blank" class="btn btn-success" style="font-size: 12px">Heavenly Praise</a> | <a href="https://afincocapital.com/login" target="_blank" class="btn btn-success" style="font-size: 12px">Connexion à votre compte</a>
@endcomponent
