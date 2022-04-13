<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Componentes PC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarDashboard" aria-controls="navBarDashboard" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navBarDashboard">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Opciones de Inicio</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <li><a class="dropdown-item" href="/"><span class="fa-solid fa-house"></span> Página Principal</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.index') }}"><span class="fa-solid fa-house-user"></span> Dashboard</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('gestionar') }}"><span class="fa-solid fa-database"></span> Gestión de Stock</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('gestionar-user') }}"><span class="fa-solid fa-address-book"></span> Gestion de Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalogo.create') }}"><span class="fa-solid fa-folder-plus"></span> Crear Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categorias.create') }}"><span class="fa-solid fa-layer-group"></span> Crear Categorias</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
