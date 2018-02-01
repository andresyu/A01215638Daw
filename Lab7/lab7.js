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
    alert("Felicidades! Te has Registrado Correctamente");
    return true;
}

function openWin() {
    var myWindow = window.open("", "myWindow", "width=200, height=100");
    myWindow.document.write("<p>Espero haberte ayudado :)</p>");
    setTimeout(function(){ myWindow.close() }, 4500);
}

