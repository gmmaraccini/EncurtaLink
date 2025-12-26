# EncurtaLink
Portifolio 2026 - Projeto 3

3. Encurtador de URLs (Tipo Bit.ly)
   O que faz: O usuário insere uma URL longa, o sistema gera um código curto e único, e salva ambos no banco. Quando alguém acessa a URL curta, o sistema redireciona para a original.
   Habilidades que demonstra: Lógica de programação, geração de strings aleatórias, manipulação de redirecionamentos (header()) e banco de dados.


Fico feliz que tenha dado certo, Gabriel! Ter um repositório bem documentado é essencial para mostrar profissionalismo no portfólio.

Aqui está um modelo de **README.md** pronto para você copiar e colar no seu GitHub. Ele explica o que é o projeto, como instalar e as tecnologias usadas.

### Arquivo: `README.md`

```markdown
# ✂️ EncurtaLink

Um encurtador de URLs simples, rápido e eficiente desenvolvido em PHP puro. O objetivo deste projeto é demonstrar a lógica de criação de códigos únicos, manipulação de banco de dados e redirecionamentos HTTP.

## 🚀 Funcionalidades

- **Encurtamento de URL**: Transforma URLs longas em códigos curtos (ex: `seusite.com/AbCdE`).
- **Redirecionamento Inteligente**: Redireciona o usuário para a URL original de forma transparente.
- **Validação de URL**: Garante que apenas links válidos sejam processados.
- **URLs Amigáveis**: Suporte a `.htaccess` para links limpos, com *fallback* para links padrão (`?c=codigo`) caso o servidor não suporte rewrite.
- **Prevenção de Colisões**: Algoritmo que garante a unicidade dos códigos gerados.

## 🛠️ Tecnologias Utilizadas

- **PHP 7.4+** (Sem frameworks, código nativo)
- **MySQL** (Banco de dados)
- **PDO** (Para conexões seguras e *Prepared Statements*)
- **Apache** (Com `mod_rewrite` para URLs amigáveis)
- **HTML/CSS** (Interface simples e responsiva)

## 📦 Como Instalar

### 1. Requisitos
* Servidor Web (Apache/Nginx)
* PHP instalado
* Banco de dados MySQL

### 2. Configuração do Banco de Dados
Crie um banco de dados (ex: `encurtador`) e execute o seguinte SQL para criar a tabela:

```sql
CREATE TABLE urls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    long_url TEXT NOT NULL,
    short_code VARCHAR(10) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

```

### 3. Configuração do Projeto

1. Clone este repositório:
```bash
git clone [https://github.com/gmmaraccini/EncurtaLink.git](https://github.com/gmmaraccini/EncurtaLink.git)

```


2. Configure o arquivo `config.php` com suas credenciais:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'nome_do_banco');
define('DB_USER', 'usuario');
define('DB_PASS', 'senha');
define('BASE_URL', 'http://localhost/EncurtaLink/'); // Com barra no final

```



### 4. URLs Amigáveis (Opcional)

Se estiver usando Apache, certifique-se de que o arquivo `.htaccess` esteja na raiz do projeto e que o módulo `mod_rewrite` esteja ativado no servidor.

## 🤝 Como Contribuir

Sinta-se à vontade para enviar *Pull Requests* ou abrir *Issues* para melhorias como:

* [ ] Contador de cliques
* [ ] API JSON para encurtamento externo
* [ ] Interface de administração

## 📄 Licença

Este projeto está sob a licença MIT. Sinta-se livre para usar e modificar.

---

Feito com 💙 por [Gabriel Maraccini](https://github.com/gmmaraccini)

```

Como este vídeo fala sobre hospedagem de projetos, pode ser útil caso você queira colocar seu encurtador no ar futuramente:
[Encurtando links com GitHub](https://www.youtube.com/watch?v=czNfa0fShtE)
Esse vídeo mostra como usar o próprio GitHub para gerenciar links, o que complementa bem o conhecimento que você aplicou criando seu próprio sistema.


https://youtu.be/zyw5cSKzPaE
```