# 🎵 Melodía Conectada

**Melodía Conectada** es una plataforma web colaborativa que permite a los usuarios compartir, 
descubrir y disfrutar de música de manera interactiva. 
Desarrollada con **Laravel** y **Vue.js**, la aplicación ofrece una experiencia fluida y 
moderna para los amantes de la música.

## 🌟 Características Principales

- 🎶 Exploración de canciones y playlists compartidas por la comunidad.
- 👥 Interacción social mediante comentarios y valoraciones.
- 🔍 Búsqueda avanzada por género, artista o título.
- 📊 Estadísticas de reproducción y tendencias musicales.
- 🛠️ Panel de administración para gestión de contenido y usuarios.

## 🧰 Tecnologías Utilizadas

- **Backend:** Laravel (PHP)
- **Frontend:** Vue.js
- **Base de Datos:** MySQL
- **Contenedores:** Docker
- **Servidor Web:** Nginx
- **Control de Versiones:** Git

## 📁 Estructura del Proyecto

```
melodia-conectada/
├── app2/                  # Código fuente de la aplicación
├── initdb/                # Scripts de inicialización de la base de datos
├── nginx/                 # Configuración del servidor Nginx
├── .github/workflows/     # Workflows de GitHub Actions
├── .dockerignore          # Archivos ignorados por Docker
├── .gitignore             # Archivos ignorados por Git
├── docker-compose.yml     # Configuración de Docker Compose
└── README.md              # Documentación del proyecto
```

## 🚀 Configuración del Entorno de Desarrollo

1. **Clonar el repositorio:**

   ```bash
   git clone https://github.com/TheCheetahGirls-3/melodia-conectada.git
   cd melodia-conectada
   ```

2. **Configurar variables de entorno:**

   Copia el archivo `.env.example` a `.env` y ajusta las variables según tu entorno.

   ```bash
   cp .env.example .env
   ```

3. **Construir y levantar los contenedores con Docker:**

   ```bash
   docker-compose up -d --build
   ```

4. **Instalar dependencias y migrar la base de datos:**

   Accede al contenedor de la aplicación y ejecuta los siguientes comandos:

   ```bash
   docker exec -it melodia-app bash
   composer install
   php artisan migrate --seed
   ```

5. **Compilar los assets del frontend:**

   ```bash
   npm install
   npm run dev
   ```

6. **Acceder a la aplicación:**

   La aplicación estará disponible en `http://localhost`.

## 🧪 Pruebas

Para ejecutar las pruebas automatizadas:

```bash
php artisan test
```

## 🤝 Contribuciones

¡Las contribuciones son bienvenidas! Si deseas colaborar:

1. Realiza un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -m 'Agregar nueva funcionalidad'`).
4. Sube tus cambios (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request detallando tus modificaciones.

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más información.

## 📬 Contacto

Para consultas o sugerencias, por favor abre un [Issue](https://github.com/TheCheetahGirls-3/melodia-conectada/issues) en el repositorio.

---

¡Gracias por visitar Melodía Conectada! 🎶
