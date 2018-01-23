function tabla(){
    var numero = prompt("Ingresa un número");
    var tabla = "<table><tbody>";
    tabla += "<tr><td>" + "Número" + "</td><td>" + "Cuadrado" + "</td><td>" + "Cubo" + "</td></tr>";
    for(var i=1; i<=numero; i++){
        tabla += "<tr>" + "<td>"+ i + "</td>" + "<td>" + Math.pow(i,2) + "</td>" +"<td>" + Math.pow(i,3) + "</td>" +"</tr>";
    }
    tabla += "</tbody></table>";
    var div = document.getElementById("ejer1");
    div.innerHTML = tabla;
}

function random(){
    var val1 = Math.floor(Math.random()*100);
    var val2 = Math.floor(Math.random()*100);
    var tiempo1 = new Date().getTime();
    var resp= window.prompt("Cual es la respuesta de " +val1+ "+" +val2+ "=" ); 
    var tiempo2 = new Date().getTime();
    var res = "<p>Incorrecto,  tiempo: ";
    if(resp==(val1+val2)){
        res ="<p>Correcto, tiempo: ";
    }
    res += (tiempo2-tiempo1)/1000 + " seg.</p>";
    var div = document.getElementById("ejer2");
    div.innerHTML = res;
}

function contador(arr) {
    var i, negativo = 0, positivo = 0, ceros = 0;
    var res;
    for (i=0; i<=arr.length; i++) {
    if (arr[i] == 0) {
        ceros++;
    }else if (arr[i] < 0){
        negativo++;
        } else if (arr[i] > 0) {
           positivo++;
        }
    }
    res +="<p>Hay " + positivo + " numeros positivos <br> Hay " + negativo + " numeros negativos<br> El número de ceros es: " + ceros+"</p>";
    var div = document.getElementById("ejer3");
    div.innerHTML = res;
}

function promedio(arr){
    var res = new Array(), str = "", i,j, k, tam;
    for (i = 0;i<arr.length; i++) {
        tam = arr[i].length;
        j = 0;
        for (k= 0; k < tam; k++) {
            j = j + arr[i][k];
        }
        j = Math.floor(j/tam);
        str = str + "<br>El promedio es: " + i + " es: " + j;
        res.push(j);
    }
    var div = document.getElementById("ejer4");
    div.innerHTML = str;
}

function invertir(){
    var numero = parseInt(window.prompt("Ingresa el numero que vas a invertir"));
    var acum = parseInt(0);
    do{
        acum = parseInt(acum)*10 + parseInt(numero)%10;
        numero = parseInt(numero)/10;
    }while(numero>0);
    var res = "<p>" +acum/10+ "</p>";
    var div = document.getElementById("ejer5");
    div.innerHTML = res;
}

function lowerCase(){
    var str = window.prompt("Escribe una palabra con mayúsculas");
    var res = str.toLowerCase();
    var div = document.getElementById("ejer6");
    div.innerHTML = res;
}