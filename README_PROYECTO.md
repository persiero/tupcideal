# 🖥️ Recomendador PC

Sistema inteligente de recomendación de equipos informáticos basado en perfil de usuario.

## ✨ Características

- **Landing page profesional**: Hero, características, testimonios, FAQ
- **Wizard interactivo**: 3 pasos simples para obtener recomendaciones personalizadas
- **Panel administrativo**: Gestión completa con Filament PHP
- **Integración WhatsApp**: Cotización directa con código de seguimiento
- **Historial de simulaciones**: Tracking de leads y conversiones
- **Responsive**: Funciona perfectamente en móviles y desktop
- **FAQ interactivo**: Preguntas frecuentes con animaciones
- **Testimonios**: Casos de éxito reales

## 🚀 Tecnologías

- **Laravel 11** - Framework PHP
- **Livewire 3** - Componentes reactivos
- **Filament 3** - Panel administrativo
- **Tailwind CSS** - Estilos modernos
- **MySQL** - Base de datos

## 📦 Instalación

```bash
# Clonar repositorio
git clone [tu-repo]
cd recomendador-pc

# Instalar dependencias
composer install
npm install

# Configurar entorno
cp .env.example .env
php artisan key:generate

# Configurar base de datos en .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=recomendador_db
DB_USERNAME=root
DB_PASSWORD=
DB_CHARSET=utf8mb4
DB_COLLATION=utf8mb4_unicode_ci

# Migrar base de datos
php artisan migrate

# Compilar assets
npm run dev

# Iniciar servidor
php artisan serve
```

## 🎯 Uso

### Usuario Final
1. Visita `http://localhost:8000`
2. Completa el wizard de 3 pasos
3. Recibe recomendaciones personalizadas
4. Cotiza por WhatsApp con tu código

### Administrador
1. Accede a `http://localhost:8000/sistema-interno`
2. Gestiona:
   - Categorías y subcategorías
   - Componentes y especificaciones
   - Reglas de recomendación
   - Servicios de soporte
   - Historial de simulaciones

## 📊 Estructura de Datos

### Categorías
- Estudios
- Trabajo
- Gaming
- Diseño

### Subcategorías (Jerárquicas)
- Universidad → Arquitectura, Ingeniería, etc.
- Trabajo → Oficina, Programación, etc.

### Componentes
- Procesador (CPU)
- Memoria RAM
- Tarjeta Gráfica
- Almacenamiento
- etc.

### Recomendaciones
Cada perfil tiene especificaciones mínimas y recomendadas para cada componente.

## 🔧 Configuración

### WhatsApp
Edita el número en `app/Livewire/Wizard.php`:
```php
$numero = '51915391298'; // Tu número con código de país
```

### Charset UTF-8
Asegúrate de tener en `.env`:
```
DB_CHARSET=utf8mb4
DB_COLLATION=utf8mb4_unicode_ci
```

## 📝 Changelog

### v1.0.0 (2026-02-13)
- ✅ Landing page profesional
- ✅ Wizard interactivo de 3 pasos
- ✅ Panel administrativo completo
- ✅ Integración WhatsApp
- ✅ Historial de simulaciones
- ✅ Fix charset UTF-8 para caracteres especiales

## 🤝 Contribuir

Las contribuciones son bienvenidas. Por favor:
1. Fork el proyecto
2. Crea una rama (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -m 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto es de código abierto bajo la licencia MIT.

## 👨‍💻 Autor

Desarrollado con ❤️ para ayudar a las personas a encontrar su PC ideal.

## 📞 Soporte

¿Necesitas ayuda? Contáctanos por WhatsApp usando el sistema 😉
