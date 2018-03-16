<?php include("partial/_header.html") ?>

 <body class="container">
    <div class=" text-center">
        <h1 class="display-4">Laboratorio 20</h1>
    </div>
    
        <h2>Buscar Dentro de Tabla</h2>
        <input id="myInput" type="text" placeholder="Buscar">
        <br><br>
        
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Celular</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <tr>
              <td>Roberto</td>
              <td>Catillo</td>
              <td>4421234890</td>
            </tr>
            <tr>
              <td>Elena</td>
              <td>Moyos</td>
              <td>4428573038</td>
            </tr>
            <tr>
              <td>Leonel</td>
              <td>Gonzalez</td>
              <td>5519385769</td>
            </tr>
            <tr>
              <td>Andrea</td>
              <td>Millan</td>
              <td>44212940590</td>
            </tr>
            <tr>
              <td>Angel</td>
              <td>Gomes</td>
              <td>5519382169</td>
            </tr>
            <tr>
              <td>Chucho Perez</td>
              <td>Moyos</td>
              <td>4428236038</td>
            </tr>
            <tr>
              <td>Alberto</td>
              <td>Mendes</td>
              <td>4428573111</td>
            </tr>
          </tbody>
        </table>
         <hr>
       
        <h2>Preguntas a responder: </h2><br>
           <B> ¿Qué alternativas a jQuery existen?</B> <br><br>
               Podemos usar librerías selectoras, librerías minimalistas, asi como Javascript puro sin librerías.<br><br>
               
                <h3>Referencia: </h3>
                    http://www.etnassoft.com/2011/03/28/alternativas-a-jquery/

<?php include("partial/_footer.html") ?>