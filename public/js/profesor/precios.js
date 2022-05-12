/*
    @if (!$precios)
        <div class="w-100">
            <div class="card text-white bg-dark rounded-5 font-monospace">
                <div class="d-flex flex-column h-100 p-5">
                    <div class="d-flex justify-content-evenly align-items-center text-center">
                        <span class="h1 fw-bold text-danger m-5">Aún No Hay Precios Creados</span>
                    </div>
                </div>
            </div>
        </div>
    @else
        @foreach($precios as $precio)
            <div class="col">
                <div class="card text-white bg-dark rounded-5 font-monospace">
                    <div class="d-flex flex-column h-100 p-5">
                        <div class="d-flex justify-content-evenly align-items-center">
                            <span class="h1 fw-bold text-danger text-decoration-underline">Nº
                                {{ $precio-> id}}</span>
                            <span class="h3">- Precio: {{ $precio-> precio}}€</span>
                        </div>
                        <div class="d-flex row text-left my-4">
                            <span class="h3">Ventajas:</span>
                            <div class="ms-3">
                                <ul class="fw-bold">
                                    <li type="1" class="ps-2 h5">{{ $precio-> ventajaUno}}</li>
                                    <li type="1" class="ps-2 h5">{{ $precio-> ventajaDos}}</li>
                                    <li type="1" class="ps-2 h5">{{ $precio-> ventajaTres}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <!-- Boton del Modal Ver Precio -->
                            <button type="button" class="btn btn-secondary mt-4 px-4" data-bs-toggle="modal"
                                data-bs-target="#showPrice">
                                <span class="fas fa-eye"></span>
                            </button>
                            <!-- Boton del Modal Ver Precio -->

                            <!-- Boton del Modal Editar Precio -->
                            <button type="button" class="btn btn-primary mt-4 px-4" data-bs-toggle="modal"
                                data-bs-target="#editPrice">
                                <span class="fas fa-edit"></span>
                            </button>
                            <!-- Boton del Modal Editar Precio -->

                            <!-- Boton del Modal Eliminar Precio -->
                            <button type="button" class="btn btn-danger mt-4 px-4" data-bs-toggle="modal"
                                data-bs-target="#deletePrice">
                                <span class="fas fa-trash"></span>
                            </button>
                            <!-- Boton del Modal Eliminar Precio -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
*/

// Cogemos la caja que queremos mostrar datos dentro
mostrarPrecios();

// Función que mostrará los precios y tendrá las comprobaciones si hay o no precios
async function mostrarPrecios() {
    let cajaPreciosMostrar = document.body.querySelector("#cajaPreciosMostrar");

    let id = document.body.querySelector('#user_id').value;
    console.log(id);

    let response = await fetch('/api/api-precios/' + id, { // la ruta que hemos creado primera para recibir los precios
        method: 'GET', // Recibe datos, para mostrarlos
    });

    //console.log(response)
    let results = await response.json();

    console.log(results);

    if (response.status === 200) { //
        console.log('denotro del if');
        // recorre los precios para mostrarlos en cada innerHTML que hace
        for (let result of results) {
            /* <div class="w-100">
                <div class="card text-white bg-dark rounded-5 font-monospace">
                    <div class="d-flex flex-column h-100 p-5">
                        <div class="d-flex justify-content-evenly align-items-center text-center">
                            <span class="h1 fw-bold text-danger m-5">Aún No Hay Precios Creados</span>
                        </div>
                    </div>
                </div>
            </div> */

            // añade al div, cada precio con su caja correspondiente y datos
            cajaPreciosMostrar.innerHTML = `
                <div class="col">
                    <div class="card text-white bg-dark rounded-5 font-monospace">
                        <div class="d-flex flex-column h-100 p-5">
                            <div class="d-flex justify-content-evenly align-items-center">
                                <span class="h1 fw-bold text-danger text-decoration-underline">Nº ${result.id}</span>
                                <span class="h3">Precio: ${result.precio}€</span>
                            </div>
                            <div class="d-flex row text-left my-4">
                                <span class="h3">Ventajas:</span>
                                <div class="ms-3">
                                    <ul class="fw-bold">
                                        <li type="1" class="ps-2 h5">${result.ventajaUno}</li>
                                        <li type="1" class="ps-2 h5">${result.ventajaDos}</li>
                                        <li type="1" class="ps-2 h5">${result.ventajaTres}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex justify-content-evenly">
                                <!-- Boton del Modal Ver Precio -->
                                <button type="button" class="btn btn-secondary mt-4 px-4" data-bs-toggle="modal"
                                    data-bs-target="#showPrice">
                                    <span class="fas fa-eye"></span>
                                </button>
                                <!-- Boton del Modal Ver Precio -->

                                <!-- Boton del Modal Editar Precio -->
                                <button type="button" class="btn btn-primary mt-4 px-4" data-bs-toggle="modal"
                                    data-bs-target="#editPrice">
                                    <span class="fas fa-edit"></span>
                                </button>
                                <!-- Boton del Modal Editar Precio -->

                                <!-- Boton del Modal Eliminar Precio -->
                                <button type="button" class="btn btn-danger mt-4 px-4" data-bs-toggle="modal"
                                    data-bs-target="#deletePrice">
                                    <span class="fas fa-trash"></span>
                                </button>
                                <!-- Boton del Modal Eliminar Precio -->
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }
    }
    if (response.status === 400) { //
        // recorre los precios para mostrarlos en cada innerHTML que hace
        cajaPreciosMostrar.innerHTML = `
            <div class="w-100">
                <div class="card text-white bg-dark rounded-5 font-monospace">
                    <div class="d-flex flex-column h-100 p-5">
                        <div class="d-flex justify-content-evenly align-items-center text-center">
                            <span class="h1 fw-bold text-danger m-5">Aún No Hay Precios Creados</span>
                        </div>
                    </div>
                </div>
            </div>
            `;
    }

}
