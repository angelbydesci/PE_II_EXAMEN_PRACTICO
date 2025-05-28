<!-- resources/views/x-x.blade.php -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>9. ANÁLISIS EXTERNO MACROENTORNO: PEST</h1>
                </div>

                <div class="card-body">
                    <p><strong>PEST</strong> es un acrónimo y las letras representan el macro entorno de la empresa.</p>

                    <h2>Políticos</h2>
                    <p>Aquellos factores que puedan determinar la actividad de la empresa. Por ejemplo, la legislación tributaria, laboral, tratados comerciales, normas de medio ambiente, etc.</p>

                    <h2>Económicos</h2>
                    <p>Los factores políticos implican efectos económicos. El comportamiento, la confianza del comprador y su nivel adquisitivo están relacionados con el auge, estancamiento, recesión y recuperación de la economía. Ejemplos de ellos son; tasas impositivas, tasas de interés, niveles de deuda y ahorro, tasa de empleo, índices de precio, etc.</p>

                    <h2>Sociales</h2>
                    <p>Se enfoca a las fuerzas que actúan dentro de la sociedad y que afectan a las actitudes, opiniones e intereses de las personas. Varían de un país a otro de forma notable. Ejemplos de estas variables son: estratos demográficos, estilos de vida, distribuciones del ingreso, ocio, factores étnicos y religiosos, etc.</p>

                    <h2>Tecnológicos</h2>
                    <p>Este factor es muy importante para casi toda la totalidad de las empresas industriales. La tecnología es una fuerza impulsora de negocios, mejora la calidad y puede reducir los tiempos para el mercadeo. La tecnología puede por tanto eliminar las barreras de entrada pero a veces es difícil la asimilación y adaptación de los cambios tecnológicos por la velocidad de los mismos. Ejemplos de esta variable son: las tasas de obsolescencia tecnológica, los incentivos a la modernización tecnológica, la automatización de los procesos de producción, el impacto de las tecnologías de información, etc.</p>

                    <hr>

                    <p><em>El siguiente gráfico reflejará la valoración obtenida en cada una de las variables del diagnóstico macro-entorno.</em></p>

                    <hr>

                    <p>A continuación marque con una X para valorar su empresa en función de cada una de las afirmaciones, de tal forma que 0= En total en desacuerdo; 1= No está de acuerdo; 2= Está de acuerdo; 3= Está bastante de acuerdo; 4= En total acuerdo. En caso de no cumplimentar una casilla o duplicar su respuesta le aparecerá el mensaje de error ("¡REF!)</p>

                    {{-- Aquí iría el formulario o la tabla para las preguntas PEST --}}
                    {{-- Por ejemplo: --}}
                    {{-- @include('partials.pest_form', ['proyecto_id' => $proyecto_id]) --}}

                </div>
            </div>
        </div>
    </div>
</div>

