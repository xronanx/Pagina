<?php
    class cita{

    public $id_cita;
    public $fecha_creacion;
    public $fecha_programada;
    public $hora;
    public $nombre;
    public $apellido;
    public $email;
    public $direccion;
    public $telefono;
    public $id_canal;
    public $id_estado;
    public $comentario;
	public $id_empleado;


     public function agregar(){
    $query="INSERT INTO cita VALUES ('{$this->id_cita}',
                                        '{$this->fecha_creacion}',
                                        '{$this->fecha_programada}',
                                        '{$this->hora}',
                                        '{$this->nombre}',
                                        '{$this->apellido}',
                                        '{$this->telefono}',
                                        '{$this->direccion}',
                                        '{$this->email}',
                                        '{$this->id_canal}',
                                        '{$this->id_estado}',
                                        '{$this->comentario}',
										'{$this->id_empleado}')";
    $result=mysql_query($query) or die ("Problema con query de Insertar");
     return $result;
    }
	
	
	public function actualizar_cita($cod_emp,$id_cita){
    $query="UPDATE  cita  SET id_empleado=".$cod_emp.",id_estado='2' where id_cita=".$id_cita."";
echo $query;
    $result=mysql_query($query) or die ("Problema con query de Insertar");
     return $result;
    }

        public function secqnos(){
        $query="SELECT siguiente from seqnos where tabla='cita'";
        $rs=mysql_query($query);
        if (!$rs) {
                           echo 'No se pudo ejecutar la consulta: ' . mysql_error();
                    exit;}
        $fila = mysql_fetch_row($rs);
        $num=$fila[0];
         $num = (int)$num;
             return $num;
        }

        public function Upsecqnos(){
        $query2="SELECT siguiente from seqnos where tabla='cita'";
        $rs=mysql_query($query2);
        if ($row = mysql_fetch_row($rs)) {
        $num = trim($row[0]);}
         $num = (int)$num+1;
      $query= "UPDATE seqnos set siguiente='".$num."'where tabla='cita'";
        $resultado = mysql_query($query) or die ("Problema con query");
           return $resultado;
		}
		 
		public function mostrar(){
        $query="SELECT cita.`id_cita`,
						`fecha_creacion`,
						`nombre`,
						`telefono`,
						`direccion`,
						`email`,
						canal.`descripcion`,
						cita_estado.`valor`,
						`comentario`
						FROM `cita`
						INNER JOIN  `canal` ON `cita`.id_canal = `canal`.id_canal
						INNER JOIN  `cita_estado` ON `cita`.id_estado = `cita_estado`.id_citaest 
						where id_empleado=0
						";
        $rs=mysql_query($query);
        $array=array();
        while($fila=mysql_fetch_assoc($rs)){
          $array[]=$fila;
        }
             return $array;
        }
		
		public function mostrar_byid($id){
		
        $query="SELECT `id_cita`,
						`nombre`,
						`apellido`,
						`telefono`,
						`direccion`,
						`email`
						FROM `cita`
						where `id_cita`='".$id."'";
        $rs=mysql_query($query);
        $array=array();
        while($fila=mysql_fetch_assoc($rs)){
          $array[]=$fila;
        }
             return $array;
        }
		
		public function asignar_cita(){
		$query="UPDATE `cita`
		     SET `nombre`='{$this->nombre}',
			`apellido`= '{$this->apellido}',
			`telefono`='{$this->telefono}',
			`direccion`='{$this->direccion}',
			`email`='{$this->email}',
			`id_estado`='{$this->id_estado}',
			WHERE `id_cita`";

        $result=mysql_query($query) or die ("Problema con query de Actualizar");
     return $result;
		}
		
		public function cantidad_citas(){
		$query="SELECT count(id_cita) as numeroCita from cita where id_estado=1";
		$rs=mysql_query($query);
		$array=array();
		while($fila=mysql_fetch_assoc($rs)){
			$array[]=$fila;
		}
			return $array;
		}
		
		public function cantidad_asi(){
		$query="SELECT count(id_cita) as numeroAsi from cita where id_estado=2";
		$rs=mysql_query($query);
		$array=array();
		while($fila=mysql_fetch_assoc($rs)){
			$array[]=$fila;
		}
			return $array;
		}
		
		public function cantidad_or(){
		$query="SELECT count(id_orden) as numeroOr from ORDEN_TRABAJO where id_estado= 1";
		$rs=mysql_query($query);
		$array=array();
		while($fila=mysql_fetch_assoc($rs)){
			$array[]=$fila;
		}
			return $array;
		}
		
		public function cantidad_ins(){
		$query="SELECT count(id_orden) as numeroOr from ORDEN_TRABAJO where id_estado= 3";
		$rs=mysql_query($query);
		$array=array();
		while($fila=mysql_fetch_assoc($rs)){
			$array[]=$fila;
		}
			return $array;
		}
		
		public function mostrar_mensaje(){
        $query="SELECT cita.`id_cita`,
						`fecha_creacion`,
						concat(nombre,' ',apellido) as nombre
						FROM `cita`
						INNER JOIN  `canal` ON `cita`.id_canal = `canal`.id_canal
						INNER JOIN  `cita_estado` ON `cita`.id_estado = `cita_estado`.id_citaest
						and `cita`.id_empleado=0
						ORDER BY fecha_creacion DESC";
        $rs=mysql_query($query);
        $array=array();
        while($fila=mysql_fetch_assoc($rs)){
          $array[]=$fila;
        }
             return $array;
        }
		
}
?>