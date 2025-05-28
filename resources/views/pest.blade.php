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

                    {{-- Inicio de la tabla de Autodiagnóstico P.E.S.T. --}}
                    {{-- Asegúrate de que la variable $proyecto esté disponible en esta vista --}}
                    {{-- Si $proyecto_id es lo que se pasa, usa $proyecto_id en lugar de $proyecto->id --}}
                    <form method="POST" action="{{ route('pest.store', ['proyecto' => $proyecto->id]) }}">
                        @csrf
                        {{-- El input oculto proyecto_id ya no es estrictamente necesario si se pasa en la URL, --}}
                        {{-- pero el controlador PestController@store lo espera como $proyecto de la URL. --}}
                        {{-- Si el controlador PestController@store también espera 'proyecto_id' del request body, mantenlo. --}}
                        {{-- Por coherencia con la ruta, el parámetro {proyecto} se toma de la URL. --}}

                        <div class="table-responsive mt-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="align-middle">AUTODIAGNÓSTICO ENTORNO GLOBAL P.E.S.T.</th>
                                        <th colspan="5" class="text-center">VALORACIÓN</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center" style="width: 10%;">En total desacuerdo<br>0</th>
                                        <th class="text-center" style="width: 10%;">No está de acuerdo<br>1</th>
                                        <th class="text-center" style="width: 10%;">Está de acuerdo<br>2</th>
                                        <th class="text-center" style="width: 10%;">Está bastante de acuerdo<br>3</th>
                                        <th class="text-center" style="width: 10%;">En total acuerdo<br>4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $preguntas = [
                                            "1. Los cambios en la composicón étnica de los consumidores de nuestro mercado está teniendo un notable impacto.",
                                            "2. El envejecimiento de la población tiene un importante impacto en la demanda.",
                                            "3. Los nuevos estilos de vida y tendencias originan cambios en la oferta de nuestro sector.",
                                            "4. El envejecimiento de la población tiene un importante impacto en la oferta del sector donde operamos.",
                                            "5. Las variaciones en el nivel de riqueza de la población impactan considerablemente en la demanda de los productos/servicios del sector donde operamos.",
                                            "6. La legislación fiscal afecta muy considerablemente a la economía de las empresas del sector donde operamos.",
                                            "7. La legislación laboral afecta muy considerablemente a la operativa del sector donde actuamos.",
                                            "8. Las subvenciones otorgadas por las Administraciones Públicas son claves en el desarrollo competitivo del mercado donde operamos.",
                                            "9. El impacto que tiene la legislación de protección al consumidor, en la manera de producir bienes y/o servicios es muy importante.",
                                            "10. La normativa autonómica tiene un impacto considerable en el funcionamiento del sector donde actuamos.",
                                            "11. Las expectativas de crecimiento económico generales afectan crucialmente al mercado donde operamos.",
                                            "12. La política de tipos de interés es fundamental en el desarrollo financiero del sector donde trabaja nuestra empresa.",
                                            "13. La globalización permite a nuestra industria gozar de importantes oportunidades en nuevos mercados.",
                                            "14. La situación del empleo es fundamental para el desarrollo económico de nuestra empresa y nuestro sector.",
                                            "15. Las expectativas del ciclo económico de nuestro sector impactan en la situación económica de sus empresas.",
                                            "16. Las Administraciones Públicas están incentivando el esfuerzo tecnológico de las empresas de nuestro sector.",
                                            "17. Internet, el comercio electrónico, el wireless y otras NTIC están impactando en la demanda de nuestros productos/servicios y en los de la competencia.",
                                            "18. El empleo de NTICs es generalizado en el sector donde trabajamos.",
                                            "19. En nuestro sector, es de gran importancia ser pionero o referente en el empleo de aplicaciones tecnológicas.",
                                            "20. En el sector donde operamos, para ser competitivos, es condición \"sine qua non\" innovar constantemente.",
                                            "21. La legislación medioambiental afecta al desarrollo de nuestro sector.",
                                            "22. Los clientes de nuestro mercado exigen que se seamos socialmente responsables, en el plano medioambiental.",
                                            "23. En nuestro sector, la políticas medioambientales son una fuente de ventajas competitivas.",
                                            "24. La creciente preocupación social por el medio ambiente impacta notablemente en la demanda de productos/servicios ofertados en nuestro mercado.",
                                            "25. El factor ecológico es una fuente de diferenciación clara en el sector donde opera nuestra empresa."
                                        ];
                                    @endphp

                                    @foreach ($preguntas as $index => $pregunta)
                                    <tr>
                                        <td>{{ $pregunta }}</td>
                                        @for ($i = 0; $i <= 4; $i++)
                                        <td class="text-center">
                                            <input type="radio" name="pregunta{{ $index + 1 }}" value="{{ $i }}" required>
                                        </td>
                                        @endfor
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        <h2 class="mt-4">Reflexión sobre los Factores</h2>

                        <div class="form-group mt-3">
                            <label for="reflexion_social_demografico">FACTORES SOCIALES Y DEMOGRÁFICOS</label>
                            <textarea class="form-control" id="reflexion_social_demografico" name="RFSocialesDemograficos" rows="3"></textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="reflexion_medio_ambiental">FACTORES MEDIO AMBIENTALES</label>
                            <textarea class="form-control" id="reflexion_medio_ambiental" name="RFAmbientales" rows="3"></textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="reflexion_politicos">FACTORES POLÍTICOS</label>
                            <textarea class="form-control" id="reflexion_politicos" name="RFPoliticos" rows="3"></textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="reflexion_economicos">FACTORES ECONÓMICOS</label>
                            <textarea class="form-control" id="reflexion_economicos" name="RFEconomicos" rows="3"></textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="reflexion_tecnologicos">FACTORES TECNOLÓGICOS</label>
                            <textarea class="form-control" id="reflexion_tecnologicos" name="RFTecnologicos" rows="3"></textarea>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Guardar Análisis PEST</button>
                        </div>
                    </form>
                    {{-- Fin de la tabla de Autodiagnóstico P.E.S.T. --}}

                </div>
            </div>
        </div>
    </div>
</div>

