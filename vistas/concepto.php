<?php
//Activamos el almacenamiento en el buffer
ob_start();


session_start();
if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['Escritorio']==1)
{
?>
    <!-- Inicio Contenido PHP-->
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <header class="main-box-header clearfix">
                    <h2 class="box-title">Escritorio</h2>
                </header>
                <div class="row">
                    <div class="main-box-body clearfix" >
                    <div class="col-sm-4">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h4 style="font-size: 27px;">Prestamos del Dia: <b style="font-size: 37px;font-weight: bold;margin-left: 20px"><label id="pdia">0</label></b></h4>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <div class="main-box-body clearfix" >
                    <div class="col-sm-4">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h4 style="font-size: 27px;">Pagos del Dia: <b style="font-size: 37px;font-weight: bold;margin-left: 20px"><label id="ppagos">0</label></b></h4>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="main-box-body clearfix" >
                    <div class="col-sm-4">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h4 style="font-size: 27px;">Gastos del Dia: <b style="font-size: 37px;font-weight: bold;margin-left: 20px"><label id="pdia">1</label></b></h4>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="main-box-body clearfix" >
                </div>
                
            </div>
        </div>
    </div>
    <!-- Fin Contenido PHP-->
    <?php
}
else
{
 require 'noacceso.php';
}

require 'footer.php';
?>

    <!--<script type="text/javascript" src="scripts/prestamos.js"></script>-->
<?php 
}
ob_end_flush();
?>
    <script type="text/javascript">
        
        $(document).ready(function($){
            mostrar2()
            function mostrar2()
            {
                $.post("../ajax/prestamos.php?op=consultar", function(data, status)
                {
                    data = JSON.parse(data);   
                    console.log(data['count(*)']);
                     $("#pdia").text(data['count(*)']);

                });
            }
        })
        
    </script>

