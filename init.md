--Primera corrida--

1. npm install && npm run dev [Install React dependencies]
2. composer install [Install Laravel dependencies]
3. composer require laravel/passport [Install passport]
4. composer require maatwebsite/excel
5. crear usuario userCourt p@\$\$w0rd
6. crear base de datos courtDB
7. Modificar el .env
8. php artisan migrate
9. php artisan passport:install [do not force, only for the next step, but if a warning
   message shows up, just go on]
10. php artisan db:seed
11. php artisan storage:link
    --Antes de correr la app--
12. php artisan serve -> Run the app

# Instrucciones con Docker

Dockerice la app para tener otra alternativa porque en el desarrollo fue un problema correrla en entornos locales a tal grado que termine desplegándola en un vps. Así que si tienes problemas con PHP, composer o las extensiones que se requieren puedes usar este entorno controlado.

Estas instrucciones funcionan en Windows 10 y Ubuntu 20.04. Si tienes problemas con tu SO mandame un tweet o un DM a @camvazz.

**Nota**: Obviamente, Docker es requerido, docker-compose también. El último viene incluído en la instalación de Windows (seguro) y Mac (creo), si estas en Linux se instala por separado.

1. Levanta una instancia mysql local (tambien se puede usar un contenedor docker pero eso no se va a discutir aquí) y corre el siguiente script.

```sql
create user 'userCourt'@'%' identified by 'p@$$w0rd';
create database courtDB;
grant all privileges on courtDb.* to 'userCourt'@'%';
ALTER USER 'userCourt'@'%' IDENTIFIED WITH mysql_native_password BY 'p@$$w0rd';
grant super on *.* to 'userCourt'@'%';
```

2. Ve al .env.example, comenta la linea 10 y remueve el comentario de la 12.
   Esto cambiara el host de la BD al correspondiente.

3. Ve a tu terminal y en el proyecto corre

```bash
# Linux/macOS
sudo docker-compose up

# Win
docker-compose up
```

4. Abre una pagina y visita localhost:8000. Debería verse la pantalla de inicio de la aplicación laravel.

5. Verifica que la api tenga acceso a la base de datos visitando [http://localhost:8000/api/all/users]

## Observaciones.

Al correr `bash docker-compose up` se corren las migraciones, seeding y passport. Por lo que cada corrida la base de datos se escribe de nuevo con los datos iniciales. Lamentablemente, no pude conseguir que docker corriera esas operaciones al buildear la imagen, por lo que las pase al estado de ejecución de la misma ya en un container. Si tienes alguna especie de solución a este detalle por favor mandame un DM.
