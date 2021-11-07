<?php
require_once("class/class.php");
$objStudents = new Students;
$students = $objStudents->getData();
print_r($students);
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
    <div>
    <table class="table table-Light table-striped">
        <thead>
            <tr>
                <th> Numero De Documento </th>
                <th> Nombres </th>
                <th> Direccion </th>
                <th> Telefono </th>
                <th> Eliminar </th>
                <th> Actualizar </th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($students[0]); $i++) {
            ?>
                <tr>
                    <td> <?php echo $students[0][$i]["cedula"]; ?></td>
                    <td> <?php echo $students[0][$i]["nombre"]; ?></td>
                    <td> <?php echo $students[0][$i]["direccion"]; ?></td>
                    <td> <?php echo $students[0][$i]["telefono"]; ?></td>
                    <td>
                        <form id='formDelete' >
                            <input type='hidden' name='cedula' value='<?php echo $students[0][$i]["cedula"]; ?>'>
                            <input type='hidden' name='TipoConsulta' value='Eliminar'>
                            <button class="btn btn-danger" id="BtnEliminar" type="button" name="BtnEliminar"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                    <td> <a href=actualizar.php?cedula=<?php echo $students[0][$i]['cedula']; ?>>Actualizar</a></td>
                </tr>
            <?php
            }
            ?>
            </div>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

            <script>
                $(document).ready(function() {
                    $('#BtnEliminar').click(function(e) {
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
                                    setTimeout('document.location.reload()', 3000);
                                } else {
                                    alert('¡error!');
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Algo salio mal',
                                        timer: 3000,
                                        timerProgressBar: true,
                                    })
                                    setTimeout('document.location.reload()', 3000);
                                }
                            }
                        });
                    });
                });
            </script>
</body>

</html>