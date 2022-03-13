var fname, lname, gender, country;

function _(x) {
    return document.getElementById(x);
}

function procesoAtras0() {

    _("phase1").style.display = "block";
    _("phase2").style.display = "none";
    _("progressBar").value = 33;
    _("status").innerHTML = "Paso 1 de 3 Remitente";
}

function procesoAtras1() {
    _("phase2").style.display = "block";
    _("phase3").style.display = "none";
    _("progressBar").value = 66;
    _("status").innerHTML = "Paso 2 de 3  Destinatario";
}

function procesoAtras2() {
    _("phase3").style.display = "block";
    _("show_all_data").style.display = "none";
    _("progressBar").value = 100;
    _("status").innerHTML = "Paso 3 de 3 Datos del Embarque";
}

function processPhase1() { /*Datos remitente */
    remitente = _("remitente").value;
    if (remitente.length > 0) {
        _("phase1").style.display = "none";
        _("phase2").style.display = "block";
        _("progressBar").value = 33;
        _("status").innerHTML = "Paso 2 de 3 Destinatario";
    } else {
        alert("Por favor complete los campos");
    }
}

function processPhase2() { /* Datos destinatario */
    destinatario = _("destinatario").value;
    if (destinatario.length > 0) {
        _("phase2").style.display = "none";
        _("phase3").style.display = "block";
        _("progressBar").value = 66;
        _("status").innerHTML = "Paso 3 de 3 Envío";
    } else {
        alert("Por favor elija un destinatario");
    }
}

function processPhase3() {
    cod_origen = _("cod_origen").value;
    cod_destino = _("cod_destino").value;
    fecha = _("fecha").value;
    valor = _("valor").value;
    tipo_bulto = _("tipo_bulto").value;
    num_bulto = _("num_bulto").value;
    peso_real = _("peso_real").value;
    empaquetado = _("empaquetado").value;
    incotem = _("incotem").value;
    descripcion = _("descripcion").value;
    if (cod_origen.length > 0 && cod_destino >0 && fecha.length>0 && valor.length>0 && tipo_bulto.length>0 &&  num_bulto.length>0 &&peso_real>0 && empaquetado.length>0 && descripcion.length>0) {

        _("multiphase").method = "post";
        _("multiphase").action = "guardar-guia.php"/*"my_parser.php";*/
        _("multiphase").submit();
      } else {
        alert("Todos los datos son obligatorios");
      }
}

function submitForm() {
    _("multiphase").method = "post";
    _("multiphase").action = "guardar-guia.php" /*"my_parser.php";*/
    _("multiphase").submit();
}

function processCalcular() { /* Datos destinatario */
    num_bulto = _("num_bulto").value;
    if (num_bulto.length > 0) {

        $('#myModal').modal('show');
    } else {
        alert("Por favor ingrese el número de bultos");
    }
}

function Cerrar() {
    $("#myModal").modal('hide');
}

/* uso del modal */

//modal funcion abrir y cerrar
$('button1').click(function() {
    $('#myModal').modal('show');
});

$(".cerrarModal").click(function() {
    $("#myModal").modal('hide')
});

//modal funcion calculadora
function calcular() {
    var alto = document.querySelectorAll('.alto');
    var ancho = document.querySelectorAll('.ancho');
    var largo = document.querySelectorAll('.largo');
    var volumen = document.querySelectorAll('.volumen');
    var total = 0

    if ((alto || ancho || largo) != "") {
        for (var i = 0; i < alto.length; i++) {
            volumen[i].value = (((alto[i].value) * (ancho[i].value) * (largo[i].value)) / 5000);
            total = (total == null || total == undefined || total == "") ? 0 : total;
            total = Number(volumen[i].value) + Number(parseFloat(total));
            console.log(total)
        }
        $("#button1").click(function() {
            $("#myModal").modal('hide')
        });
        $("#spTotal").val(total);
    }
}

//Funcion popover guia
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});


/* fin uso del modal */


//funcion calculo declaracion jurada
function cantidad() {
    var cantidad = document.querySelectorAll('.cantidad');
    var precio = document.querySelectorAll('.precio');
    var total = document.querySelectorAll('.total');
    var cantTotal = 0;

    if ((cantidad || precio) != "") {
        for (var i = 0; i < cantidad.length; i++) {
            total[i].value = (cantidad[i].value * precio[i].value);
            cantTotal = (cantTotal == null || cantTotal == undefined || cantTotal == "") ? 0 : cantTotal;
            cantTotal = Number(total[i].value) + Number(parseFloat(cantTotal));
        }
        document.getElementById('resultado').innerText = cantTotal
        document.getElementById('totalDeclarado').value= cantTotal

    }
}

//funcion añadir y eliminar input
$(document).ready(function() {
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" class="form-control volumen" style="padding: 4px; border-radius: 0.3rem;" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Eliminar campos"><i class="bi bi-dash-circle-fill"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function() { //Once add button is clicked
        if (x < maxField) { //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

function imprimir(imp1){  // función para iprimir solo un cóntenido dentro de una pag (en este caso pra la factura))
    
    var printContents = document.getElementById('imp1').innerHTML;
    w = window.open();
    w.document.write(printContents);
    w.document.close(); // necessary for IE >= 10
    w.focus(); // necessary for IE >= 10
    w.print();
    w.close();
    return true;
    }  