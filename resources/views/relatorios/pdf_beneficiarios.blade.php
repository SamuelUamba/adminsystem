<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprovativo</title>

</head>
<style>
    .form-control {
        width: 400px;
    }
</style>

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
                        Comprovativo de Registo de Beneficiarios
                    </h3>
                </div><!-- /.col -->


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="container" style="text-align: justify;">

        <form>
            @csrf
            <div class="col-md-6 mb-3">
                <input type="text" value="Nome do Beneficiário">
                <input type="text" class="form-control" value="{{$beneficiarios->nome}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Gênero">
                @if(($beneficiarios->genero) =='M')
                <input type="text" class="form-control" value="Masculino" required>
                @else
                <input type="text" class="form-control" value="Femenino" required>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Data de Nascimento">
                <input type="text" class="form-control" value="{{$beneficiarios->data_nascimento}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Número de Telefone">
                <input type="text" class="form-control" value="{{$beneficiarios->numero_telefone}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Tipo de Documento">
                <input type="text" class="form-control" value="{{$beneficiarios->tipo_documento}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Número do Documento">
                <input type="text" class="form-control" value="{{$beneficiarios->numero_documento}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Mercado ">
                <input type="text" class="form-control" value="{{$beneficiarios->nome_mercado}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Tipo de Actividade">
                <input type="text" class="form-control" value="{{$beneficiarios->tipo_actividade}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Data de Início ">
                <input type="text" class="form-control" value="{{$beneficiarios->ano_inicio}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Inscrito no INSS?">
                @if(($beneficiarios->inss) =='1')
                <input type="text" class="form-control" value="SIM">
                @else
                <input type="text" class="form-control" value="NÃO">
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <p>Operador: {{(Auth::user()->name)}} Data:{{$beneficiarios->created_at}}, Original</p>

            </div>
        </form>
        <div>
            <p>--------------------------------------------------------------------------------------------------------------------</p>
        </div>
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
                            Comprovativo de Registo de Beneficiarios
                        </h3>
                    </div><!-- /.col -->
                    <!-- <i class="fa fa-cog fa-1x" aria-hidden="true"></i> -->
                    <!-- <div class="image">
                    <img src="{{ asset('dist/img/logo.png') }}" style="width: 100px;" class="img-circle elevation-0" alt="User Image">
                </div> -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <form>
            @csrf
            <div class="col-md-6 mb-3">
                <input type="text" value="Nome do Beneficiário">
                <input type="text" class="form-control" value="{{$beneficiarios->nome}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Gênero">
                @if(($beneficiarios->genero) =='M')
                <input type="text" class="form-control" value="Masculino" required>
                @else
                <input type="text" class="form-control" value="Femenino" required>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Data de Nascimento">
                <input type="text" class="form-control" value="{{$beneficiarios->data_nascimento}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Número de Telefone">
                <input type="text" class="form-control" value="{{$beneficiarios->numero_telefone}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Tipo de Documento">
                <input type="text" class="form-control" value="{{$beneficiarios->tipo_documento}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Número do Documento">
                <input type="text" class="form-control" value="{{$beneficiarios->numero_documento}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Mercado ">
                <input type="text" class="form-control" value="{{$beneficiarios->nome_mercado}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Tipo de Actividade">
                <input type="text" class="form-control" value="{{$beneficiarios->tipo_actividade}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Data de Início ">
                <input type="text" class="form-control" value="{{$beneficiarios->ano_inicio}}">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" value="Inscrito no INSS?">
                @if(($beneficiarios->inss) =='1')
                <input type="text" class="form-control" value="SIM">
                @else
                <input type="text" class="form-control" value="NÃO">
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <p>Operador: {{(Auth::user()->name)}} Data:{{$beneficiarios->created_at}} ,Cópia</p>

            </div>
        </form>
    </section>
</body>

</html>