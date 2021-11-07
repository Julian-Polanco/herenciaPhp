<?php
require_once("class/class.php");
$objStudents = new Students;
$students = $objStudents->getData();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <!-- formulario de insertar -->
    <div class="container-sm w-50 bg-dark py-4 mt-5 rounded-circle">
        <h3 class="text-center mb-5 text-white">Ingresa tus datos</h3>
        <form id="formInsert">
            <div class="form-floating mb-3 col-8 mx-auto">
                <input type="text" class="form-control" id="numDoc" name="numDoc" placeholder="111111" required>
                <label for="numDoc">Numero de identificación</label>
            </div>
            <div class="form-floating mb-3 col-9 mx-auto">
                <input type="text" class="form-control" id="name" name="name" placeholder="Pepe" required>
                <label for="names">Nombre</label>
            </div>
            <div class="form-floating mb-3 col-10 mx-auto">
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="perez" required>
                <label for="lastName">Apellidos</label>
            </div>
            <div class="form-floating mb-3 col-11 mx-auto">
                <input type="text" class="form-control" id="address" name="address" placeholder="calle 12" required>
                <label for="address">Direccion</label>
            </div>
            <div class="form-floating mb-3 col-10 mx-auto">
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="31535494" required>
                <label for="phone">Telefono</label>
            </div>
            <div class="form-floating mb-3 col-9 mx-auto">
                <input type="text" class="form-control" id="guardian" name="guardian" placeholder="andres" required>
                <label for="guardian">Acudiente</label>
            </div>
            <div class="form-floating mb-3 col-7 mx-auto">
                <input type="text" class="form-control" id="grade" name="grade" placeholder="101" required>
                <label for="grade">Grado</label>
            </div>
            <div class="d-flex">
                <button type="submit" id="send" class="btn btn-primary mx-auto">Enviar Datos</button>
            </div>
        </form>
    </div>
    <!-- lista de datos -->
    <table class="table table-Light table-striped">
        <thead>
            <tr>
                <th> Numero De Documento </th>
                <th> Nombres </th>
                <th> Apellidos </th>
                <th> Direccion </th>
                <th> Telefono </th>
                <th> Acudiente </th>
                <th> Grado </th>
                <th> Acciones </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($students as $fila) {
            ?>
                <tr>
                    <td> <?= $fila["id_estudiante"]; ?></td>
                    <td> <?= $fila["Nombre_estudiante"]; ?></td>
                    <td> <?= $fila["Apellido_estud"]; ?></td>
                    <td> <?= $fila["direccion_est"]; ?></td>
                    <td> <?= $fila["telefono_est"]; ?></td>
                    <td> <?= $fila["acudiente"]; ?></td>
                    <td> <?= $fila["grupo_est"]; ?></td>
                    <td>
                        <form id='formDelete' class='d-inline'>
                            <input type='hidden' name='cedula' value='<?= $fila["id_estudiante"]; ?>'>
                            <input type='hidden' name='TipoConsulta' value='Eliminar'>
                            <button class="btn btn-danger d-" id="btnDelete" type="button" name="btnDelete" title="Eliminar"><i class="fa fa-trash"></i></button>
                        </form>
                        <button class="btn btn-primary d-inline" id="btnUpdate" title="Actualizar"><i class="fa fa-fas fa-edit"></i></button>
                    </td>
                </tr>


            <?php
            }
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script>
                $(document).ready(function() {
                    $(document).on('submit', '#formInsert', function(event) {
                        event.preventDefault();
                        let data = $('#formInsert').serialize();
                        $.ajax({
                            type: "POST",
                            url: 'class/insert.php',
                            data: data,
                            success: function(response) {
                                if (response === "1") {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Datos insertados correctamente',
                                        timer: 3000,
                                        timerProgressBar: true,
                                    })                                    
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Algo salio mal, revisa los datos',
                                        timer: 3000,
                                        timerProgressBar: true,
                                    })
                                }
                            }
                        })

                    })
                })
            </script>
            <script>
                $(document).ready(function() {
                    $('#btnDelete').click(function(e) {
                        e.preventDefault();
                        var datosElimina = $('#formDelete').serialize();
                        console.log(datosElimina);
                        $.ajax({
                            type: 'POST',
                            url: 'Crud.php',
                            data: datosElimina,
                            success: function(elimina) {
                                console.log(elimina);
                                if (elimina == 1) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Registro eliminado correctamente',
                                        timer: 3000,
                                        timerProgressBar: true,
                                    })
                                } else {
                                    alert('¡error!');
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Algo salio mal',
                                        timer: 3000,
                                        timerProgressBar: true,
                                    })
                                }
                            }
                        });
                    });
                });
            </script>
</body>

</html>