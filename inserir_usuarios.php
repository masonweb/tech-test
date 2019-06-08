<!DOCTYPE html>
<html>

    <head>
        <meta charset="uft-8">
        <title>Projeto Cadastro de Pessoas</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <?php

            require 'config.php';
            require 'classes/usuarios.class.php';
            

            $usuarios = new Usuarios();

            if(isset($_POST['nome'])){
                $nome = $_POST['nome'];
                $sobrenome = $_POST['sobrenome'];
                $email = $_POST['email'];
                $sexo = $_POST['sexo'];

                $errors= array();
                $file_name = $_FILES['foto']['name'];
                $file_size =$_FILES['foto']['size'];
                $file_tmp =$_FILES['foto']['tmp_name'];
                $file_type=$_FILES['foto']['type'];
                $file_name_array = explode('.',$_FILES['foto']['name']);
                $file_ext=strtolower(end($file_name_array));
                //$file_ext=strtolower(end(explode('.',$_FILES['foto']['name'])));
                $extensions= array("jpeg","jpg","png");
                $nomedoarquivo = '';
                
                if(in_array($file_ext,$extensions)=== false){
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    //echo 'erro escolha um arquivo com formado .png ou .jpg';
                }
                
                if(empty($errors)==true){
                    $nomedoarquivo = md5(time().rand(0,99)).'.png';    
                    move_uploaded_file($file_tmp,"arquivos/".$nomedoarquivo);

                    $usuarios->cadastrarUsuarios($nome,$sobrenome,$email,$sexo,$nomedoarquivo);

                    echo "<script>location.href='index.php';</script>";
                    //header("Location: index.php");
                
                }else{
                    //print_r($errors);
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">erro escolha um arquivo com formado .png , .jpg ou .jpeg para opção de foto</span>';
                }

            }

        ?>

    </head>

    <body>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Inserir Usuarios</h1>
                </div>

                <div class="col-12">


                    <form id="cadastro_usuario" method="post" action="" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="nome" class="col-md-1 col-form-label">Nome</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nome" placeholder="Ex:José" name="nome" <?php if(isset($_POST['nome'])){
                                echo "value=".$_POST['nome'];
                            } ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sobrenome" class="col-md-1 col-form-label">Sobrenome</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="sobrenome" placeholder="Ex:Silva" name="sobrenome" <?php if(isset($_POST['sobrenome'])){
                                echo "value=".$_POST['sobrenome'];
                            } ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-1 col-form-label">E-mail</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="email" placeholder="Ex:josé@gmail.com" name="email" <?php if(isset($_POST['email'])){
                                echo "value=".$_POST['email'];
                            } ?>>
                        </div>
                    </div>

                    Sexo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="sexo" value="m" checked="checked">
                            <label class="form-check-label" for="inlineRadio1">Masculino</label>
                        </div>
                    
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="sexo" value="f">
                            <label class="form-check-label" for="inlineRadio1">Feminino</label>
                        </div>

                    <br/>
                    
                    Foto:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="file" name="foto" id="foto" />
                    <small id="TipoArquivos" class="form-text text-muted">Envie arquivos de fotos somente com os formatos .jpg , .jpeg, .png</small>
                    
                    <br/><br/>

                    <input type="submit" class="btn btn-primary" value="Enviar" />
                    

                    </form>

                </div>

            </div>
        </div>

    </div>





    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/cadastro.js"></script>

    </body>



</html>