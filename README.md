# Proyecto de Plan Estratégico - Módulo de Análisis PEST

Este proyecto implementa un sistema para realizar análisis estratégicos, incluyendo un módulo detallado para el Análisis PEST (Político, Económico, Social y Tecnológico).

## Funcionalidades Implementadas

### 1. Vista del Análisis PEST

Se ha desarrollado una vista dedicada (`pest.blade.php`) para que los usuarios puedan realizar el autodiagnóstico del macroentorno de su empresa. Esta vista presenta:
*   Una introducción al análisis PEST.
*   Una tabla con 25 afirmaciones que el usuario debe valorar.
*   Secciones para la reflexión y visualización de puntajes por cada factor PEST.
*   Un gráfico de barras que representa visualmente el impacto de cada factor.

**Imagen de la Vista PEST:**
*(Aquí puedes añadir una captura de pantalla general de la vista PEST)*
`![Vista General del Análisis PEST](image/imagen1.png)`

### 2. Funcionalidad de los Radio Buttons y Cálculo de Puntajes

La interacción principal del usuario en la tabla de autodiagnóstico se realiza mediante radio buttons.
*   **Selección y Persistencia:** Por cada una de las 25 afirmaciones, el usuario selecciona una valoración de 0 (En total desacuerdo) a 4 (En total acuerdo).
    *   Al cargar la página, si existen datos previamente guardados para el proyecto, los radio buttons correspondientes se preseleccionan.
    *   Si no hay datos guardados o si el usuario está llenando el formulario por primera vez (y no hay `old input` por errores de validación), ningún radio button estará seleccionado por defecto.
*   **Guardado de Datos:** Al presionar el botón "Guardar Análisis PEST", todas las selecciones de los radio buttons se envían al backend.
*   **Cálculo de Puntajes (Backend):**
    *   El controlador (`PestController.php`) recibe las valoraciones.
    *   Los puntajes para cada uno de los cinco factores (Sociales, Políticos, Económicos, Tecnológicos y Ambientales) se calculan de la siguiente manera:
        1.  Se suman las valoraciones de los radio buttons correspondientes a cada factor (grupos de 5 preguntas: 1-5 para Sociales, 6-10 para Políticos, 11-15 para Económicos, 16-20 para Tecnológicos, y 21-25 para Ambientales).
        2.  La suma obtenida para cada factor se multiplica por 5.
    *   Estos puntajes calculados (que van de 0 a 100) se almacenan en la base de datos en las columnas `RFSociales`, `RFPoliticos`, `RFEconomicos`, `RFTecnologicos`, y `RFAmbientales`.
*   **Visualización de Puntajes:** Los puntajes almacenados en la base de datos se muestran en campos de texto de solo lectura debajo de cada sección de reflexión.

**Imagen de los Radio Buttons y Campos de Puntaje:**
*(Aquí puedes añadir una captura de pantalla mostrando la tabla de radio buttons y los campos de puntaje con valores)*
`![Radio Buttons y Puntajes](image/imagen2.png)`

### 3. Mensajes de Reflexión y Gráfico de Barras

*   **Mensajes de Reflexión (Backend y Frontend):**
    *   Basado en el puntaje calculado para cada factor (almacenado en la BD), se genera un mensaje de reflexión.
    *   Si el puntaje es >= 70, el mensaje indica "HAY UN NOTABLE IMPACTO DE FACTORES [NOMBRE_FACTOR] EN EL FUNCIONAMIENTO DE LA EMPRESA".
    *   Si el puntaje es < 70, el mensaje indica "NO HAY UN NOTABLE IMPACTO DE FACTORES [NOMBRE_FACTOR] EN EL FUNCIONAMIENTO DE LA EMPRESA".
    *   Estos mensajes se almacenan en columnas de texto separadas en la base de datos (ej. `reflexion_social_texto`) y se muestran en `textarea` de solo lectura en la vista.
*   **Gráfico de Barras (Chart.js):**
    *   La vista incluye un gráfico de barras para visualizar el "Nivel de impacto de factores generales externos".
    *   **Inicialización:** Al cargar la página, el gráfico se inicializa con los puntajes almacenados en la base de datos (`$pestData`). Si no hay datos, se calcula a partir de los radio buttons seleccionados (que inicialmente serían todos 0 si es un formulario nuevo).
    *   **Actualización Dinámica:** Cuando el usuario cambia la selección de cualquier radio button, el JavaScript recalcula los puntajes de los cinco factores (suma de valores de radios * 5) *únicamente para la vista previa del gráfico*. El gráfico se actualiza en tiempo real para reflejar estos cambios, permitiendo al usuario ver el impacto de sus selecciones antes de guardar. Los campos de texto de puntaje y los textareas de reflexión *no* se actualizan dinámicamente por JavaScript después de la carga inicial; estos siempre reflejan los datos de la base de datos o los valores iniciales si no hay datos.

**Imagen del Gráfico de Barras:**
*(Aquí puedes añadir una captura de pantalla del gráfico de barras mostrando los resultados)*
`![Gráfico de Impacto PEST](image/imagen3.png)`

## Estructura de la Base de Datos (Tabla `pest`)

La tabla `pest` en la base de datos (`gestion_login`) almacena la información del análisis, incluyendo:
*   `proyecto_id`: Clave foránea al proyecto.
*   `pregunta1` a `pregunta25`: Valoraciones de los radio buttons (0-4).
*   `sumatorio`: Suma total de todas las preguntas (no se usa actualmente para los factores PEST específicos).
*   `RFSociales`, `RFAmbientales`, `RFPoliticos`, `RFEconomicos`, `RFTecnologicos`: Puntajes calculados (0-100) para cada factor.
*   `reflexion_social_texto`, `reflexion_ambiental_texto`, `reflexion_politico_texto`, `reflexion_economico_texto`, `reflexion_tecnologico_texto`: Mensajes de reflexión generados.
*   Timestamps `created_at` y `updated_at`.

## Próximos Pasos
*   Implementar validaciones adicionales si es necesario.
*   Mejorar la interfaz de usuario y la experiencia del usuario.
*   Integrar este módulo con otras herramientas de análisis estratégico.

---

**Nota:** Para que las imágenes se muestren correctamente, crea una carpeta llamada `image` en la raíz del proyecto (`c:\Users\HP\Documents\Downloads\PE_II_EXAMEN_PRACTICO\image\`) y guarda las capturas de pantalla como `imagen1.png`, `imagen2.png`, y `imagen3.png` dentro de esa carpeta.
