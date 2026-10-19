# Monitoramento de Acesso ao Campus — IFFar Uruguaiana

Sistema web para registrar a entrada e a saída de alunos no campus a partir do QR Code da carteira de estudante. O sistema compara o horário da leitura com o cronograma da turma e classifica o registro (presente, entrada em atraso, entrada/saída autorizada), dando à assistência estudantil um histórico de acesso de cada aluno.

Foi o meu primeiro sistema completo: Trabalho de Conclusão de Curso do Técnico em Informática Integrado (turma INFO31) no IFFar Campus Uruguaiana, 2023.

## Funcionalidades

- **Leitura de QR Code** pela câmera do navegador e registro automático no histórico, com status calculado a partir do cronograma da turma.
- **Dois perfis de acesso**:
  - *Administrador*: cadastro de alunos (com foto), turmas, cronogramas, status e usuários; histórico completo; relatórios.
  - *Operador*: leitura de QR Code, autorização manual de entrada/saída com motivo, consulta ao histórico e ao cronograma.
- **Relatório em PDF** do histórico de acessos, gerado com Dompdf.
- **Recuperação de senha por e-mail** (PHPMailer via SMTP).
- Senhas armazenadas com `password_hash` (bcrypt).

## Stack

PHP · MySQL/MariaDB · Bootstrap 5 · jQuery · html5-qrcode · Dompdf · PHPMailer

## Estrutura

| Pasta | Conteúdo |
| --- | --- |
| `Login/` | Login, sessão e recuperação de senha |
| `Aluno/`, `Turma/`, `Cronograma/`, `Status/`, `Usuario/` | Cadastros (CRUD) do administrador |
| `QRcode/` | Leitura do QR Code e registro do acesso |
| `Admin/`, `Operador/` | Histórico e autorização manual por perfil |
| `Relatorio/` | Geração do relatório em PDF |
| `BD/tcc.sql` | Esquema do banco com dados de exemplo fictícios |

## Como rodar

Pré-requisitos: PHP 7.4+ com `mysqli`, MySQL/MariaDB e [Composer](https://getcomposer.org/). O jeito mais simples no Windows é o XAMPP ou o WampServer.

1. Clone o repositório dentro da pasta servida pelo Apache (ex.: `htdocs/`).
2. Instale as dependências:
   ```bash
   composer install
   ```
3. Crie o banco importando `BD/tcc.sql` (cria o banco de dados `tcc` com dados de exemplo).
4. Copie `config.local.example.php` para `config.local.php` e preencha o acesso ao banco e, se quiser testar a recuperação de senha, o SMTP. Esse arquivo não vai para o Git.
5. Acesse `http://localhost/AMS_INFO31/`.

Usuários de exemplo (todos os dados do dump são fictícios):

| Perfil | CPF | Senha |
| --- | --- | --- |
| Administrador | `000.000.000-01` | `admin123` |
| Operador | `000.000.000-02` | `operador123` |

## Contexto

TCC do curso Técnico em Informática Integrado ao Ensino Médio — IFFar Campus Uruguaiana, 2023.
