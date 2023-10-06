<?php
require_once( 'clsConex.php' );

class docente{

    private $db;

    public function __construct() {
		$this->db = Database::connect();
	}
 
    function get( $per_id = '', $per_carne = '', $per_usuario = '', $per_nombre = '', $per_apellido = '', $per_fecha_nacimiento = '', $per_mail = '', $per_status = 2){

        $sql = '';
        $sql.= "SELECT *";
        $sql.= " FROM personal";
        if( strlen( $per_status ) > 0 ){
            $sql.= " WHERE per_status IN( $per_status )";
        }
        
        if( strlen( $per_id ) > 0 ){
            $sql.= " AND per_id = $per_id";
        }
        
        if( strlen( $per_carne ) > 0 ){
            $sql.= " AND per_carne = $per_carne";
        }

        if( strlen( $per_usuario ) > 0 ){
            $sql.= " AND per_usuario = $per_usuario";
        }
        
        if( strlen( $per_nombre ) > 0 ){
            $sql.= " AND per_nombre = $per_nombre";
        }

        if( strlen( $per_apellido ) > 0 ){
            $sql.= " AND per_apellido = $per_apellido";
        }
        
        if( strlen( $per_fecha_nacimiento ) > 0 ){
            $sql.= " AND per_fecha_nacimiento = $per_fecha_nacimiento";
        }

        if( strlen( $per_mail ) > 0 ){
            $sql.= " AND per_mail = $per_mail";
        }
        //echo $sql;
        $result = $this->db->query( $sql );
        return $result;
        
    }

    function save( $per_id, $per_carne , $per_usuario , $per_nombre , $per_apellido, $per_mail, $per_status){

        $sql = "";
        $sql.= "INSERT INTO personal";
        $sql.= " VALUES ( $per_id, '$per_carne' , $per_usuario , '$per_nombre' , '$per_apellido' , 'CURDATE()', '$per_mail', $per_status );";
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function update(  $per_id, $per_carne , $per_usuario , $per_nombre , $per_apellido , $per_fecha_nacimiento , $per_grado , $per_seccion , $per_status ){

        $sql = "";
        $sql.= "UPDATE personal";
        $sql.= " SET per_carne = '$per_carne'";
        $sql.= " per_usuario = $per_usuario";
        $sql.= " per_nombre = '$per_nombre'";
        $sql.= " per_apellido = '$per_apellido'";
        $sql.= " per_fecha_nacimiento = '$per_fecha_nacimiento'";
        $sql.= " per_grado = $per_grado";
        $sql.= " per_seccion = $per_seccion";
        $sql.= " per_status = $per_status";
        $sql.= " WHERE per_id = $per_id ";
     //   echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function updateStatus( $per_id, $per_status ){

        $sql = "";
        $sql.= "UPDATE personal";
        $sql.= " SET per_status = $per_status";
        $sql.= " WHERE per_id = $per_id ";
     //   echo $sql;
        $save = $this->db->query( $sql );

		$result = false;
		if( $save ){
			$result = true;
		}
		return $result;
    
    }

    function generateId(){

        $sql = '';
        $sql = "SELECT max( per_id ) as max ";
		$sql.= " FROM personal;";
        $max = $this->db->query( $sql );
        return $max;
   
    }
    

    function get_estudiante_pago( $per_id = '', $per_carne = '', $per_usuario = '', $per_nombre = '', $per_apellido = '', $per_fecha_nacimiento = '', $per_grado = '', $per_seccion = '', $per_mail = '', $per_status = 1){

        $sql = '';
        $sql.= "SELECT *";
        $sql.= " FROM personal";
        $sql.= " INNER JOIN pago";
        $sql.= " ON pag_estudiante = per_id";
        if( strlen( $per_status ) > 0 ){
            $sql.= " WHERE per_status IN( $per_status )";
        }
        
        if( strlen( $per_id ) > 0 ){
            $sql.= " AND per_id = $per_id";
        }
        
        if( strlen( $per_carne ) > 0 ){
            $sql.= " AND per_carne = $per_carne";
        }

        if( strlen( $per_usuario ) > 0 ){
            $sql.= " AND per_usuario = $per_usuario";
        }
        
        if( strlen( $per_nombre ) > 0 ){
            $sql.= " AND per_nombre = $per_nombre";
        }

        if( strlen( $per_apellido ) > 0 ){
            $sql.= " AND per_apellido = $per_apellido";
        }
        
        if( strlen( $per_fecha_nacimiento ) > 0 ){
            $sql.= " AND per_fecha_nacimiento = $per_fecha_nacimiento";
        }

        if( strlen( $per_grado ) > 0 ){
            $sql.= " AND per_grado = $per_grado";
        }

        
        if( strlen( $per_seccion ) > 0 ){
            $sql.= " AND per_seccion = $per_seccion";
        }
        if( strlen( $per_mail ) > 0 ){
            $sql.= " AND per_mail = $per_mail";
        }
        //echo $sql;
        $result = $this->db->query( $sql );
        return $result;
        
    }


   
}
?>