function checarCon(form)
{
    if(form.con1.value != "" && form.con1.value == form.con2.value)
    {
        re = /[a-z]/;
        if(!re.test(form.con1.value))
        {
            form.con1.focus();
            return false;
        } 
    }
    else if(form.con1.value != form.con2.value)
    {
        alert("La contraseña no coincide");
        return false;  
    }
    alert("Felicidades! Contraseña Registrada Correctamente");
    return true;
}
    


function calcularArea(radio)
{
    var res = 3.1416*radio*radio;
    
    return res;
}

document.getElementById("area").onsubmit = function() {
    var radio = document.area.radio.value;    
    var result = calcularArea(radio);
    
    alert("El area del circulo es " + result);
    document.getElementById("resultado").innerHTML = result;
}

var myVar = setInterval(function(){ reloj() }, 1000);

function reloj() {
    var d = new Date();
    var t = d.toLocaleTimeString();
    document.getElementById("reloj").innerHTML = t;
}

function changeColor()
{
    document.getElementById("header").style.color = "red";
    
}

document.getElementById("header").addEventListener("mouseover", changeColor);

function openWin() {
    var myWindow = window.open("", "myWindow", "width=200, height=100");
    myWindow.document.write("<p>Espero haberte ayudado :)</p>");
    setTimeout(function(){ myWindow.close() }, 4500);
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}

crearOpt("cantidad",3,0);
crearOpt("cantidad",3,1);
crearOpt("cantidad",3,2);