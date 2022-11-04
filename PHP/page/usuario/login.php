<?php
    include('../../conn.php');

    $cell = $_POST['tcell'];
    $senha = $_POST['tsenha'];
    $sql = mysqli_query($conn, "SELECT u_id, u_cell, u_senha, u_adm FROM usuario WHERE u_cell LIKE '$cell' AND u_senha LIKE '$senha'");
    $linha = mysqli_num_rows($sql);

    if($linha == 1) {
        session_start();
        
        $registro = mysqli_fetch_assoc($sql);
        $_SESSION['u_id'] = $registro["u_id"];

        if($registro['u_adm'] == 'S') {
            header('location:../coleta/admin.php');
        } else {
            header('location:../coleta/coleta.php');
        }
    } else {
        echo "Usuário não encontrado.";
    }
?>