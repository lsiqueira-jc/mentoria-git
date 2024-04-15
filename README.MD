# Mentoria - API Laravel

## Diretórios

- src = Aplicação wordpress
- db = Arquivos do banco de dados (Local!!! Não subir para o git)
- DockerConfig = Arquivos de configuração do Docker


## Comandos GIT  

```bash
git add .

```bash
git status
```
```bash
git commit -m ""
``````

```bash
git checkout nomeDaBranch
```

```bash
git checkout -B nomeDaBranch
```

```bash
git push origin Suabranch
```


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
