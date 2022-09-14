@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Anuncios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-anuncio')
                        <a class="btn btn-warning" href="{{ route('anuncios.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($anuncios as $anuncio)
                            <tr>
                                <td style="display: none;">{{ $anuncio->id }}</td>                                
                                <td>{{ $anuncio->titulo }}</td>
                                <td>{{ $anuncio->contenido }}</td>
                                <td>
                                    <form action="{{ route('anuncios.destroy',$anuncio->id) }}" method="POST">                                        
                                        @can('editar-anuncio')
                                        <a class="btn btn-info" href="{{ route('anuncios.edit',$anuncio->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('Eliminar-anuncio')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $anuncios->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection