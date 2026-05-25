<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>@yield('title', config('app.name'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- CDN SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">



    <main>
        @yield('content')
    </main>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 🟢 1. Détection d'un message de succès
            @if(session('succes'))
            Swal.fire({
                icon: 'success',
                title: 'Succès !',
                text: "{{ session('succes') }}",
                confirmButtonColor: '#0f172a', // Ton bleu nuit GEST-IMMO
                confirmButtonText: " D'accord "

            });
            @endif

            // 🔴 2. Détection des erreurs globales ou d'authentification
            @if($errors -> any())
            Swal.fire({
                icon: 'error',
                title: 'Oups...',
                // On récupère la première erreur du tableau
                text: "{{ $errors->first() }}",
                confirmButtonColor: '#f97316', // Ton orange GEST-IMMO pour les alertes
                confirmButtonText: 'Réessayer'
            });
            @endif
        });
    </script>

</body>

</html>
