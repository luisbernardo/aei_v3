<?php

require_once 'mysql.connect.php';

function ligar_base_dados() {
    $ligacao = mysql_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD) or die('Erro ao ligar ao servidor...');
    mysql_select_db(MYSQL_DATABASE, $ligacao) or die('Erro ao selecionar a base de dados...');
    mysql_query("SET NAMES 'utf8'");
    return $ligacao;
}

function get_num_universidades() {

    $ligacao = ligar_base_dados();
    $expressao1 = "SELECT COUNT(Distinct ID_ENTIDADE) AS contagem_universidades FROM entidade";
    global $dados;
    $resultado = mysql_query($expressao1, $ligacao);

    if (mysql_num_rows($resultado) > 0) {

        $dados = mysql_fetch_array($resultado);
    }

    mysql_free_result($resultado);
    mysql_close($ligacao);

    return $dados["contagem_universidades"];
}

function get_num_cursos() {

    $ligacao = ligar_base_dados();
    $expressao = "SELECT COUNT(Distinct ID_CURSO) AS contagem_cursos FROM curso";
    global $dados;
    $resultado = mysql_query($expressao, $ligacao);

    if (mysql_num_rows($resultado) > 0) {

        $dados = mysql_fetch_array($resultado);
    }

    mysql_free_result($resultado);
    mysql_close($ligacao);

    return $dados["contagem_cursos"];
}

function get_num_unidadecurricular() {

    $ligacao = ligar_base_dados();
    $expressao = "SELECT COUNT(Distinct ID_UNIDADE_CURRICULAR) AS contagem_unidadescurriculares FROM unidade_curricular";
    global $dados;
    $resultado = mysql_query($expressao, $ligacao);

    if (mysql_num_rows($resultado) > 0) {

        $dados = mysql_fetch_array($resultado);
    }

    mysql_free_result($resultado);
    mysql_close($ligacao);

    return $dados["contagem_unidadescurriculares"];
}

function get_num_atos() {

    $ligacao = ligar_base_dados();
    $expressao = "SELECT COUNT(Distinct ID_ATO_PROFISSAO) AS contagem_atos FROM ato_profissao";
    global $dados;
    $resultado = mysql_query($expressao, $ligacao);

    if (mysql_num_rows($resultado) > 0) {

        $dados = mysql_fetch_array($resultado);
    }

    mysql_free_result($resultado);
    mysql_close($ligacao);

    return $dados["contagem_atos"];
}

function get_grupo_ato() {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from ato_profissao WHERE NIVEL = 1";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_info_ato($idAto) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from ato_profissao Where ID_ATO_PROFISSAO = '" . $idAto . "' ";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_atos_filho($numPai) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from ato_profissao Where NIVEL = 3 AND NUMERACAO_ATO LIKE '" . $numPai . "%' ";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_info_ato_filho($idAto) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from ato_profissao Where FK_ID_PAI = '" . $idAto . "'";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_info_ato_filho2($idAto, $idAtoF) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * FROM ato_profissao WHERE ID_ATO_PROFISSAO = '" . $idAto . "' OR FK_ID_PAI = '" . $idAtoF . "'";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_maior_cobertura($idAto) {
    $ligacao = ligar_base_dados();
    $expressao = "Select * from cobertura_curso WHERE ID_ATO_PROFISSAO = '" . $idAto . "' ORDER BY AVALIACAO DESC limit 5";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_curso($idCurso) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from curso Where ID_CURSO = '" . $idCurso . "'";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_universidade($iduniv) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from entidade Where ID_ENTIDADE = '" . $iduniv . "'";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_info_uc_1ano($iduc) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from unidade_curricular Where ID_CURSO = '" . $iduc . "' AND ANO = 1";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_info_uc_2ano($iduc) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from unidade_curricular Where ID_CURSO = '" . $iduc . "' AND ANO = 2";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_info_uc_3ano($iduc) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from unidade_curricular Where ID_CURSO = '" . $iduc . "' AND ANO = 3";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_info_uc_4ano($iduc) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from unidade_curricular Where ID_CURSO = '" . $iduc . "' AND ANO = 4";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

function get_info_uc_5ano($iduc) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * from unidade_curricular Where ID_CURSO = '" . $iduc . "' AND ANO = 5";

    $resultado = mysql_query($expressao, $ligacao);
    mysql_close($ligacao);
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
    }
    if (sizeof($grau) > 0) {
        $query .= " AND ";
        $contadorGrau = 0;
        foreach ($grau as $gr) {
            if ($contadorGrau > 0) {
                $query .= " OR ";
            }
            $query .= "GRAU = '" . $gr . "'";
            $contadorGrau++;
        }
    }
    if (sizeof($regime) > 0) {
        $query .= " AND ";
        $contadorRegime = 0;
        foreach ($regime as $reg) {
            if ($contadorRegime > 0) {
                $query .= " OR ";
            }
            $query .= "REGIME = '" . $reg . "'";
            $contadorRegime++;
        }
    }
    $resultado = mysql_query($query, $ligacao);
    mysql_close($ligacao);
    return $resultado;
}

?>
