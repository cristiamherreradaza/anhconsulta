<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
            body{
            background-color: #25274d;
            }
            .contact{
            padding: 4%;
            height: 400px;
            }
            .col-md-3{
            background: #ff9b00;
            padding: 4%;
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
            }
            .contact-info{
            margin-top:10%;
            }
            .contact-info img{
            margin-bottom: 15%;
            }
            .contact-info h2{
            margin-bottom: 10%;
            }
            .col-md-9{
            background: #fff;
            padding: 3%;
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
            }
            .contact-form label{
            font-weight:600;
            }
            .contact-form button{
            background: #25274d;
            color: #fff;
            font-weight: 600;
            width: 25%;
            }
            .contact-form button:focus{
            box-shadow:none;
            }
        </style>
</head>

<body>
    <div class="container-fluid">
        
            <div class="container contact">
                <div class="row">
                    <div class="col-md-3">
                        <div class="contact-info">
                            <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" />
                            <h2>Valida tus datos</h2>
                            <h4>Completando el siguiente formulario</h4>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="contact-form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="codigo">Codigo:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="codigo" placeholder="" name="codigo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="placa">Placa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="placa" placeholder="" name="placa">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="placa">Placa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="placa" placeholder="" name="placa">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script>
        // 2365-6395-4857
        function enviaDatos()
        {
            codigo = $("#codigo").val();// capturamos el codigo de la caja de texto
            $.ajax({
                url: 'https://vsrvuid006.anh.gob.bo:8443/WSConsultaMotorizados/obtener_datos_motorizado_pin',// colocamos la direccion al cual queremos enviar
                data: { "strCredencial": "01d5a2145be31e0f9a0b1554b27d259d", "strDepartamento": codigo, "decEstado": 0 },// enviamos los datos para consultar
                type: 'POST',// definimos el metodo para enviar puede ser GET o POST
                success: function (data) {
                    // en data recibimos la respuesta
					 console.log(data.oResultado[0]);
                    // console.log(data.oResultado[0].cI_PROPIETARIO);
                    //objRespuesta = JSON.parse(data);// transformamos la respuesta para poder manejarla
                    if(data.strMensaje == "OK"){// preguntamos si la credencial es valida
                        // si es valida llenos el formulario con los datos
                        $("#placa").val(data.oResultado[0].placa);
                        $("#ci").val(data.oResultado[0].cI_PROPIETARIO);
                        $("#nombres").val(data.oResultado[0].nombrE_PROPIETARIO);
                        $("#primer_apellido").val(data.oResultado[0].primeR_APELLIDO);
                        $("#segundo_apellido").val(data.oResultado[0].segundO_APELLIDO);
                        $("#estado_registro").val(data.oResultado[0].estadO_REGISTRO);
                    }else{
                        alert("Credencial invalida")
                    }
                }
            });
        }

        function limpiarDatos() 
        {
            document.getElementById("codigo").value = "";
            document.getElementById("placa").value = "";
            document.getElementById("ci").value = "";
            document.getElementById("nombres").value = "";
            document.getElementById("primer_apellido").value = "";
            document.getElementById("segundo_apellido").value = "";
            document.getElementById("estado_registro").value = "";
        }
    </script>
</body>

</html>