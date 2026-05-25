{{-- resources/views/layouts/dashboard.blade.php --}}

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEST-IMMO Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">

    {{-- SIDEBAR SELON L'URL DE L'ESPACE --}}
    @if(request()->is('dash-admin*'))
        @include('components.admin.sidebar')
    @elseif(request()->is('dash-gestionnaire*'))
        @include('components.gestionnaire.sidebar')
    @elseif(request()->is('dash-locataire*'))
        @include('components.locataire.sidebar')
    @endif


    {{-- TOPBAR SELON L'URL DE L'ESPACE --}}
    @if(request()->is('dash-admin*'))
        @include('components.admin.topbar')
    @elseif(request()->is('dash-gestionnaire*'))
        @include('components.gestionnaire.topbar')
    @elseif(request()->is('dash-locataire*'))
        @include('components.locataire.topbar')
    @endif


    {{-- CONTENT --}}
    <main class="ml-72 pt-20 min-h-screen">
        @yield('content')
    </main>

    {{--  SweetAlert2  --}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('succes'))
            Swal.fire({
                icon: 'success',
                title: 'Succès !',
                text: @json(session('succes')),
                confirmButtonColor: '#0f172a',
                confirmButtonText: "D'accord"
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oups...',
                text: @json($errors->first()),
                confirmButtonColor: '#f97316',
                confirmButtonText: 'Réessayer'
            });
        @endif
    });
    </script>

</body>
</html>
