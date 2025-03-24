@extends('layout.artiste', ['title' => 'Mes Albums'])

@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Mes Albums</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{ route('welcome') }}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='/demo/shop-category'>Tableau de bord</a><span></span> Mes Albums
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="tab-content dashboard-content">
        <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            @include('partials._flash-message')
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Mes Albums</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="border p-md-4 p-30">
                                <div class="heading_s1 mb-3">
                                    <h6><i class="ti-plus"></i> Nouvel Album</h6>
                                    <hr>
                                </div>

                                <form action="{{ route('user.storealbums') }}" class="" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12 col-md-2">
                                            <a href="{{ route('welcome') }}" class="sign__logo text-center">
                                                <img src="{{ asset('PlayerTemplate/img/covers/cover.svg') }}" id="blah1"
                                                    class="img-responsive img-thumbnail" alt="">
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <div class="form-group {{ $errors->has('cover') ? ' has-error' : '' }}">
                                                <label class="sign__label" for="cover">Selectionnez la Cover</label>
                                                <input type="file" class="form-control" value="" name="cover"
                                                    id="cover" style="padding: 8px;">
                                                @if ($errors->has('cover'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('cover') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <div class="form-group {{ $errors->has('titre') ? ' has-error' : '' }}">
                                                <label class="sign__label" for="titre">Titre</label>
                                                <input type="text" class="form-control" value="{{ old('titre') }}"
                                                    name="titre" id="titre" placeholder="Titre de l'album">
                                                @if ($errors->has('titre'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('titre') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                                                <label class="form-label" for="type">Type</label>
                                                <div class="custom_select">
                                                    <select class="form-control first_null not_chosen full-width"
                                                        id="type" name="type">
                                                        <option value="">Sélectionnez le type d'album</option>
                                                        <option value="gratuit"
                                                        {{ old('type') == 'gratuit' ? 'selected' : '' }}>Gratuit</option>
                                                    <option value="payant" {{ old('type') == 'payant' ? 'selected' : '' }}>
                                                        Payant</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('type'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('type') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label class="sign__label" for="description">Description</label>
                                                <textarea class="form-control" id="" name="description" rows="3">{{ old('description') }}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <button class="btn btn-fill-out" type="submit">Publier</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="border p-md-4 p-30">
                                <div class="heading_s1 mb-3">
                                    <h6><i class="ti-folder"></i> Albums Publiés <span
                                            class="badge badge-danger">{{ $albums->where('statut', 'En Ligne')->where('masque', 0)->count() }}
                                    </h6>
                                    <hr>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Cover</th>
                                                <th>Titre</th>
                                                <th>Date</th>
                                                <th>Statistiques</th>
                                                <th>Type</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse ($albums as $album)
                                                <tr>
                                                    <td>
                                                        <div class="main__table-text main__table-text--number"><a
                                                                href="#!" class="">{{ $i }}</a></div>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('usx_files/covers/' . $album->cover) }}"
                                                            alt="" style="width:80px;">
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">
                                                            <a
                                                                href="{{ route('user.titrealbums', ['slug' => $album->slug]) }}">{{ $album->titre }}
                                                                <br>
                                                                @php
                                                                    $titres = App\Models\Single::where(
                                                                        'album_id',
                                                                        $album->id,
                                                                    )->count();
                                                                @endphp
                                                                <small>({{ $titres > 1 ? $titres . ' Titres' : $titres . ' Titre' }})</small>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">
                                                            {{ $album->created_at->format('d M Y') }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">
                                                            Écoutes:{{ $album->total_ecoutes }}<br>
                                                            Clics: {{ $album->total_clicks }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $album->type == 'gratuit' ? 'badge-success' : 'badge-warning' }}">
                                                            {{ ucfirst($album->type) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if ($album->statut == 'En Ligne')
                                                            <span class="badge badge-success"><span class="ti-check"></span>
                                                                En Ligne</span>
                                                        @endif
                                                        @if ($album->statut == 'En Attente')
                                                            <span class="badge badge-warning"><span class="ti-clock"></span>
                                                                En Attente</span>
                                                        @endif
                                                        @if ($album->statut == 'Restreint')
                                                            <span class="badge badge-danger"><span class="ti-remove"></span>
                                                                Restreint</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <ul class="list-unstyled list--inline">
                                                            <li class="single-item mb-3">
                                                                <a href="{{ route('user.titrealbums', ['slug' => $album->slug]) }}"
                                                                    class="btn btn-primary" title="Ajouter des Titres">
                                                                    <span class="ti-plus"></span> Ajouter Titres
                                                                </a>
                                                            </li>
                                                            <li class="single-item mb-3">
                                                                @if ($album->masque == '1')
                                                                    <a href="{{ route('user.unmaskalbums', ['slug' => $album->slug]) }}"
                                                                        class="btn btn-success"
                                                                        title="Rendre Visible cet album">
                                                                        <span class="ti-eye"></span> Rendre Visible
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('user.maskalbums', ['slug' => $album->slug]) }}"
                                                                        class="btn btn-dark " title="Masquer cet album">
                                                                        <span class="ti-remove"></span>Masquer
                                                                    </a>
                                                                @endif
                                                            </li>
                                                            <li class="single-item">
                                                                <form
                                                                    action="{{ route('user.deletealbums', ['slug' => $album->slug]) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet album ?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger"
                                                                        title="Supprimer cet album">
                                                                        <span class="ti-trash"></span> Supprimer
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i = $i + 1;
                                                @endphp
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function uploadavatar() {
            $('#cover').trigger('click');
        }

        $("#cover").change(function() {
            readURL(this);
        });
    </script>
@endsection
