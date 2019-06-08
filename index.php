<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Projeto Cadastro de Pessoas</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <?php

            require 'config.php';
            require 'classes/usuarios.class.php';

            $usuarios = new Usuarios();
            $lista_usuarios = $usuarios->getListaUsuarios();

        ?>

    </head>

    <body>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">


                    <h1>Projeto Cadastro de Pessoas</h1>

                
                </div>

                <div class="col-12">
                    <a href="inserir_usuarios.php" class="btn btn-primary">Inserir Usuarios</a>
                </div>

                <br/><br/>

                <div class="col-12">
                    <table id="tabela" class="table" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Email</th>
                                <th>Sexo</th>
                                <th>Ações</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                                foreach($lista_usuarios as $usuarios_cadastrados){
                                    echo '<tr>';
                                        echo '<td><img src="arquivos/'.$usuarios_cadastrados['url'].'" width="100" height="100"/></td>';
                                        echo '<td>'.$usuarios_cadastrados['nome'].'</td>';
                                        echo '<td>'.$usuarios_cadastrados['sobrenome'].'</td>';
                                        echo '<td>'.$usuarios_cadastrados['email'].'</td>';
                                        echo '<td>';    
                                            if($usuarios_cadastrados['sexo'] == 'm'){
                                                echo 'Masculino';
                                            }else{
                                                echo 'Feminino';
                                            }
                                        echo '</td>';
                                        echo '<td>';
                                            echo '<a href="alterar_usuarios.php?id='.$usuarios_cadastrados['id'].'" class="btn btn-primary">Alterar</a>';
                                            echo '&nbsp;&nbsp;';
                                            echo '<button type="button" class="btn btn-primary" onclick="executar_funcao('.$usuarios_cadastrados['id'].')" style="cursor: pointer">Deletar</button>';
                                        echo '</td>';


                                    echo '</tr>';
                                }

                            ?>

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>






    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <script type="text/javascript">
        function executar_funcao(id){
            var resposta = confirm('tem certeza que deseja deletar este usuario ?');
            if(resposta == false){
                alert('não foi deletado');
            }else{
                location.href='deletar_usuarios.php?id='+id;
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#tabela').DataTable( {
            "paging":   true,
            "ordering": false,
            "info":     true
            } );
        });
    </script>

    </body>



</html>