<?php

require_once './includes/conexao.php';


// extrai os dados do post
//extract($_POST);

$sql = "SELECT * FROM busca WHERE titulo LIKE '%" . $_POST['titulo'] . "%' AND ativo = true";

$resultado = mysqli_query($con, $sql);

$html = '<datalist id="busca_dash">';
if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_array($resultado)) {
        $html .= '<option value="' . $row['titulo'] . '">';
    }
}
$html .= '</datalist>';

$arr_response = array(
    "titulo" => $_POST['titulo'],
    "query" => $sql,
    "html" => $html
);

// imprime os dados do post
echo json_encode($arr_response);
