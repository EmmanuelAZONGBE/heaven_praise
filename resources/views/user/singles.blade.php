@extends('layout.artiste', ['title' => 'Mes Singles'])

@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Mes Singles</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{ route('welcome') }}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='/demo/shop-category'>Tableau de bord</a><span></span> Mes Singles
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
                    <h5 class="mb-0">Mes Singles</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="border p-md-4 p-30">
                                <div class="heading_s1 mb-3">
                                    <h6><i class="ti-plus"></i> Nouveau Single</h6>
                                    <hr>
                                </div>
                                <form action="{{ route('user.storesingles') }}" class="" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a href="{{ route('welcome') }}" class="sign__logo text-center">
                                                <img src="{{ asset('PlayerTemplate/img/covers/cover.svg') }}"
                                                    class="img-responsive img-thumbnail" id="blah1" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group {{ $errors->has('cover') ? ' has-error' : '' }}">
                                                <label class="" for="cover">Selectionnez la Cover</label>
                                                <input type="file" class="form-control" value="" name="cover"
                                                    id="cover" placeholder="" style="padding: 8px;">
                                                @if ($errors->has('cover'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('cover') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group {{ $errors->has('fichier_audio') ? ' has-error' : '' }}">
                                                <label class="" for="fichier_audio">Sélectionnez le fichier
                                                    audio</label>
                                                <input type="file" class="form-control" value=""
                                                    name="fichier_audio" id="fichier_audio" placeholder=""
                                                    style="padding: 8px;"accept="audio/*">
                                                @if ($errors->has('fichier_audio'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('fichier_audio') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('titre') ? ' has-error' : '' }}">
                                                <label class="" for="titre">Titre</label>
                                                <input type="text" class="form-control" value="{{ old('titre') }}"
                                                    name="titre" id="titre" placeholder="Titre du single">
                                                @if ($errors->has('titre'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('titre') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('genre') ? ' has-error' : '' }}">
                                                <label class="form-label" for="genre">Genre</label>
                                                <div class="custom_select">
                                                    <select class="form-control first_null not_chosen full-width"
                                                        id="genre" name="genre">
                                                        <option value="">Sélectionnez le genre du single</option>
                                                        @forelse ($genres as $genre)
                                                            <option value="{{ $genre->id }}"
                                                                {{ old('genre') == $genre->id ? ' selected' : ' ' }}>
                                                                {{ $genre->libelle }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                @if ($errors->has('genre'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('genre') }}</strong>
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
                                                        <option value="">Sélectionnez le type du single</option>
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
                                        <div class="col-md-2">
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
                                    <h6><i class="ti-music-alt"></i> Singles en ligne <span
                                            class="badge badge-danger">{{ $singles->where('statut', 'En Ligne')->where('masque', 0)->count() }}</span>
                                    </h6>
                                    <hr>
                                </div>
                                <div class="table-responsive">
                                    <table id="singlesList" class="table table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Cover </th>
                                                <th>Titre</th>
                                                <th>Date</th>
                                                <th>Statistiques</th>
                                                <th>Type</th>
                                                <th>Statut</th>
                                                <th>Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse ($singles as $single)
                                                <tr>
                                                    <td>
                                                        <div class="main__table-text main__table-text--number"><a
                                                                href="#modal-info"
                                                                class="open-modal">{{ $i }}</a></div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-img">
                                                            <div style="text-align:center;">
                                                                <img class="mb-3 "
                                                                    src="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                                    alt="{{ $single->titre }}" style="width:80px;">
                                                            </div>
                                                            <audio controls>
                                                                <source
                                                                    src="{{ asset('usx_files/songs/' . $single->audio) }}"
                                                                    type="audio/mpeg">
                                                                Votre navigateur ne prend pas en charge l'élément audio.
                                                            </audio>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="single-item__title">
                                                            <span>{{ $single->titre }}</span>
                                                            <span>{{ Auth::user()->nomartiste }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">
                                                            {{ $single->created_at->format('d M Y') }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">
                                                            @php
                                                                // Récupérer les écoutes pour ce single
                                                                $ecoutes = $single->ecoutes;
                                                                $nombre_ecoutes = $ecoutes->sum('nombre_ecoutes');
                                                                $nombre_clicks = $ecoutes->sum('nombre_clicks');
                                                            @endphp
                                                            Écoutes : {{ $nombre_ecoutes }} <br>
                                                            Clicks : {{ $nombre_clicks }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $single->type == 'gratuit' ? 'badge-success' : 'badge-warning' }}">
                                                            {{ ucfirst($single->type) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if ($single->statut == 'En Ligne')
                                                            <span class="badge badge-success"><span
                                                                    class="ti-check"></span> En Ligne</span>
                                                        @endif
                                                        @if ($single->statut == 'En Attente')
                                                            <span class="badge badge-primary"><span
                                                                    class="ti-time"></span> En Attente</span>
                                                        @endif
                                                        @if ($single->statut == 'Restreint')
                                                            <span class="badge badge-danger"><span class="ti-lock"></span>
                                                                Restreint</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{-- <div class="main__table-text main__table-text--price"> --}}
                                                        <ul class="list-unstyled">
                                                            <li class="list-inline">
                                                                @if ($single->masque == '1')
                                                                    <a class="btn btn-fill-out btn-success mb-3"
                                                                        href="{{ route('user.unmasksingles', ['id' => $single->id]) }}"
                                                                        title="Rendre Visible  ce titre"><i
                                                                            class="ti-eye mr-5"></i>Rendre Visible</a>
                                                                @else
                                                                    <a class="btn btn-fill-out btn-dark mb-3"
                                                                        href="{{ route('user.masksingles', ['id' => $single->id]) }}"
                                                                        title="Masquer  ce titre"><i
                                                                            class="ti-close mr-5"></i>Masquer</a>
                                                                @endif
                                                            </li>
                                                            <li class="list-inline">
                                                                <form
                                                                    action="{{ route('user.deletesingles', ['id' => $single->id]) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce titre ?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-fill-out btn-danger mb-3"
                                                                        title="Supprimer ce titre"><i
                                                                            class="ti-trash mr-5"></i>Supprimer</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                        {{-- </div> --}}
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
        $(document).ready(function() {
            $('#singlesList').DataTable();
        });
    </script>
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
