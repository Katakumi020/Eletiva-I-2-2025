<?php
    session_start();
    require_once 'conexao.php';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $email=$_POST['email'];
        $senha=$_POST['senha'];
        $conn=conectar();
        $stmt=$conn->prepare('SELECT * FROM usuarios WHERE email=?');
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $user=$stmt->get_result()->fetch_assoc();
    if($user && password_verify($senha,$user['senha'])){
        $_SESSION['user']=$user['nome'];
        $_SESSION['tipo']=$user['tipo'];
        header('Location:index.php'); exit;
    } else $erro="Login incorreto";
    }
?>
<form method='post'>
<label>Email</label><input type='email' name='email' required>
<label>Senha</label><input type='password' name='senha' required>
<button>Entrar</button>
</form>
<?php if(isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>