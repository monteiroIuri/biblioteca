## **Biblioteca**
```
Instale os requisitos abaixo e siga as Instruções para executar o Projeto.
```
## Dependências

- **[WampServer](https://www.wampserver.com/en/)**;
- **[Git](https://git-scm.com/download/)**;
- **[Composer](https://getcomposer.org/download/)**;

## Instruções

- Dentro da pasta do WampServer, \wamp64\www crie uma nova pasta com nome `projetos`;

- Abra um terminal de sua preferência, acesse a pasta `projetos`;

- Utilize o comando `git clone https://github.com/monteiroIuri/biblioteca` para clonar o repositório dentro da pasta projetos;

- Acesse a pasta `biblioteca` , localize o arquivo `biblioteca.sql` esse arquivo contem a base de dados utilizada no Projeto. Você deve usar essa base de dados no MySql do WampServer;

- O WampServer usa uma interface para o MySql. Abra a interface PhpMyadmin em `http://localhost/phpmyadmin/`. Por padrão o Usuário é Root e a senha é em branco, faça o login. 

- Você deve criar uma nova base de dados com o nome `biblioteca`. Feito isso clique em Importar e escolha o arquivo `biblioteca.sql` então clique em Executar.

- Seguindo esses passos, o Projeto deve rodar em `http://localhost/projetos/biblioteca/`.

- No caminho \wamp64\www\projetos\biblioteca\core está o arquvivo `ConfigView.php` que possui as configurações do Sistema, endereço do Projeto e Credenciais de acesso ao Banco de dados. Confirme se está conforme o seu ambiente.
