## Como implementar o projeto!

---

### Clonar o projeto:
```
$: git clone https://github.com/Shieldforce/bolos-da-dona-zeze.git
```

### Copiar e Configurar (.env) com as configurações do ambiente:
```
$: cp .env.example .env
```

### Rodar migrations e seeds (Só rode o :fresh se for início do projeto!):
```
$: php artisan migrate: fresh --seed
```

### Requisitos e Configurações para rodar o projeto (Servidor de aplicação ‘web’ deverá ser um linux:
- PHP 8.1 >=
- Composer >= 2
- Supervisor
- Mysql 8 >=
- Redis

### Configuração do Supervisor (Este exemplo usa ubuntu 22.04 server como exemplo)

- Crie um arquivo de configuração dentro de /etc/supervisor/conf.d com o nome bolos-da-dona-zeze.conf.
- Acerte o path das linhas [command= & stdout_logfile=] para o path do seu projeto em laravel.

```
[program:bolos-da-dona-zeze]
process_name=%(program_name)s
command=php /home/$(user)/$(project)/artisan horizon
autostart=true
autorestart=true
user=root
redirect_stderr=true
stdout_logfile=/home/$(user)/$(project)/horizon.log
stopwaitsecs=3600
```

- Salve o arquivo e rode os seguintes comandos
```
sudo supervisorctl reread
 
sudo supervisorctl update
 
sudo supervisorctl start bolos-da-dona-zeze
```
---