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

function crearOpt(clase,max,index){
    var select, i, option;
    
    select = document.getElementsByClassName(clase);
    
    for (i = 0; i <= max; i ++) {
        opt = document.createElement('option');
        opt.value = opt.text = i;
        select[index].add(opt);
    }
}

function calcularTotal(subtotal){
    
    var iva = subtotal * .16;
    
    document.getElementById("iva").innerHTML = "$" + String(iva);
    
    var tot = subtotal + iva;
    
    document.getElementById("tot").innerHTML = "$" + String(tot);
}

function calcularTotales()
{
    var cantidades = document.getElementsByClassName("cantidad");
    
    var i, subtotal = 0, precio;
    
    for(i = 0; i <= 2; i++)
    {
        if(i == 0)
        {
        precio = cantidades[i].value * 23500;
        }
        else if (i == 1)
        {
        precio = cantidades[i].value * 7000;
        }
        else
        {
        precio = cantidades[i].value * 30000;   
        }
        
        subtotal = subtotal + precio;
    }

    document.getElementById("subTotal").innerHTML = "$" + String(subtotal) + ".00";
    calcularTotal(subtotal);
}

function calcularSubTotal(index)
{
    var cantidad = document.getElementsByClassName("cantidad")[index].value;
    
    if(index == 0)
    {
        cantidad = cantidad * 23500;
    }
    else if (index == 1)
    {
        cantidad = cantidad * 7000;
    }
    else
    {
        cantidad = cantidad * 30000;
    }
    
    document.getElementsByClassName("subTotal")[index].innerHTML = "$" +String(cantidad) + ".00";
    
    calcularTotales();
}

function confirmarPago(){
    
    var total = document.getElementById("total");
    
    alert("Gracias por tu compra! NO te va a llegar nada :) pero gracias")
    
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

crearOpt("cantidad",3,0);
crearOpt("cantidad",3,1);
crearOpt("cantidad",3,2);