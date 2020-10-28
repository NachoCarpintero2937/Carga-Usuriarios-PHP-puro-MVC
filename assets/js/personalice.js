
function loadTable(e) {
    var filtro;
    $("#users").html('');
    if (e) {
        filtro = $("#filtro_generico").val();
    }
    $.ajax({
        url: "index.php?c=usuario&a=getUsuarios",
        data: { filtro: filtro },
        type: "POST",
        dataType: 'json',
        cache: false,
        timeout: 10000,
        success: function (resp) {
            if (resp.status == 1) {
                if (resp.data.length > 0)
                    resp.data.forEach(element => {

                        $("#users").append(
                            `<tr>
                       <td>`+ element.id + `</td>
                       <td>`+ element.nombre + `</td>
                       <td>`+ element.email + `</td>
                       <td>`+ element.usuario + `</td>
                       <td>`+ element.tipo + `</td>
                       <td><span class="`+ badge(element.estado) + `">` + element.estado + `</td>
                       <td>`+ formatDate(element.fecha) + `</td> 
                       <td>
                       <div class="btn-group btn-group-sm " role="group" aria-label="Basic example">
                       <button type="button" class="btn btn-primary btn-sm"  data-toggle="tooltip" data-placement="top" title="Ver a `+ element.nombre + `" onclick="getAtributeUsers(` + element.id + `)"><i class="fas fa-eye"></i></button>
                     </div>
                       </td>
                       </tr>
                       `
                        )
                    });
            } else {
                throw "Error en GetUsuarios";
            }
        },
        error: function () { }
    });
}
//*******************************VISTA DE USUARIO ************************************//
function view(id) {
    // Llamo a los estados y tipo y muestro modal
    $('#basicExampleModal').modal({
        backdrop: 'static'
    });

    $.ajax({
        url: "index.php?c=usuario&a=getUsuarios",
        data: { filtro_id: id },
        type: "POST",
        dataType: 'json',
        cache: false,
        timeout: 10000,
        success: function (resp) {

            if (resp.status == 1 && resp.data.length > 0)
                prepararForm(resp.data[0]);

        },
        error: function () { }
    });

}
function prepararForm(respuesta) {
    console.log(respuesta);
    var nombre = $("#nombre");
    var usuario = $("#usuario");
    var email = $("#email");
    var password = $("#password");
    var tipo = $("#tipo_usuario");
    var estado = $("#estado_usuario");
    var fecha_alta = $("#fecha_alta");

    // Seteo valores
    nombre.val(respuesta.nombre);
    usuario.val(respuesta.usuario);
    email.val(respuesta.email);
    $("#estado_usuario option:contains(" + respuesta.estado + ")").attr('selected', true);
    $("#tipo_usuario option:contains(" + respuesta.tipo + ")").attr('selected', true);
    fecha_alta.val(formatDate(respuesta.fecha));

    // Escondo lo que no se tiene que ver
    $("#password_div").hide();
    $("#submit").hide();

    // Muestro lo que si se ve en view
    $("#fecha_div").removeClass("d-none");

    // titulo de modal
    $("#title_modal").text("Ver usuario " + respuesta.nombre);

    // Seteamos ahora en readonly disabled
    $(".form-control").prop('disabled', true);
}
// ***************************************************************************************//


// ******************************INACTIVAR Y ELIMINAR USUARIO ***************************************//
function action(id, string) {
    $.ajax({
        url: "index.php?c=usuario&a=action",
        data: { id: id, action: string },
        type: "POST",
        dataType: 'json',
        cache: false,
        timeout: 10000,
        success: function (resp) {

        },
        error: function () { }
    });
}

//******************************FORMATEADORES ********************************************//
function formatDate(date) {
    var m = new Date(date);
    var dateString =
        m.getUTCDate() + "/" +
        ("0" + (m.getUTCMonth() + 1)).slice(-2) + "/" +
        (m.getUTCFullYear()) + " " +
        ("0" + m.getUTCHours()).slice(-2) + ":" +
        ("0" + m.getUTCMinutes()).slice(-2) + ":" +
        ("0" + m.getUTCSeconds()).slice(-2);

    return dateString;
}
// hice esto para no hacer una ternaria gigante
function badge(estado) {
    var clase;
    if (estado == "HABLITADO")
        this.clase = "badge badge-success";
    else if (estado == "DESHABILITADO")
        this.clase = "badge badge-danger";
    else
        this.clase = "badge badge-primary"
    return this.clase;
}
//*****************************************************************************************//

function login() {
    var user = $("#user");
    var password = $("#password");
    var alerts = $("#alert");
    if (!user.val() || !password.val()) {
        alerts.html(`
        <div class="alert alert-danger" role="alert">
            Complete todos los campos con *
      </div>
        `);
        alerts.show();
        setTimeout(function () {
            alerts.hide();
        },
            3000
        );
        return false;
    }
    $.ajax({
        url: "index.php?c=login&a=login",
        data: {
            data: btoa(JSON.stringify({
                usuario: user.val(),
                password: password.val()
            }))
        },
        type: "POST",
        dataType: 'json',
        cache: false,
        timeout: 10000,
        success: function (resp) {
            console.log(resp);
            if (resp.status == 1) {
                window.location.href = 'index.php?c=usuario&a=index';
            } else {
                alerts.html(
                    `  <div class="alert alert-danger" role="alert">
                    `+ resp.message + `
              </div> `
                );
                alerts.show();
                setTimeout(function () {
                    alerts.hide();
                },
                    3000
                );
                user.val(null);
                password.val(null);
            }
        },
        error: function () { }
    });
}

function getAtributeUsers(id) {
    var estados = $("#estado_usuario");
    var tipo_usuario = $("#tipo_usuario");

    $.ajax({
        url: "index.php?c=usuario&a=getAtributeUsers",
        data: {},
        type: "POST",
        dataType: 'json',
        cache: false,
        timeout: 10000,
        success: function (resp) {
            if (resp.data.estados.length > 0) {
                $('#estado_usuario option').remove();
                estados.append(`<option selected disabled>Estados</option>`);
                resp.data.estados.forEach(element => {
                    estados.append(new Option(element.descripcion, element.id));

                });
            }
            if (resp.data.tipo_usuario.length > 0) {
                $('#tipo_usuario option').remove();
                tipo_usuario.append(`<option selected disabled>Tipo de usuario</option>`)
                resp.data.tipo_usuario.forEach(element => {
                    tipo_usuario.append(new Option(element.descripcion, element.id));

                });
            }
            if (id)
                view(id);

        },
        error: function () { }
    });
}
function logout() {
    $.ajax({
        url: "index.php?c=login&a=logout",
        data: {},
        type: "POST",
        dataType: 'json',
        cache: false,
        timeout: 10000,
        success: function (resp) {
            window.location.href = 'index.php';
        },
        error: function () { }
    });
}
function submit() {
    var nombre = $("#nombre").val();
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    var email = $("#email").val();
    var tipo = $("#tipo_usuario").val();
    var estado = $("#estado_usuario").val();
    $.ajax({
        url: "index.php?c=usuario&a=create",
        data: {
            nombre: nombre,
            usuario: usuario,
            password: password,
            email: email,
            tipo: tipo,
            estado: estado
        },
        type: "POST",
        dataType: 'json',
        cache: false,
        timeout: 10000,
        success: function (resp) {
            if (resp.status == 1) {
                swal("Ok!", resp.message, "success")
                    .then((value) => {
                        if (value) {
                            $('#basicExampleModal').modal('toggle');
                            loadTable();
                        }
                    });
            }
        },
        error: function () { }
    });
}
function limpiarForm() {
    // Limpiamos cada input
    $(".form-control").val('');

    // hablitamos los campos 
    $(".form-control").prop('disabled', false);

    // Escondemos los divs correspondientes
    $("#fecha_div").addClass("d-none");

    // Mostramos inputs correspondientes
    $("#password_div").show("d-none");
    $("#submit").show();

    // limpiamos el titulo
    $("#title_modal").text("Crear Usuario");
}
