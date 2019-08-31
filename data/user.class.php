<?php
    class User {
        
        function ultimas_password($user_id){
            require_once ('conecction.class.php');
            try {
                $conn = new Connection();
                $sql = "SELECT pu.clave
                        FROM user u 
                        INNER JOIN passwords_users pu ON u.user_id = pu.user_id                     
                        WHERE u.user_id=$user_id
                        ORDER BY fecha DESC
                        LIMIT 12";
                $result = $conn->consult($sql);
                $super_array = array();
                while ($reg = $result->fetch(PDO::FETCH_OBJ)) {
                    $array = array(
                        'clave'=>$reg->clave                       
                    );
                    array_push($super_array, $array);
                }
                 return ($super_array) ? json_encode($super_array) : false;

            } catch (Exception $e) {
                return "Error: ".$e;
            }
        }

        function user_id($user_id){
            require_once ('conecction.class.php');
            try {
                $conn = new Connection();
                $sql = "SELECT *
                        FROM user                        
                        WHERE user_id=$user_id";
                $result = $conn->consult($sql);
                while ($reg = $result->fetch(PDO::FETCH_OBJ)) {                   
                    $user_id = $reg->user_id;
                }
                return (isset($user_id)) ? $user_id : false;

            } catch (Exception $e) {
                return "Error: ".$e;
            }
        }

        function full_name($user_id){
            require_once ('conecction.class.php');
            try {
                $conn = new Connection();
                $sql = "SELECT *
                        FROM user                        
                        WHERE user_id=$user_id";
                $result = $conn->consult($sql);
                while ($reg = $result->fetch(PDO::FETCH_OBJ)) {                   
                    $full_name = $reg->full_name;
                }
                return (isset($user_id)) ? $user_id : false;

            } catch (Exception $e) {
                return "Error: ".$e;
            }
        }



        
    }
?>