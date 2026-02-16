# Actualización de Íconos de Categorías

## Pasos para aplicar los cambios

### 1. Ejecutar la migración
```bash
php artisan migrate
```

### 2. Actualizar los íconos de las categorías existentes
```bash
php artisan db:seed --class=CategoryIconSeeder
```

## Íconos asignados por categoría

Las 7 categorías tienen los siguientes íconos personalizados:

1. **Estudios** → 📚 (Libros)
2. **Trabajo y Oficina** → 💼 (Maletín)
3. **Hogar y uso básico** → 🏠 (Casa)
4. **Gaming** → 🎮 (Control de videojuegos)
5. **Diseño y Creación** → 🎨 (Paleta de pintura)
6. **Livianas y fáciles de transportar** → 🎒 (Mochila)
7. **Máxima potencia profesional** → ⚡ (Rayo)

## Cómo cambiar los íconos desde el panel de administración

1. Accede al panel de Filament: `/admin`
2. Ve a la sección **Contenido → Categorías**
3. Haz clic en **Editar** en la categoría que deseas modificar
4. En el campo **Ícono (Emoji)**, pega el emoji que desees
5. Guarda los cambios

## Sugerencias de emojis alternativos

### Para Estudios:
- 📚 Libros (actual)
- 🎓 Birrete
- ✏️ Lápiz
- 📝 Cuaderno

### Para Trabajo y Oficina:
- 💼 Maletín (actual)
- 👔 Corbata
- 📊 Gráfico
- 💻 Laptop

### Para Hogar y uso básico:
- 🏠 Casa (actual)
- 🛋️ Sofá
- 📺 TV
- ☕ Café

### Para Gaming:
- 🎮 Control (actual)
- 🕹️ Joystick
- 🎯 Diana
- 🏆 Trofeo

### Para Diseño y Creación:
- 🎨 Paleta (actual)
- 🖌️ Pincel
- 📐 Regla
- 💡 Bombilla

### Para Livianas y fáciles de transportar:
- 🎒 Mochila (actual)
- ✈️ Avión
- 🚀 Cohete
- 🏃 Corredor

### Para Máxima potencia profesional:
- ⚡ Rayo (actual)
- 🚀 Cohete
- 💪 Músculo
- 🔥 Fuego

## Mejoras implementadas en el diseño

### Paso 1 del Wizard (Selección de categoría):
- ✅ Diseño en grid de 2 columnas responsivo
- ✅ Tarjetas más grandes con mejor espaciado
- ✅ Íconos personalizados por categoría
- ✅ Efecto de hover con gradiente de fondo
- ✅ Animaciones suaves (escala, rotación, elevación)
- ✅ Flecha indicadora en cada tarjeta
- ✅ Gradiente en el título principal
- ✅ Mejor jerarquía visual

### Características técnicas:
- Íconos con gradiente de fondo (indigo a purple)
- Animación de rotación al hacer hover
- Sombras más pronunciadas
- Transiciones suaves de 300ms
- Diseño responsive (1 columna en móvil, 2 en desktop)
