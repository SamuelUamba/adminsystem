<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPORT PDF</title>
</head>
<Style>
    table {
        border-collapse: collapse;
        widows: 100%
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #c93305;
        color: white;
    }
</Style>

<body>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" style="text-align: center;
                     padding: 0 0 20px;
                     color: #076100;">
                    <h2>
                        KUFMET
                    </h2>

                    <h3>
                        <i class="fa fa-retweet" aria-hidden="true"></i>
                        Lista de Registo de Beneficiarios
                    </h3>
                </div><!-- /.col -->


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="container">
        <div class="col-md-12">
            <a href="/exportPDF" class="btn btn-success" style="float: right;">Exportar lista</a>
        </div>
        <div class="table-responsive">
            <table>

                <thead>
                    <tr>
                        <th scope="col">Nome do Beneficiário</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Nome do Mercado</th>
                        <th scope="col">Tipo de Actividade</th>
                        <th scope="col">Ano de Início</th>
                        <th scope="col">Inscrito no INSS</th>

                    </tr>
                </thead>
                <tbody>
                    @if($beneficiarios->count()==0)
                    <tr>
                        <td colspan="5">Sem dados registados para visaualizacão!</td>
                    </tr>
                    @endif
                    @foreach ($beneficiarios as $beneficiario)
                    <tr>
                        <td>{{ $beneficiario->nome }}</td>
                        <td>{{ $beneficiario->genero }}</td>
                        <td>{{ $beneficiario->data_nascimento }}</td>
                        <td>{{ $beneficiario->nome_mercado }}</td>
                        <td>{{ $beneficiario->tipo_actividade }}</td>
                        <td>{{ $beneficiario->ano_inicio }}</td>
                        @if(($beneficiario->inss)=='1')
                        <td>SIM</td>
                        @else
                        <td>NÃO</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


    </section>
    <!-- /.content -->

</body>

</html>