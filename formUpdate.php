<?php
$id_estudiante=$_POST['id_estudiante'];
$Nombre_estudiante=$_POST['Nombre_estudiante'];
$Apellido_estud=$_POST['Apellido_estud'];
$direccion_est=$_POST['direccion_est'];
$telefono_est=$_POST['telefono_est'];
$acudiente=$_POST['acudiente'];
$grupo_est=$_POST['grupo_est'];

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
    <title>Actualizar datos</title>
</head>

<body>
    <!-- formulario de insertar -->
    <div class="container-sm w-50 bg-dark py-4 mt-5 rounded-circle">
        <h3 class="text-center mb-5 text-white">Actualiza tus datos</h3>
        <form id="formUpdate">
            <div class="form-floating mb-3 col-8 mx-auto">
                <input readonly type="text" class="form-control" id="id_estudiante" name="id_estudiante" value="<?= $id_estudiante ?>" placeholder="111111" required>
                <label for="id_estudiante">Numero de identificación</label>
            </div>
            <div class="form-floating mb-3 col-9 mx-auto">
                <input type="text" class="form-control" id="Nombre_estudiante" name="Nombre_estudiante" value="<?= $Nombre_estudiante ?>" placeholder="Pepe" required>
                <label for="Nombre_estudiante">Nombre</label>
            </div>
            <div class="form-floating mb-3 col-10 mx-auto">
                <input type="text" class="form-control" id="Apellido_estud" name="Apellido_estud" value="<?= $Apellido_estud ?>" placeholder="perez" required>
                <label for="Apellido_estud">Apellidos</label>
            </div>
            <div class="form-floating mb-3 col-11 mx-auto">
                <input type="text" class="form-control" id="direccion_est" name="direccion_est" value="<?= $direccion_est ?>" placeholder="calle 12" required>
                <label for="direccion_est">Direccion</label>
            </div>
            <div class="form-floating mb-3 col-10 mx-auto">
                <input type="tel" class="form-control" id="telefono_est" name="telefono_est" value="<?= $telefono_est ?>" placeholder="31535494" required>
                <label for="telefono_est">Telefono</label>
            </div>
            <div class="form-floating mb-3 col-9 mx-auto">
                <input type="text" class="form-control" id="acudiente" name="acudiente"value="<?= $acudiente ?>" placeholder="andres" required>
                <label for="acudiente">Acudiente</label>
            </div>
            <div class="form-floating mb-3 col-7 mx-auto">
                <input type="text" class="form-control" id="grupo_est" name="grupo_est" value="<?= $grupo_est ?>" placeholder="101" required>
                <label for="grupo_est">Grado</label>
            </div>
            <div class="d-flex">
                <button type="submit" id="send" class="btn btn-primary mx-auto">Actualizar Datos</button>
            </div>
        </form>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#formUpdate', function(event) {
                event.preventDefault();
                let data = $('#formUpdate').serialize();
                $.ajax({
                    type: "POST",
                    url: 'class/update.php',
                    data: data,
                    success: function(response) {
                        if (response === "1") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Datos Actualizados correctamente',
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
</body>

</html>