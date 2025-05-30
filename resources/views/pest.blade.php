@extends('layouts.app')

@section('content')
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

                    <form method="POST" action="{{ route('pest.store', ['proyecto' => $proyecto->id]) }}">
                        @csrf
                        
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
                                        $preguntasText = [
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
                                        $existingAnswers = [];
                                        if (isset($pestData) && $pestData) {
                                            for ($k = 1; $k <= 25; $k++) {
                                                $preguntaKey = 'pregunta'.$k;
                                                if (isset($pestData->$preguntaKey)) {
                                                    $existingAnswers[$preguntaKey] = $pestData->$preguntaKey;
                                                }
                                            }
                                        }
                                    @endphp

                                    @foreach ($preguntasText as $index => $pregunta)
                                    <tr>
                                        <td>{{ $pregunta }}</td>
                                        @for ($i = 0; $i <= 4; $i++)
                                        <td class="text-center">
                                            @php
                                                $fieldName = 'pregunta'.($index + 1);
                                                $radioValue = $i;
                                                $isChecked = false;
                                                if (old($fieldName) !== null) {
                                                    if (old($fieldName) == $radioValue) { $isChecked = true; }
                                                } elseif (isset($existingAnswers[$fieldName])) {
                                                    if ($existingAnswers[$fieldName] == $radioValue) { $isChecked = true; }
                                                }
                                            @endphp
                                            <input type="radio" name="{{ $fieldName }}" value="{{ $radioValue }}" @if($isChecked) checked @endif required>
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
                            <label for="reflexion_social_demografico">FACTORES SOCIALES Y DEMOGRÁFICOS (Reflexión)</label>
                            <textarea class="form-control" id="reflexion_social_demografico" name="reflexion_RFSocialesDemograficos_display" rows="3" readonly>{{ $pestData->reflexion_social_texto ?? '' }}</textarea>
                            <label for="puntaje_RFSociales" class="mt-2">Puntaje:</label>
                            <input type="number" class="form-control" id="puntaje_RFSociales" name="RFSociales_display" value="{{ $pestData->RFSociales ?? 0 }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="reflexion_medio_ambiental">FACTORES MEDIO AMBIENTALES (Reflexión)</label>
                            <textarea class="form-control" id="reflexion_medio_ambiental" name="reflexion_RFAmbientales_display" rows="3" readonly>{{ $pestData->reflexion_ambiental_texto ?? '' }}</textarea>
                            <label for="puntaje_RFAmbientales" class="mt-2">Puntaje:</label>
                            <input type="number" class="form-control" id="puntaje_RFAmbientales" name="RFAmbientales_display" value="{{ $pestData->RFAmbientales ?? 0 }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="reflexion_politicos">FACTORES POLÍTICOS (Reflexión)</label>
                            <textarea class="form-control" id="reflexion_politicos" name="reflexion_RFPoliticos_display" rows="3" readonly>{{ $pestData->reflexion_politico_texto ?? '' }}</textarea>
                            <label for="puntaje_RFPoliticos" class="mt-2">Puntaje:</label>
                            <input type="number" class="form-control" id="puntaje_RFPoliticos" name="RFPoliticos_display" value="{{ $pestData->RFPoliticos ?? 0 }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="reflexion_economicos">FACTORES ECONÓMICOS (Reflexión)</label>
                            <textarea class="form-control" id="reflexion_economicos" name="reflexion_RFEconomicos_display" rows="3" readonly>{{ $pestData->reflexion_economico_texto ?? '' }}</textarea>
                            <label for="puntaje_RFEconomicos" class="mt-2">Puntaje:</label>
                            <input type="number" class="form-control" id="puntaje_RFEconomicos" name="RFEconomicos_display" value="{{ $pestData->RFEconomicos ?? 0 }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="reflexion_tecnologicos">FACTORES TECNOLÓGICOS (Reflexión)</label>
                            <textarea class="form-control" id="reflexion_tecnologicos" name="reflexion_RFTecnologicos_display" rows="3" readonly>{{ $pestData->reflexion_tecnologico_texto ?? '' }}</textarea>
                            <label for="puntaje_RFTecnologicos" class="mt-2">Puntaje:</label>
                            <input type="number" class="form-control" id="puntaje_RFTecnologicos" name="RFTecnologicos_display" value="{{ $pestData->RFTecnologicos ?? 0 }}" readonly>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Guardar Análisis PEST</button>
                        </div>
                    </form>

                    <hr class="mt-5 mb-4">
                    <h2 class="mt-4">Gráfico de Impacto de Factores Generales Externos</h2>
                    <div style="width: 80%; margin: auto;">
                        <canvas id="pestChart"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('pestChart');
    if (!ctx) {
        console.error("Elemento canvas 'pestChart' no encontrado.");
        return;
    }

    const chartCtx = ctx.getContext('2d');
    const pestDataObject = @json($pestData ?? null);
    console.log("Datos PEST de la BD (pestDataObject):", pestDataObject);

    const radioQuestionNames = [];
    for (let i = 1; i <= 25; i++) {
        radioQuestionNames.push(`pregunta${i}`);
    }

    let pestChartInstance;

    function getSelectedRadioValue(groupName) {
        const selectedRadio = document.querySelector(`input[name="${groupName}"]:checked`);
        return selectedRadio ? parseInt(selectedRadio.value) : 0;
    }

    function calculateScoresForChart() {
        let scores = {
            sociales: 0, politicos: 0, economicos: 0, tecnologicos: 0, ambientales: 0
        };
        for (let i = 1; i <= 5; i++) { scores.sociales += getSelectedRadioValue(`pregunta${i}`); }
        for (let i = 6; i <= 10; i++) { scores.politicos += getSelectedRadioValue(`pregunta${i}`); }
        for (let i = 11; i <= 15; i++) { scores.economicos += getSelectedRadioValue(`pregunta${i}`); }
        for (let i = 16; i <= 20; i++) { scores.tecnologicos += getSelectedRadioValue(`pregunta${i}`); }
        for (let i = 21; i <= 25; i++) { scores.ambientales += getSelectedRadioValue(`pregunta${i}`); }

        scores.sociales *= 5; scores.politicos *= 5; scores.economicos *= 5;
        scores.tecnologicos *= 5; scores.ambientales *= 5;
        console.log("Puntajes calculados para el gráfico (desde radios):", scores);
        return scores;
    }
    
    function updateChart(scores) {
        if (pestChartInstance) {
            console.log("Actualizando gráfico con puntajes:", scores);
            pestChartInstance.data.datasets[0].data = [
                scores.sociales, scores.ambientales, scores.politicos,
                scores.economicos, scores.tecnologicos
            ];
            pestChartInstance.update();
        } else {
            console.error("Instancia del gráfico (pestChartInstance) no definida al intentar actualizar.");
        }
    }

    function initializeChart(initialScores) {
        console.log("Inicializando gráfico con puntajes:", initialScores);
        pestChartInstance = new Chart(chartCtx, {
            type: 'bar',
            data: {
                labels: ['FACTORES SOCIALES Y DEMOGRÁFICOS', 'FACTORES MEDIO AMBIENTALES', 'FACTORES POLÍTICOS', 'FACTORES ECONÓMICOS', 'FACTORES TECNOLÓGICOS'],
                datasets: [{
                    label: 'Nivel de impacto',
                    data: [ initialScores.sociales, initialScores.ambientales, initialScores.politicos, initialScores.economicos, initialScores.tecnologicos ],
                    backgroundColor: [
                        'rgba(144, 238, 144, 0.7)', 'rgba(0, 128, 0, 0.7)', 'rgba(139, 69, 19, 0.7)',
                        'rgba(255, 165, 0, 0.7)', 'rgba(173, 216, 230, 0.7)'
                    ],
                    borderColor: [
                        'rgba(144, 238, 144, 1)', 'rgba(0, 128, 0, 1)', 'rgba(139, 69, 19, 1)',
                        'rgba(255, 165, 0, 1)', 'rgba(173, 216, 230, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true, max: 100, title: { display: true, text: 'Nivel de impacto de factores generales externos' } },
                    x: { title: { display: true, text: 'Tipología de factores generales externos' } }
                },
                plugins: { legend: { display: false }, tooltip: { callbacks: { label: context => context.dataset.label + ': ' + context.parsed.y } } }
            }
        });
    }

    let scoresForChartInitialization;
    if (pestDataObject && typeof pestDataObject === 'object' && Object.keys(pestDataObject).length > 0) {
        scoresForChartInitialization = {
            sociales: parseInt(pestDataObject.RFSociales) || 0,
            ambientales: parseInt(pestDataObject.RFAmbientales) || 0,
            politicos: parseInt(pestDataObject.RFPoliticos) || 0,
            economicos: parseInt(pestDataObject.RFEconomicos) || 0,
            tecnologicos: parseInt(pestDataObject.RFTecnologicos) || 0
        };
        console.log("Puntajes para inicialización del gráfico (desde pestDataObject):", scoresForChartInitialization);
    } else {
        console.log("pestDataObject vacío o nulo. Calculando puntajes iniciales para el gráfico desde los radios.");
        scoresForChartInitialization = calculateScoresForChart();
    }
    initializeChart(scoresForChartInitialization);

    radioQuestionNames.forEach(name => {
        const radios = document.querySelectorAll(`input[name="${name}"]`);
        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                const currentScoresForChart = calculateScoresForChart();
                updateChart(currentScoresForChart);
            });
        });
    });
});
</script>
@endpush
@endsection



