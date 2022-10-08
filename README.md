### Requisitos e Configurações para rodar o projeto (Servidor de aplicação ‘web’ deverá ser um linux:
- PHP 8.1 >=
- Composer >= 2
- Supervisor
- Mysql 8 >=
- Redis

## Como implementar o projeto!

### Link da documentação no postman (https://documenter.getpostman.com/view/3645910/2s83zgu57V)

### Acesso as filas Horizon (http://localhost:8000/horizon)

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

### Liberar acesso de leitura para algumas pastas:
```
$: sudo chmod -R 755 public/ storage/ bootstrap/
```

### Liberar acesso de gravação para storage/logs:
```
$: sudo chmod -R 777  storage/logs/
```

### Geração da secret do JWT:
```
$: php artisan jwt:secret
```

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

### Abra o arquivo do crontab e configure desse jeito (Exemplo usado no Ubuntu 22.04 Server):
```
$: crontab -e
$: * * * * * cd /var/www/html/$(path_project) && php artisan schedule:run >> /dev/null 2>&1
```

### Rodando Servidor:
```
$: php artisan serve
```

### Usuário de teste:
```
email: user@bdz.com
password: 1234
```