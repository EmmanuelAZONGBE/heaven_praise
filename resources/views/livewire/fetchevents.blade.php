<div>
    <div class="row row--grid">
        <div class="col-12">
            <div class="main__filter">
                <div action="#" class="main__filter-search">
                    <input type="text" placeholder="Lieu ou nom de l'évènement" wire:model="query" >
                    <button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/></svg></button>
                </div>
                <div class="slider-radio">
                    <input type="radio" name="grade" id="all" wire:model="filter" value="all"><label for="all">Tous</label>
                    <input type="radio" name="grade" id="upcoming" wire:model="filter" value="upcoming"><label for="upcoming">À Venir</label>
                    <input type="radio" name="grade" id="past" wire:model="filter" value="past"><label for="past">Passé</label>
                    <input type="radio" name="grade" id="free" wire:model="filter" value="free"><label for="free">Gratuit</label>
                    <input type="radio" name="grade" id="payed" wire:model="filter" value="payed"><label for="payed">Payant</label>
                </div>
            </div>

            <div class="row row--grid">
                @forelse ($evenements as $evenement)
                    <div class="col-12 col-md-6 col-xl-4">
                        @include('component._event')
                    </div>
                    
                @empty
                    <div class="col-12"><br>
                        <p class="text-center" style="color: white !important; text-align:center !important;">Aucun évènement disponible...</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
