<?php

    class Usuarios {

        public function getListaUsuarios(){
            
            global $pdo;

            $sql = "select * from usuarios";
            $sql = $pdo->query($sql);

            $array = array();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }

            return $array;

        }

        public function cadastrarUsuarios($nome,$sobrenome,$email,$sexo,$url){

            global $pdo;

            $sql = "insert into usuarios set nome=:nome, sobrenome=:sobrenome, email=:email, sexo=:sexo, url=:url";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":sobrenome",$sobrenome);
            $sql->bindValue(":email",$email);
            $sql->bindValue(":sexo",$sexo);
            $sql->bindValue(":url",$url);
            $sql->execute();

        }

        public function getUsuarioId($id){

            global $pdo;

            $sql = "select * from usuarios where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                return $info;
            }

        }

        public function updatetUsuario($nome,$sobrenome,$email,$sexo,$url,$id){

            global $pdo;

            $sql = "update usuarios set nome=:nome, sobrenome=:sobrenome, email=:email, sexo=:sexo, url=:url where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":sobrenome",$sobrenome);
            $sql->bindValue(":email",$email);
            $sql->bindValue(":sexo",$sexo);
            $sql->bindValue(":url",$url);
            $sql->bindValue(":id",$id);
            $sql->execute();

        }

        public function deletarUsuario($id){

            global $pdo;

            $sql = "delete from usuarios where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

        }



    }


?>