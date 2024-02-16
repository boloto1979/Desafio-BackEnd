# Documentação do Projeto de Redirecionamento com Laravel e Filament

Este projeto implementa um sistema de redirecionamento usando Laravel 10, Filament 3 e Docker. O sistema permite registrar URLs de redirecionamento e acompanhar estatísticas de acesso.

## Funcionalidades

- **Proteção de IDs**: Os IDs são ocultados usando hashes para melhorar a segurança e privacidade.
- **CRUD de Redirects**: Interface administrativa para gerenciar redirects.
- **Redirecionamento**: Redireciona usuários para URLs específicas baseadas em códigos únicos.
- **Estatísticas de Acesso**: Visualização de estatísticas sobre os acessos aos redirects.
- **Logging de Acessos**: Registra detalhes de cada acesso ao redirecionamento.

## Requisitos

- Docker e Docker Compose
- Composer (opcional para instalação de dependências fora do container)

## Configuração com Docker

1. **Clone o repositório**

2. **Navegue até o diretório do projeto**:

3. **Construa os containers**:

```
docker-compose build
```

4. **Inicie os serviços**:

```
docker-compose up -d
```

ps: Crie um usuario para acessar o painel do Filament:

```
php artisan make:filament-user
```

5. **Instale as dependências do Composer** (opcional, caso não esteja utilizando volumes para o código-fonte):

```
docker-compose exec app composer install
```

6. **Gere a chave do aplicativo Laravel**:

```
docker-compose exec app php artisan migrate
```

## Usando o CRUD de Redirects no Filament

Para registrar um novo redirecionamento, acesse o painel administrativo do Filament em `<seu-dominio>/admin`, navegue até "Redirects" e clique em "Create Redirect".

## Testes

Para executar os testes automatizados:
```
docker-compose exec app php artisan test
```
ou
```
docker-compose exec app ./vendor/bin/phpunit
```
