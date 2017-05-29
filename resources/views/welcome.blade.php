@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
        </div>
    </div>
@endsection
@section('main')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
                <i class="fa fa-users"></i>
                <div class="count">120</div>
                <div class="title">Alumnos Inscriptos</div>
            </div><!--/.info-box-->
        </div><!--/.col-->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
                <i class="fa fa-graduation-cap"></i>
                <div class="count">20</div>
                <div class="title">Docentes</div>
            </div><!--/.info-box-->
        </div><!--/.col-->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
                <i class="fa fa-thumbs-o-up"></i>
                <div class="count">4.36</div>
                <div class="title">Promedio Notas</div>
            </div><!--/.info-box-->
        </div><!--/.col-->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
                <i class="fa fa-tablet"></i>
                <div class="count">0</div>
                <div class="title">Avisos enviados</div>
            </div><!--/.info-box-->
        </div><!--/.col-->
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div id="studentsByClassroom" style="height: 300px; width: 100%;"></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ '/dash/js/jquery.canvasjs.min.js' }}"></script>
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("studentsByClassroom",
                {
                    title:{
                        text: "Cantidad de Alumnos Repartidos por Curso"
                    },
                    animationEnabled: true,
                    legend:{
                        verticalAlign: "bottom",
                        horizontalAlign: "center"
                    },
                    data: [
                        {
                            indexLabelFontSize: 20,
                            indexLabelFontFamily: "sans-serif",
                            indexLabelFontColor: "darkgrey",
                            indexLabelLineColor: "darkgrey",
                            indexLabelPlacement: "outside",
                            type: "pie",
                            showInLegend: true,
                            toolTipContent: "{y} - <strong>#percent%</strong>",
                            dataPoints: [
                                {  y: 10, legendText:"1er Grado", indexLabel: "1er Grado" },
                                {  y: 12, legendText:"2do Grado", indexLabel: "2do Grado" },
                                {  y: 11, legendText:"3er Grado",exploded: true, indexLabel: "3er Grado" },
                                {  y: 12, legendText:"4to Grado" , indexLabel: "4to Grado"},
                                {  y: 10, legendText:"5to Grado", indexLabel: "5to Grado" },
                                {  y: 11, legendText:"6to Grado" , indexLabel: "6to Grado"},
                                {  y: 15, legendText:"7mo Grado" , indexLabel: "7mo Grado"},
                                {  y: 11, legendText:"8vo Grado" , indexLabel: "8vo Grado"},
                                {  y: 8, legendText:"9no Grado" , indexLabel: "9no Grado"}
                            ]
                        }
                    ]
                });
            chart.render();
            chart = {};

            var chart2 = new CanvasJS.Chart("chartContainer2",
                {
                    title:{
                        text: "Mejor Promedio",
                        fontFamily: "sans-serif"
                    },
                    animationEnabled: true,
                    data: [
                        {
                            type: "column",
                            dataPoints: [
                                { x: 1, y: 5, indexLabel:"Jose Rodriguez" },
                                { x: 2, y: 4.5, indexLabel: "Mariela Romero"},
                                { x: 3, y: 4.3, indexLabel: "Christan Dominguez" },
                                { x: 4, y: 4.1 , indexLabel: "Francisco Vargas"},
                                { x: 5, y: 3.9, indexLabel: "Julieta Venegas" }
                            ]
                        }
                    ]
                });

            chart2.render();
            chart2 = {};
        };
    </script>
@endsection

