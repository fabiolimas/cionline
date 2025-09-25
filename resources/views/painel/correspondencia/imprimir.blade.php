<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ci Online - Imprimir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 6px;
        }
    </style>

<body>

            <div class="col-md-6 text-center d-flex justify-content-center ">
                <h4>Correspondência Interna</h4><br>

            </div>
            <table class="table table-striped" border="1">
                <tr>
                    <td><b>Data:</b> {{ date('d-m-Y', strtotime($ci->created_at)) }}</td>
                    <td colspan="3"><b>Nº</b> {{ $ci->id }}</td>
                </tr>
                <tr>
                    <td> <b>Origem:</b>

                            @switch($ci->loja_origem)
                                @case (1)
                                    Jacobina
                                @break

                                @case (2)
                                    Capim Grosso
                                @break

                                @case (3)
                                    Senhor do Bonfim
                                @break

                                @case (4)
                                    Juazeiro
                                @break

                                @case (5)
                                    Petrolina
                                @break

                                @case (6)
                                    River
                                @break

                                @case (7)
                                    Escritório
                                @break
                            @endswitch


        </td>
        <td>
            <b> Destino:</b>
                    @switch($ci->loja_destinatario)
                        @case (1)
                            Jacobina
                        @break

                        @case (2)
                            Capim Grosso
                        @break

                        @case (3)
                            Senhor do Bonfim
                        @break

                        @case (4)
                            Juazeiro
                        @break

                        @case (5)
                            Petrolina
                        @break

                        @case (6)
                            River
                        @break

                        @case (7)
                            Escritório
                        @break
                    @endswitch





    </td>
    <td><b>De:</b>
                {{ $ci->funcionario_origem }}</div>
          </td>
                <td>  <b> Para:</b>
                {{ $ci->funcionario_destinatario }}</div></td>
    </tr>


    </table>
    <table border="1" width="100%">
        <thead>
                        <tr>
                            <th scope="col"  colspan="2">#</th>
                            <th scope="col" colspan="4">Descrição</th>


                        </tr>

                    </thead>
                     <tbody>

                        @foreach ($ciItens as $item)
                            <tr>
                                <th scope="row" colspan="2">{{ $loop->index + 1 }}</th>
                                <td colspan="4">{{ $item->descricao }}</td>


                            </tr>
                        @endforeach
                    </tbody>
    </table>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
</body>

</html>
