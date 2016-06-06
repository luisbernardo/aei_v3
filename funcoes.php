<?php

function ligar_base_dados() {
    $link = mysqli_connect("localhost", "root", "", "ptsi");
    mysqli_query($link,"SET NAMES 'utf8'");
    mysqli_set_charset($link, "uft8");
    return $link;
}

function get_num_universidades() {

    $ligacao = ligar_base_dados();
    $expressao1 = "SELECT COUNT(Distinct ID_ENTIDADE) AS contagem_universidades FROM entidade";
    global $dados;
    $resultado = mysqli_query($ligacao, $expressao1);

    if (mysqli_num_rows($resultado) > 0) {
        $dados = mysqli_fetch_array($resultado);
    }

    mysqli_free_result($resultado);
    mysqli_close($ligacao);

    return $dados["contagem_universidades"];
}

function get_num_cursos() {

    $ligacao = ligar_base_dados();
    $expressao = "SELECT COUNT(Distinct ID_CURSO) AS contagem_cursos FROM curso";
    global $dados;
    $resultado = mysqli_query($ligacao, $expressao);

    if (mysqli_num_rows($resultado) > 0) {

        $dados = mysqli_fetch_array($resultado);
    }

    mysqli_free_result($resultado);
    mysqli_close($ligacao);

    return $dados["contagem_cursos"];
}

function get_num_unidadecurricular() {

    $ligacao = ligar_base_dados();
    $expressao = "SELECT COUNT(Distinct ID_UNIDADE_CURRICULAR) AS contagem_unidadescurriculares FROM unidade_curricular";
    global $dados;
    $resultado = mysqli_query($ligacao, $expressao);

    if (mysqli_num_rows($resultado) > 0) {

        $dados = mysqli_fetch_array($resultado);
    }

    mysqli_free_result($resultado);
    mysqli_close($ligacao);

    return $dados["contagem_unidadescurriculares"];
}

function get_num_atos() {

    $ligacao = ligar_base_dados();
    $expressao = "SELECT COUNT(Distinct ID_ATO_PROFISSAO) AS contagem_atos FROM ato_profissao";
    global $dados;
    $resultado = mysqli_query($ligacao, $expressao);

    if (mysqli_num_rows($resultado) > 0) {

        $dados = mysqli_fetch_array($resultado);
    }

    mysqli_free_result($resultado);
    mysqli_close($ligacao);

    return $dados["contagem_atos"];
}

function get_grupo_ato() {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from ato_profissao WHERE NIVEL = 1";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_info_ato($idAto) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from ato_profissao Where ID_ATO_PROFISSAO = '" . $idAto . "' ";
    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_atos_filho($numPai) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from ato_profissao Where NIVEL = 3 AND NUMERACAO_ATO LIKE '" . $numPai . "%' ";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_info_ato_filho($idAto) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from ato_profissao Where FK_ID_PAI = '" . $idAto . "'";
    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_info_ato_filho2($idAto, $idAtoF) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * FROM ato_profissao WHERE ID_ATO_PROFISSAO = '" . $idAto . "' OR FK_ID_PAI = '" . $idAtoF . "'";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_maior_cobertura($idAto) {
    $ligacao = ligar_base_dados();
    $expressao = "Select * from cobertura_curso WHERE ID_ATO_PROFISSAO = '" . $idAto . "' ORDER BY AVALIACAO DESC limit 5";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_curso($idCurso) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from curso Where ID_CURSO = '" . $idCurso . "'";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_universidade($iduniv) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from entidade Where ID_ENTIDADE = '" . $iduniv . "'";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_info_uc_1ano($iduc) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from unidade_curricular Where ID_CURSO = '" . $iduc . "' AND ANO = 1";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_info_uc_2ano($iduc) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from unidade_curricular Where ID_CURSO = '" . $iduc . "' AND ANO = 2";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_info_uc_3ano($iduc) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from unidade_curricular Where ID_CURSO = '" . $iduc . "' AND ANO = 3";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_info_uc_4ano($iduc) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from unidade_curricular Where ID_CURSO = '" . $iduc . "' AND ANO = 4";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_info_uc_5ano($iduc) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from unidade_curricular Where ID_CURSO = '" . $iduc . "' AND ANO = 5";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_curso_pesquisa($city, $grau, $regime) {
    $ligacao = ligar_base_dados();
    $query = "SELECT * FROM curso WHERE ";
    if (sizeof($city) > 0) {
        $contadorCidade = 0;
        foreach ($city as $cidade) {
            if ($contadorCidade > 0) {
                $query .= " OR ";
            }
            $query .= "LOCAL LIKE '%"  . $cidade . "'";
            $contadorCidade++;
        }
        if(sizeof($grau) > 0) {
            $query .= " AND ";
        }
    }
    if (sizeof($grau) > 0) {
        $contadorGrau = 0;
        foreach ($grau as $gr) {
            if ($contadorGrau > 0) {
                $query .= " OR ";
            }
            $query .= "GRAU = '" . $gr . "'";
            $contadorGrau++;
        }
        if(sizeof($regime) > 0) {
            $query .= " AND ";
        }
    }
    if (sizeof($regime) > 0) {
        $contadorRegime = 0;
        foreach ($regime as $reg) {
            if ($contadorRegime > 0) {
                $query .= " OR ";
            }
            $query .= "REGIME = '" . $reg . "'";
            $contadorRegime++;
        }
    }
    $resultado = mysqli_query($ligacao, $query);
    mysqli_close($ligacao);
    return $resultado;
}

function get_top10() {
    $ligacao = ligar_base_dados();
    $expressao = "Select * from cobertura_curso ORDER BY AVALIACAO DESC limit 10";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_top5_grupo1() {
    $ligacao = ligar_base_dados();
    $expressao = "Select * from cobertura_curso WHERE ID_ATO_PROFISSAO = 1 ORDER BY AVALIACAO DESC limit 5";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_top5_grupo2() {
    $ligacao = ligar_base_dados();
    $expressao = "Select * from cobertura_curso WHERE ID_ATO_PROFISSAO = 23 ORDER BY AVALIACAO DESC limit 5";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_top5_grupo3() {
    $ligacao = ligar_base_dados();
    $expressao = "Select * from cobertura_curso WHERE ID_ATO_PROFISSAO = 42 ORDER BY AVALIACAO DESC limit 5";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_top5_grupo4() {
    $ligacao = ligar_base_dados();
    $expressao = "Select * from cobertura_curso WHERE ID_ATO_PROFISSAO = 54 ORDER BY AVALIACAO DESC limit 5";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_top5_grupo5() {
    $ligacao = ligar_base_dados();
    $expressao = "Select * from cobertura_curso WHERE ID_ATO_PROFISSAO = 72 ORDER BY AVALIACAO DESC limit 5";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_top5_grupo6() {
    $ligacao = ligar_base_dados();
    $expressao = "Select * from cobertura_curso WHERE ID_ATO_PROFISSAO = 92 ORDER BY AVALIACAO DESC limit 5";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function id_to_name($idgrau) {
    if($idgrau == 1){
        return 'Licenciatura';
    }
    else if ($idgrau == 2){
        return 'Mestrado Integrado';
    }
    else if($idgrau == 3){
        return 'Mestrado';
    }
}

function get_cobertura_curso($idcurso) {
    $ligacao = ligar_base_dados();
    $expressao = "Select * from cobertura_curso WHERE ID_CURSO = '" . $idcurso . "' AND ID_ATO_PROFISSAO = 0";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}

function get_cobertura_porato($idcurso){
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * FROM cobertura_curso WHERE ID_CURSO = '" . $idcurso . "' AND ID_ATO_PROFISSAO IN (SELECT ID_ATO_PROFISSAO FROM ato_profissao WHERE NIVEL = 1) ORDER BY ID_ATO_PROFISSAO ASC";

    $resultado = mysqli_query($ligacao, $expressao);
    mysqli_close($ligacao);
    return $resultado;
}



?>
