───────────────────────────────୨ৎ───────────────────────────────
# *TP 3 - Laravel 𖹭.ᐟ* 

# ୨ৎ Grupo "corazon" ᰔ
Integrantes:                           
- Alias Paula FAI-[5103] ୨ৎ
- Moreno Gisella FAI-[4201] ୨ৎ

<br/>

# ୨ৎ ¿De qué trata el proyecto? ᰔ

♡ El proyecto realizado es un blog, donde los usuarios registrados pueden realizar publicaciones y compartir sus opiniones. Las funcionalidades que ofrece el sitio son las siguientes:

- Creación de usuarios e inicio de sesión.
- Apartado de "mi perfil" donde se pueden ver todas tus publicaciones.
- Modificación de datos personales (avatar de perfil, nombre, email, contraseña)
- Opción de eliminar cuenta propia.
- Posibilidad de crear publicaciones, comentar y votar (positivo ↑, negativo ↓)
- Categorías de publicaciones.
- Filtros de ordenamiento.
- Barra de búsqueda, donde podés buscar publicaciones o usuarios.

<br/>

# ୨ৎ Instrucciones de instalación ᰔ
1. Clonar repositorio e ingresar a la carpeta
   ```markdown
    git clone https://github.com/pirotonta/myblog
    ```
   ```markdown
    cd myblog
    ```
    
2. Instalar las dependencias necesarias:
   ```markdown
    composer install
   ```
   ```markdown
    npm install
   ```

3. Configurar archivo .env
    ```markdown
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE= myblog
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4. Instalar y configurar Laravel Breeze
   ```markdown
    composer require laravel/breeze --dev
   ```
   ```markdown
    php artisan breeze:install
   ```

5. Migrar y poblar base de datos:
   ```markdown
    php artisan migrate
   ```
   ```markdown
    php artisan db:seed
   ```
   
6. Iniciar "Apache" y "MySQL" desde *xampp*
   
7. Correr el servidor
   ```markdown
    composer run dev
   ```
   
8. Ingresar al enlace similar que aparece en la terminal
   ```
    INFO  Server running on [http://xxx.x.x.x:xxxx].
   ```

9. Enjoy ૮ ˶ᵔ ᵕ ᵔ˶ ა .ᐟ.ᐟ


───────────────────────────────୨ৎ───────────────────────────────
