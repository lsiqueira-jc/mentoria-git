# Mentoria - API Laravel

## Diretórios

- src = Aplicação wordpress
- db = Arquivos do banco de dados (Local!!! Não subir para o git)
- DockerConfig = Arquivos de configuração do Docker

## Como rodar

### Levanta o ambiente (na raiz)

```bash
docker-compose up --build -d
```

### Acessando a aplicação

```bash
localhost
```

### Acessando o container da aplicação

```bash
docker exec -it agenda bash
```

### Acessando o container do Banco de Dados

```bash
docker exec -it db_agenda bash
```

### Se tiver problema no Windows

```
 --config core.autocrlf=input
```
