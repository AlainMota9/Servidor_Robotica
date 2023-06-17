
<?php
$projeto1 = htmlspecialchars($_POST["projeto"]);
$codigo = htmlspecialchars($_POST["codigo"]);
if (empty($projeto1)) {
    print '<h1>Nenhum nome do projeto encontrado!!</h1>';
    print '<h1>Volte e insira um nome para o projeto!</h1>';
    if (empty($codigo)) {
    print '<h1>Nenhum codigo encontrado!!</h1>';
    print '<h1>Volte e programe um codigo!</h1>';
    }
    exit(1);
}
if (empty($codigo)) {
    print '<h1>Nenhum codigo encontrado!!</h1>';
    print '<h1>Volte e programe um codigo!</h1>';
    exit(1);
    }
    
$projeto = preg_replace('<\W+>', "_", $projeto1); 

Txt($projeto,$codigo);

function Txt($projeto,$codigo){
system ("TASKKILL /F /IM javaw.exe /T");

if(is_dir("Projeto/$projeto")) {
   unlink("Projeto/".$projeto."/".$projeto.".ino");
   rmdir("Projeto/$projeto");
   
}
mkdir("Projeto/$projeto", 0700);

$arquivo = fopen("Projeto/".$projeto."/".$projeto.".ino", "w");
fwrite($arquivo, $codigo);
fclose($arquivo);

system("start Projeto/".$projeto."/".$projeto.".ino");

print '<h1>Arquivo Enviado!</h1>';
}
