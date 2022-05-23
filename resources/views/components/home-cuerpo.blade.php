<main>
    <div class="d-flex justify-content-center align-items-center my-5">
        <h1 class="h1 text-center my-5">Leran Good</h1>
        <x-jet-application-mark />
    </div>

<div class="d-flex row text-center text-white" style="height: 600px;">

    <div class="container" id="custom-cards">
        <div>
            <div class="card cardsInicio card-cover h-100 overflow-hidden text-white rounded-5 shadow-lg">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 cardsInicio">
                    <ul class="d-flex col list-unstyled mt-auto container">
                        <li class="me-auto">
                            <img src="https://s.udemycdn.com/home/non-student-cta/instructor-1x-v3.jpg" alt="Bootstrap" width="432" height="432" class="border border-success rounded border-3">
                        </li>
                        <li class="d-flex row align-content-center">
                            <div>
                                <h2 class="pt-5 display-6 fw-bold">Conviertete en Profesor</h2>
                            </div>
                            <div class="d-flex row justify-content-center">
                                <div class="d-flex" style="width:38rem;">
                                    <p class="text-center">Profesores de todo el mundo enseñan a millones de estudiantes en LearnGood. Proporcionamos las herramientas y las habilidades para que enseñes lo que te apasiona.</p>
                                </div>
                                <div>
                                    <a href="{{ url('/register') }}" class="btn btn-lg btn-secondary fw-bold border-white text-dark bg-white">Registrarme</a>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex row text-center text-white" style="height: 600px;">

    <div class="container" id="custom-cards">
        <div>
            <div class="card cardsInicio card-cover h-100 overflow-hidden text-white rounded-5 shadow-lg">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 cardsInicio">
                    <ul class="d-flex col list-unstyled mt-auto container">
                        <li class="d-flex row align-content-center">
                            <div class="d-flex row justify-content-center">
                            <div>
                                <h2 class="pt-5 display-6 fw-bold">Conviertete en Estudiante</h2>
                            </div>
                                <div class="d-flex" style="width:38rem;">
                                    <p class="text-center">Estudiantes de todo el mundo aprenden de todos nuestros profesionales en LearnGood. Proporcionamos las herramientas y las habilidades para que aprendan lo que ellos necesiten.</p>
                                </div>
                                <div>
                                    <a href="{{ url('/register') }}" class="btn btn-lg btn-secondary fw-bold border-white text-dark bg-white">Registrarme</a>
                                </div>

                            </div>
                        </li>
                        <li class="me-auto">
                            <img src="https://s.udemycdn.com/home/non-student-cta/ub-1x-v3.jpg" alt="Bootstrap"
                                width="432" height="432" class="border border-primary rounded border-3">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


</main>
