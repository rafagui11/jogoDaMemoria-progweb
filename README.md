
### 1. Instalação do Ambiente
1. Baixe e instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html).
2. Abra o **XAMPP Control Panel**.
3. Inicie os módulos **Apache** e **MySQL** (clique em "Start").
   - *Nota:* Verifique se o MySQL ficou verde. Se a porta for `3307` em vez de `3306`, verifique o arquivo `db-connection.php` no projeto.

### 2. Configuração da Pasta
1. Localize a pasta de instalação do XAMPP (geralmente `C:\xampp`).
2. Entre na pasta `htdocs`.
3. Cole a pasta do projeto aqui dentro.
   - Caminho final deve ser algo como: `C:\xampp\htdocs\TRABALHO-PROGWEB`.

### 3. Configuração do Banco de Dados (Automática)
Não é necessário criar tabelas manualmente. Criamos um script para isso.

1. Abra seu navegador.
2. Acesse: `http://localhost/TRABALHO-PROGWEB/setup.php` (ajuste o nome da pasta se for diferente).
3. Se vir a mensagem **"Setup concluído!"**, o banco `jogo_memoria` e as tabelas `usuarios` e `partidas` foram criados.
4. **Apague** ou renomeie o arquivo `setup.php` após o uso por segurança.

### 4. Acessando o Jogo
1. No navegador, acesse: `http://localhost/TRABALHO-PROGWEB/index.php`
2. Crie uma conta e faça login.


### ✅ O que já está pronto (Back-end & BD)
- [x] Conexão com Banco de Dados (`db-connection.php`).
- [x] Script de criação de tabelas (`setup.php`).
- [x] Sistema de Login e Logout (`index.php`, `logout.php`).
- [x] Sistema de Cadastro (`register.php`).
- [x] Proteção de rotas (apenas logados acessam o Hub).
- [x] Página de Perfil (Edição de dados e senha).
- [x] Páginas de Histórico e Ranking (lógica de leitura do BD pronta).
- [x] Endpoint para salvar partida (`save_game.php`).

### 🚧 O que FALTA fazer (Front-end & JS)
O foco agora deve ser exclusivamente na pasta `js/` e na lógica do jogo:

1.  **Conexão Hub -> Jogo:**
    - O `hub_partida.php` já envia via URL (GET) o modo e tamanho (ex: `game.php?tabuleiro=4x4`).
    - **Falta:** Editar o `js/jogo.js` para ler esses parâmetros da URL e gerar o grid correto (2x2, 4x4, 6x6, 8x8).

2.  **Salvar Partida:**
    - **Falta:** No `js/jogo.js`, quando o usuário vencer, chamar a função `fetch` para enviar os dados para `save_game.php`.

3.  **CSS Final:**
    - Revisar responsividade se necessário.

---

## ⚠️ Avisos Importantes

- **NÃO abra o arquivo HTML/PHP clicando duas vezes.** O PHP precisa do servidor Apache. Sempre use `http://localhost/...`.
- **Porta do MySQL:** Se o XAMPP usar a porta `3307` (comum em conflitos), certifique-se de que o arquivo `db-connection.php` reflete isso: `$port = '3307';`.