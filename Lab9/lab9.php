<!DOCTYPE HTML>

<html lang="es-mx">

<head>

<meta charset="utf-8"/>

<meta name="description" content="Lab9/>
    
<title> Lab 9 </title>

</head>

<body>
    
    <div id = "env">
     
        <header>
		  <h1>Laboratorio 9 </h1>
	    </header>
    
        <main id = "cont">
            
            <section>

                <h3> Promedio y Mediana: </h3>
                <article>
                    
                    <?php  
                    function promedio($arr)
                    {
                        $prom = 0;
                        foreach($arr as $val)
                        {
                            $prom += $val;
                        }
                        $prom = $prom / count($arr);
                        echo $prom;
                    }
                    
                    function arreglo_mediana($array) 
                    {
                      $iCount = count($array);
                      $middle_index = floor($iCount / 2);
                      sort($array, SORT_NUMERIC);
                      $mediana = $array[$middle_index]; 
                      if ($iCount % 2 == 0) {
                        $mediana = ($mediana + $array[$middle_index - 1]) / 2;
                        }
                        echo $mediana;
                    }
                    ?>
                    
                    <b>Datos</b> : [45,67,90,21,53,1,10,9,]
                     <br> <b>Promedio</b> :
                    <?php 
                    $arreglo1 = array(45,67,90,21,53,1,10,9);
                    promedio($arreglo1);
                    ?>
                     <b>Mediana</b> : 
                    <?php 
                    arreglo_mediana($arreglo1);
                    ?>
                    <br>
                    <br>
                    <b>Datos</b>: [23,22,11,3,5,10,82,55,4]
                     <br><b>Promedio</b>: 
                    <?php 
                    $arreglo2 = array(23,22,11,3,5,10,82,55,4);
                    promedio($arreglo2);
                    ?>
                     <b>Mediana</b>: 
                    <?php 
                    arreglo_mediana($arreglo2);
                    ?>
                    <br>             
                    
                </article>
                
                <h3> Lista: </h3>
                <article> 
                    <?php 
                    function imprimir_Arreglo($arr)
                    {
                        $result = "[";
                        foreach($arr as $val)
                        {
                            $result = $result . (string)$val . ", ";
                            
                        }
                        echo $result . "]";
                    }
                    ?>
                    
                    <?php
                    $arreglo3 = array(1,4412,686,70,3,88,782,);
                    ?>
                    Datos: <?php imprimir_Arreglo($arreglo3) ?>
                    
                    <br><br>
                    
                    Resultados:
                    <ul>
                        <li> Promedio: <?php promedio($arreglo3) ?></li>
                        <li> Mediana: <?php arreglo_mediana($arreglo3) ?></li>
                        <li> 
                            Menor a Mayor:
                            <?php
                            sort($arreglo3, SORT_NUMERIC); 
                            imprimir_Arreglo($arreglo3); 
                            ?>
                        </li>
                        <li>
                            Mayor a Menor: 
                            <?php
                            rsort($arreglo3, SORT_NUMERIC); 
                            imprimir_Arreglo($arreglo3); 
                            ?>
                        </li>
                    </ul>
                    
                    <?php
                    $arreglo3 = array(11,20,533,172,5732,54);
                    ?>
                    Datos: <?php imprimir_Arreglo($arreglo3) ?>
                    
                    <br><br>
                    
                    Resultados:
                    <ul>
                        <li> Promedio: <?php promedio($arreglo3) ?></li>
                        <li> Mediana: <?php arreglo_mediana($arreglo3) ?></li>
                        <li> 
                            Menor a Mayor:
                            <?php
                            sort($arreglo3, SORT_NUMERIC); 
                            imprimir_Arreglo($arreglo3); 
                            ?>
                        </li>
                        <li>
                            Mayor a Menor: 
                            <?php
                            rsort($arreglo3, SORT_NUMERIC); 
                            imprimir_Arreglo($arreglo3); 
                            ?>
                        </li>
                    </ul>
                </article>
                
                
                <p>                    
                    <?php
                    echo " <table border='3' id = 'Tabla' cellspacing='0'>
                    <tr>
                    <td class='hed' colspan='8'>Tabla</td>
                      </tr>
                    <tr>
                    <th>n</th>
                    <th>n^2</th>
                    <th>n^3</th>
                    </tr>";
                    
                    $cuadrado = 0;
                    $cubo = 0;
                    
                    for($i = 1; $i <= 10; $i++){
                        
                        $cuadrado = pow($i,2);
                        $cubo = pow($i,3);
                        
                        echo "<tr>
                        <td>$i</td>
                        <td>$cuadrado</td>
                        <td>$cubo</td>
                        </tr>";
                    }
                    
                    ?>
                    
                </p>
            
            </section>
            
            <section>
                <h2> Preguntas: </h2>
                <article>
                    <h3>
                        ¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención.
                    </h3>
                    <p>
                        Despliega en pantalla la configuración de la versión actual de PHP que se encuentra instalada.
                         Las opciones de compilación, versiones, módulos, etc.
                    </p>
                    
                    <h3>
                        ¿Qué cambios tendrías que hacer en la configuración del servidor para que pudiera ser apto en un ambiente de producción?
                    </h3>
                    <p>
                        Preparar la base de datos, el registro del usuario, el gestor de despliegue asi como el servidor web remoto.
                    </p>
                    
                    <h3>
                        ¿Cómo es que si el código está en un archivo con código html que se despliega del lado del cliente, se ejecuta del lado del servidor? Explica.
                    </h3>
                    <p>
                        Se ejecuta el archivo php y que incluye el html, por lo que el html no esta ligado con el php.
                    </p>
                    
                </article>
            </section>
            
            <section>
                <h2>Referencias:</h2>
                 [1] https://www.w3schools.com/php/ <br>
                <h2>Tabla:</h2>
            </section>
            
        </main>        
    </div>
</body>
</html>