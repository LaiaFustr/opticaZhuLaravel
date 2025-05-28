<?php
session_start();


if(isset($_POST['borrar'])){
   session_destroy();
   header("Location: conecta4.php");
   exit();
}

//Si la sesion de la tabla no existe, la creo
if(!isset($_SESSION["tabla"])){
   $_SESSION["tabla"]=
   [[0,0,0,0,0,0,0],
   [0,0,0,0,0,0,0],
   [0,0,0,0,0,0,0],
   [0,0,0,0,0,0,0],
   [0,0,0,0,0,0,0],
   [0,0,0,0,0,0,0]];


   $_SESSION["turno"]= darTurno();//Y le asigno turno
   $_SESSION["ganador"]=false; //Y un sesion por si hay ganador


}

//Si se ha pulsado uno de los botones, entramos aqui
if(isset($_POST['boton'])){
   $colum =$_POST['boton'];
   $cambiado=false;

   for($fila=count($_SESSION["tabla"]) - 1; $fila>=0 && $cambiado!=true; $fila--){

           if($_SESSION["tabla"][$fila][$colum] ==0){
               $_SESSION["tabla"][$fila][$colum] = $_SESSION["turno"];

               if($_SESSION["turno"]==1){
                   $_SESSION["turno"] = 2;
                   $cambiado=true;
                   comprobarLateral($fila);
                   comprobarVertical($colum);
               }else {
                   $_SESSION["turno"] = 1;
                   $cambiado=true;
                   comprobarLateral($fila);
                   comprobarVertical($colum);
               }
       }

   }
}

//Funcion para comprobar si hay 4 seguidos en vertical
function comprobarVertical($columna){
   $rojos = 0;
   $amarillo = 0;

   for($i=0; $i<count($_SESSION["tabla"]); $i++){
       if($_SESSION["tabla"][$i][$columna] == 1){
           $rojos+=1;
           $amarillo=0;
               if($rojos==4){
                   ganador("rojo");
               }
       }else if($_SESSION["tabla"][$i][$columna] == 2){
           $amarillo+=1;
           $rojos=0;
               if($amarillo==4){
                   ganador("amarillo");
               }
       }else{
           $rojos = 0;
           $amarillo = 0;
       }
   }
}

//Funcion para comprobar si hay 4 seguidos en diagonal
//NO FUNCIONA

/*function comprobarDiagonal($fila, $colum){
   $rojos = 0;
   $amarillo = 0;
  
   for($i=0; $i<count($_SESSION["tabla"]); $i++){
       for($j=0; $j<count($_SESSION["tabla"][$i]); $j++){
           if($_SESSION["tabla"][$i][$j] == $_SESSION["tabla"][$i+1][$j+1] && $_SESSION["tabla"][$i+1][$j+1]== $_SESSION["tabla"][$i+2][$j+2] && $_SESSION["tabla"][$i+2][$j+2]== $_SESSION["tabla"][$i+3][$j+3]){
                   ganador("rojo");
           }else if($_SESSION["tabla"][$i][$j] == $_SESSION["tabla"][$i+1][$j+1] && $_SESSION["tabla"][$i+1][$j+1]== $_SESSION["tabla"][$i+2][$j+2] && $_SESSION["tabla"][$i+2][$j+2]== $_SESSION["tabla"][$i+3][$j+3]){
                   ganador("amarillo");
           }else{
               $rojos = 0;
               $amarillo = 0;
           }
       }
   }
}*/

//Funcion para comprobar si hay 4 seguidos en horizontal
function comprobarLateral($fila){
   $rojos = 0;
   $amarillo = 0;

       for($i=0; $i<count($_SESSION["tabla"][$fila]); $i++){
           if($_SESSION["tabla"][$fila][$i] == 1){
               $rojos+=1;
               $amarillo=0;
               if($rojos==4){
                   ganador("rojo");
               }
           }else if($_SESSION["tabla"][$fila][$i] == 2){
               $amarillo+=1;
               $rojos=0;
               if($amarillo==4){
                   ganador("amarillo");
               }
           }else{
               $rojos = 0;
               $amarillo = 0;
           }
       }
}

//Funcion que genera la tabla
function generarTabla($tabla){

   $filas = count($tabla);
   for($i=0; $i<$filas; $i++){
           echo "<tr>";
           $colum = count($tabla[$i]);
       for($j=0; $j<$colum; $j++){
           if($tabla[$i][$j]==1){
               echo "<td style='background-color:red; border: 2px solid black; padding:15px; width: 20px; height:50px'>"."</td>";
           }else if($tabla[$i][$j]==2){
               echo "<td style='background-color:yellow; border: 2px solid black; padding:15px; width:20px; height:50px'>"."</td>";
           }else{
           echo "<td style='border: 2px solid black; padding:15px; background-color: #0070ad; width: 20px; height:50px'>"."</td>";
           }
       }
       echo "</tr>";
   }

}

//Funcion que genera un numero aleatorio entre 1 y 2 para definir el turno
function darTurno(){
   return rand(1,2);
}

//Si la sesion del turno es igual a uno se mostrar un cubo rojo indicando que es su turno
if($_SESSION["turno"]==1){
   echo "<p>Turno de:</p><p style='background-color: red; width:100px; height:100px'>&#8239;</p>";
}else{//Si no, sera rojo
   echo "<p>Turno de:</p><p style='background-color: yellow; width:100px; height:100px'>&#8239;</p>";
}
//Y ahora llamamaos a la funcion para generar la tabla
generarTabla($_SESSION["tabla"]);

?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Conecta 4</title>
</head>
<body>

<h1>Conecta 4!!!!</h1>
<form method="POST">

<table style="text-align:center; background-color:#0083CA; padding:10px; border:3px solid black;">
<tr>
   <td><button type="submit" value="0" name="boton" <?php if($_SESSION["ganador"]==true){echo"disabled";}else if($_SESSION["tabla"][0][0]!=0){echo "disabled";}?>>+</button></td>
   <td><button type="submit" value="1" name="boton" <?php if($_SESSION["ganador"]==true){echo"disabled";}else if($_SESSION["tabla"][0][1]!=0){echo "disabled";}?>>+</button></td>
   <td><button type="submit" value="2" name="boton" <?php if($_SESSION["ganador"]==true){echo"disabled";}else if($_SESSION["tabla"][0][2]!=0){echo "disabled";}?>>+</button></td>
   <td><button type="submit" value="3" name="boton" <?php if($_SESSION["ganador"]==true){echo"disabled";}else if($_SESSION["tabla"][0][3]!=0){echo "disabled";}?>>+</button></td>
   <td><button type="submit" value="4" name="boton" <?php if($_SESSION["ganador"]==true){echo"disabled";}else if($_SESSION["tabla"][0][4]!=0){echo "disabled";}?>>+</button></td>
   <td><button type="submit" value="5" name="boton" <?php if($_SESSION["ganador"]==true){echo"disabled";}else if($_SESSION["tabla"][0][5]!=0){echo "disabled";}?>>+</button></td>
   <td><button type="submit" value="6" name="boton" <?php if($_SESSION["ganador"]==true){echo"disabled";}else if($_SESSION["tabla"][0][6]!=0){echo "disabled";}?>>+</button></td>
</tr>

<?php
generarTabla($_SESSION["tabla"]);

//Funcion para avisar quien es el ganador
function ganador($ganador){
   echo("El ganador es: ". $ganador);
   $_SESSION["ganador"]=true;
}


?>
</table>
<input type="submit" value="Borrar" name="borrar">

</form>

