<div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>CI</th>
                                    <th>Origem</th>
                                    <th>Destino</th>
                                    <th>De</th>
                                    <th>Para</th>
                                    <th>Data Envio</th>
                                    <th>Data Receb</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($correspondencias as $correspondencia)
                                    <tr class="@if($correspondencia->loja_id == Auth::user()->id) bg-light text-dark @else  @endif">
                                       <td>{{$correspondencia->id}}</td>

                                        @switch($correspondencia->loja_origem)
                                            @case (1)
                                                <td>Jacobina</td>
                                            @break

                                            @case (2)
                                                <td>Capim Grosso</td>
                                            @break

                                            @case (3)
                                                <td>Senhor do Bonfim</td>
                                            @break

                                            @case (4)
                                                <td>Juazeiro</td>
                                            @break

                                            @case (5)
                                                <td>Petrolina</td>
                                            @break

                                            @case (6)
                                                <td>River</td>
                                            @break

                                            @case (7)
                                                <td>Escritório</td>
                                            @break
                                        @endswitch

                                        @switch($correspondencia->loja_destinatario)
                                            @case (1)
                                                <td>Jacobina</td>
                                            @break

                                            @case (2)
                                                <td>Capim Grosso</td>
                                            @break

                                            @case (3)
                                                <td>Senhor do Bonfim</td>
                                            @break

                                            @case (4)
                                                <td>Juazeiro</td>
                                            @break

                                            @case (5)
                                                <td>Petrolina</td>
                                            @break

                                            @case (6)
                                                <td>River</td>
                                            @break

                                            @case (7)
                                                <td>Escritório</td>
                                            @break
                                        @endswitch


                                        <td>{{ $correspondencia->funcionario_origem }}</td>
                                        <td>{{ $correspondencia->funcionario_destinatario }}</td>
                                        <td>{{ $correspondencia->data_envio }}</td>
                                        <td>{{ $correspondencia->data_recebimento }}</td>
                                        @if($correspondencia->status == 'aberto')
                                            <td class="text-danger">Aberto</td>
                                        @else
                                        <td class="text-success">Recebido</td>

                                        @endif
                                        <td><a href="{{ route('ci', $correspondencia->id) }}" class="btn btn-info"
                                                title="Visualizar"><i class="fa fa-eye"></i></a>

                                            @if ($correspondencia->loja_id == Auth::user()->id)
                                                @if($correspondencia->status == 'recebido')

                                            @else

                                             <a href="{{route('editar-ci', $correspondencia->id)}}" class="btn btn-success" title="Editar"><i
                                                        class="fa fa-pencil"></i></a>
                                            <a href="{{route('delete', $correspondencia->id)}}" class="btn btn-danger" title="Excluir"><i
                                                        class="fa fa-trash"></i></a>
                                            @endif
                                            @else
                                               @if($correspondencia->status == 'recebido')

                                               @else
                                                <a href="{{route('confirma', $correspondencia->id)}}" class="btn btn-danger" title="Confirmar"><i
                                                        class="fa fa-check"></i></a>
                                                @endif
                                        </td>
                                @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
