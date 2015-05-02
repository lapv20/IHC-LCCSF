<?php 
    include("conexion.php");
    $wsql = "select * from historial join actividades where historial.idactividad=actividades.idactividad ORDER BY fecha DESC ";
    $result = mysql_query($wsql,$link);
?>
<h4 class="widgettitle"><span style="float:right;" class="iconfa-list-alt"></span> Historial</h4>
<table id="dyntable" class="table table-bordered responsive">
    <colgroup>
        <col class="con0" />
        <col class="con1" />
        <col class="con0" />
        <col class="con1" />
        <col class="con0" />
        <col class="con1" />
    </colgroup>
    <thead>
    <tr>
      	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
        <th class="head0"><span style="float:right; margin-top:5px;" class="iconfa-user"></span> Usuario</th>
        <th class="head1"><span style="float:right; margin-top:5px;" class="iconfa-pencil"></span> Actividad</th>
        <th class="head1"><span style="float:right; margin-top:5px;" class="iconfa-calendar"></span> Fecha</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    while($row = mysql_fetch_array($result)){ ?>
    <tr class="gradeX">
      <td class="aligncenter"><span class="center">
        <input type="checkbox" />
    </span></td>
        <td><?php echo $row['nombre_usuario'];?></td>
        <td><?php echo $row['nombre_actividad'];?></td>
        <td><?php
        $fecha = $row['fecha'];
        $mes = substr($fecha, -5, 2);
        $dia = substr($fecha, -2, 2);
        $ano = substr($fecha, -10, 4);

        echo $dias[date('w', mktime(0,0,0,$mes,$dia,$ano))].", "
            .date('d',mktime(0,0,0,$mes,$dia,$ano))." de ".
            $meses[date('n', mktime(0,0,0,$mes,$dia,$ano))-1]. " del ".
            date('Y', mktime(0,0,0,$mes,$dia,$ano));
        ?></td>
    </tr>
    <?php }?>
</tbody>
</table>
