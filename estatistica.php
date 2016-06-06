<?php
include 'head.php';
include 'funcoes.php';
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Curso", "Cobertura", {role: "style"}],
<?php
$cursos = get_top10();
if (mysqli_num_rows($cursos) > 0) {
    while ($row = mysqli_fetch_array($cursos)) {
        $aval = $row['AVALIACAO'];
        $nomecurso = get_curso($row['ID_CURSO']);
        while ($row2 = mysqli_fetch_array($nomecurso)) {
            $nome = $row2['SIGLA'];
            echo '["' . $nome . '",'. $aval .', "#ff4d4d"],';
        }
    }
}
?>

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"},
            2]);

        var options = {
            title: "",
            width: 600,
            height: 400,
            bar: {groupWidth: "75%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>
<script type="text/javascript">
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Curso", "Cobertura", {role: "style"}],
<?php
$cursos = get_top5_grupo1();
if (mysqli_num_rows($cursos) > 0) {
    while ($row = mysqli_fetch_array($cursos)) {
        $aval = $row['AVALIACAO'];
        $nomecurso = get_curso($row['ID_CURSO']);
        while ($row2 = mysqli_fetch_array($nomecurso)) {
            $nome = $row2['SIGLA'];
            echo '["' . $nome . '",' . $aval . ', "#ff4d4d"],';
        }
    }
}
?>

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"},
            2]);

        var options = {
            title: "",
            width: 600,
            height: 400,
            vAxis: {
                viewWindowMode: 'explicit',
                viewWindow: {
                    max: 100,
                    min: 0
                }
            },
            bar: {groupWidth: "75%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
        chart.draw(view, options);
    }
</script>
<script type="text/javascript">
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Curso", "Cobertura", {role: "style"}],
<?php
$cursos = get_top5_grupo2();
if (mysqli_num_rows($cursos) > 0) {
    while ($row = mysqli_fetch_array($cursos)) {
        $aval = $row['AVALIACAO'];
        $nomecurso = get_curso($row['ID_CURSO']);
        while ($row2 = mysqli_fetch_array($nomecurso)) {
            $nome = $row2['SIGLA'];
            echo '["' . $nome . '",' . $aval . ', "#ff4d4d"],';
        }
    }
}
?>

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"},
            2]);

        var options = {
            title: "",
            width: 600,
            height: 400,
            vAxis: {
                viewWindowMode: 'explicit',
                viewWindow: {
                    max: 100,
                    min: 0
                }
            },
            bar: {groupWidth: "75%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values3"));
        chart.draw(view, options);
    }
</script>
<script type="text/javascript">
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Curso", "Cobertura", {role: "style"}],
<?php
$cursos = get_top5_grupo3();
if (mysqli_num_rows($cursos) > 0) {
    while ($row = mysqli_fetch_array($cursos)) {
        $aval = $row['AVALIACAO'];
        $nomecurso = get_curso($row['ID_CURSO']);
        while ($row2 = mysqli_fetch_array($nomecurso)) {
            $nome = $row2['SIGLA'];
            echo '["' . $nome . '",' . $aval . ', "#ff4d4d"],';
        }
    }
}
?>

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"},
            2]);

        var options = {
            title: "",
            width: 600,
            height: 400,
            vAxis: {
                viewWindowMode: 'explicit',
                viewWindow: {
                    max: 100,
                    min: 0
                }
            },
            bar: {groupWidth: "75%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values4"));
        chart.draw(view, options);
    }
</script>
<script type="text/javascript">
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Curso", "Cobertura", {role: "style"}],
<?php
$cursos = get_top5_grupo4();
if (mysqli_num_rows($cursos) > 0) {
    while ($row = mysqli_fetch_array($cursos)) {
        $aval = $row['AVALIACAO'];
        $nomecurso = get_curso($row['ID_CURSO']);
        while ($row2 = mysqli_fetch_array($nomecurso)) {
            $nome = $row2['SIGLA'];
            echo '["' . $nome . '",' . $aval . ', "#ff4d4d"],';
        }
    }
}
?>

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"},
            2]);

        var options = {
            title: "",
            width: 600,
            height: 400,
            vAxis: {
                viewWindowMode: 'explicit',
                viewWindow: {
                    max: 100,
                    min: 0
                }
            },
            bar: {groupWidth: "75%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values5"));
        chart.draw(view, options);
    }
</script>
<script type="text/javascript">
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Curso", "Cobertura", {role: "style"}],
<?php
$cursos = get_top5_grupo5();
if (mysqli_num_rows($cursos) > 0) {
    while ($row = mysqli_fetch_array($cursos)) {
        $aval = $row['AVALIACAO'];
        $nomecurso = get_curso($row['ID_CURSO']);
        while ($row2 = mysqli_fetch_array($nomecurso)) {
            $nome = $row2['SIGLA'];
            echo '["' . $nome . '",' . $aval . ', "#ff4d4d"],';
        }
    }
}
?>

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"},
            2]);

        var options = {
            title: "",
            width: 600,
            height: 400,
            vAxis: {
                viewWindowMode: 'explicit',
                viewWindow: {
                    max: 100,
                    min: 0
                }
            },
            bar: {groupWidth: "75%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values6"));
        chart.draw(view, options);
    }
</script>
<script type="text/javascript">
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Curso", "Cobertura", {role: "style"}],
<?php
$cursos = get_top5_grupo6();
if (mysqli_num_rows($cursos) > 0) {
    while ($row = mysqli_fetch_array($cursos)) {
        $aval = $row['AVALIACAO'];
        $nomecurso = get_curso($row['ID_CURSO']);
        while ($row2 = mysqli_fetch_array($nomecurso)) {
            $nome = $row2['SIGLA'];
            echo '["' . $nome . '",' . $aval . ', "#ff4d4d"],';
        }
    }
}
?>

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"},
            2]);

        var options = {
            title: "",
            width: 600,
            height: 400,
            vAxis: {
                viewWindowMode: 'explicit',
                viewWindow: {
                    max: 100,
                    min: 0
                }
            },
            bar: {groupWidth: "75%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values7"));
        chart.draw(view, options);
    }
</script>
<body>

    <!-- Container -->
    <div id="container">

        <?php include 'header.php'; ?>


        <!-- Start Page Banner -->
        <div class="page-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Estatísticas</h2>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumbs">
                            <li><a href="index.php">Ínicio</a></li>
                            <li>Estatísticas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->


        <!-- Start Content -->
        <div id="content">
            <div class="container">
                <div class="page-content">
                    <div class="row">

                        <div class="col-md-12">
                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>TOP 10 - Cobertura por Curso</span></h4>
                            <div id="columnchart_values"></div>	
                        </div>
                    </div>
                    <div class="hr1" style="margin-bottom:45px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>Análise de Domínio e Engenharia de Requisitos</span></h4>
                            <div id="columnchart_values2"></div>			
                        </div>
                        <div class="col-md-6">
                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>Conceção e Construção de Soluções Informáticas</span></h4>
                            <div id="columnchart_values3"></div>	
                        </div>

                    </div>
                    <div class="hr1" style="margin-bottom:45px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>Teste e Validação de Soluções Informáticas</span></h4>
                            <div id="columnchart_values4"></div>
                        </div>
                        <div class="col-md-6">

                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>Planeamento e Exploração de Infra-Estruturas de Tecnologias <div class="hr1" style="margin-bottom:8px;"></div>de Informação</span></h4>
                            <div id="columnchart_values5"></div>			

                        </div>

                    </div>

                    <div class="hr1" style="margin-bottom:45px;"></div>
                    <div class="row">

                        <div class="col-md-6">

                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>Gestão de Projectos de Sistemas de Informação</span></h4>
                            <div id="columnchart_values6"></div>	


                        </div>
                        <div class="col-md-6">

                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>Planeamento e Auditoria de Sistemas de Informação</span></h4>
                            <div id="columnchart_values7"></div>			

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End content -->


        <?php include 'footer.php'; ?>
    </div>
</body>

</html>