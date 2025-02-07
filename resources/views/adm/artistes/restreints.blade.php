@extends('layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="app-content">
        <!-- Container fluid -->
        <div class="app-content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        @include('partials._flash-message')
                        <!-- Page header -->
                        <div class="mb-5">
                            <h3 class="mb-0">Artistes restreints</h3>
                        </div>
                    </div>
                </div>
                <div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Liste des Artistes qui ne peuvent plus publier sur Heavenly Praise
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" style="overflow-x: auto !important;">
                                        <table id="myTable" class="table text-nowrap table-centered mt-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="pe-0">
                                                        #
                                                    </th>
                                                    <th class="ps-1">
                                                        Nom
                                                    </th>
                                                    <th class="ps-1">
                                                        Inscrit le
                                                    </th>
                                                    <th>
                                                        Pays
                                                    </th>
                                                    <th>
                                                        Communauté
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @forelse ($artistes as $artiste)
                                                    <tr>
                                                        <td>
                                                            {{ $i }}
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ route('admin.vueartist', ['id' => $artiste->id]) }}"><strong>{{ $artiste->nom }}</strong></a>
                                                        </td>
                                                        <td>
                                                            {{ $artiste->created_at }}
                                                        </td>
                                                        <td>
                                                            {{ $artiste->Pays->libelle }}
                                                        </td>
                                                        <td>
                                                            @if (!empty($artiste->communaute_id))
                                                                {{ $artiste->Communaute->libelle }}
                                                            @else
                                                                -
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('admin.vueartist', ['id' => $artiste->id]) }}"
                                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="viewOne">
                                                                <i data-feather="eye" class="icon-xs"></i>
                                                                <div id="viewOne" class="d-none">
                                                                    <span>Vue Globale</span>
                                                                </div>
                                                            </a>
                                                            <a href="{{ route('admin.editartist', ['id' => $artiste->id]) }}"
                                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="editOne">
                                                                <i data-feather="edit" class="icon-xs"></i>
                                                                <div id="editOne" class="d-none">
                                                                    <span>Éditer</span>
                                                                </div>
                                                            </a>
                                                            <form
                                                                action="{{ route('admin.deleteartist', ['id' => $artiste->id]) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Voulez-vous vraiment supprimer cet artiste ?');"
                                                                style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip text-danger"
                                                                    data-template="trashOne">
                                                                    <i data-feather="trash-2" class="icon-xs"></i>
                                                                    <div id="trashOne" class="d-none">
                                                                        <span>Supprimer</span>
                                                                    </div>
                                                                </button>
                                                            </form>
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
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            var tbl = $('#myTable');
            $("#myTable").dataTable().fnDestroy();
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }

            });
        });
    </script>
@endsection
