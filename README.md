# GEBI - Gestão de Espaço Bíblico Infantil

## Descrição

O GEBI é um sistema de gestão e auditoria voltado para o espaço infantil da Congregação Cristã no Brasil (CCB). O sistema permite o cadastro e gerenciamento de crianças, responsáveis, colaboradores e aulas, garantindo que todas as ações sejam devidamente auditadas, uma vez que envolve menores de idade.
O core do projeto pode ser utilizado não só no EBI da CCB, mas em qualquer estabelecimento que envolva entrada e saída de menores, como parques, brinquedotecas, salões infantis e recreações.

## Funcionalidades

- **Cadastro de Crianças e Responsáveis**: Permite o registro de crianças e a vinculação com seus responsáveis.
- **Gerenciamento de Colaboradores**: Supervisores e professores podem ser cadastrados e gerenciados.
- **Registro de Atividades**: Registro de "classes" para acompanhamento das atividades bíblicas ministradas e registro do horário de entrada e saída das crianças.
- **Auditoria de Eventos**: Todas as ações são registradas, incluindo ID dos participantes e timestamps, assegurando a transparência e segurança do sistema.
- **Relatórios**: Todas as auditorias possuem relatórios automáticos em PDF, além de índices de dados cadastrados, tais como quantidade total de crianças, responsáveis, ou até mesmo quantidade de participantes em uma determinada classe.

## Tecnologias Utilizadas

- **Backend**: Laravel
- **Arquitetura**: Service-based pattern, Repository pattern
- **Princípios**: SOLID, DRY, Clean Code
- **Banco de Dados**: SQL Server
- **Containerização**: Docker e Docker Compose

## Estrutura do Projeto

- **Container PHP**: Ambiente para executar o Laravel.
- **Container NGINX**: Servidor para expor a aplicação na porta 80.
- **Container SQL Server**: Banco de dados para armazenamento das informações.

## Pré-requisitos

- Docker e Docker Compose instalados na sua máquina.

## Como Rodar o Projeto Localmente

1. Clone o repositório:
   ```bash
   git clone https://github.com/seuUsuario/gebi.git
   cd gebi
   ```
2. Configure o ambiente Laravel dentro do container:

- Crie um arquivo .env baseado no .env.example e ajuste as configurações de banco de dados.

Suba os containers com Docker Compose:

```bash
docker-compose up -d
```

Aguarde o build e start dos containeres, depois rode em sequência:

```bash
docker-compose exec laravel bash
composer install
php artisan migrate --seed
php artisan optmize:clear
```


## Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou pull requests. Siga as diretrizes de contribuição para garantir um fluxo de trabalho suave.

## Licença
Este projeto está licenciado sob a MIT LicenseOpens in a new window; external..

## Contato
Para mais informações, entre em contato:

E-mail: albertosabino.as@gmail.com 
GitHub: https://github.com/Alberto-Sabino
