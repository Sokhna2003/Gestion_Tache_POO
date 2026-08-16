<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Taches</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .modal { display: none !important; }
        .modal:target { display: flex !important; }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased text-white">
    <!-- Navigation -->
    <nav class="bg-[#1E272E] shadow-sm border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo / Titre (Aligné à gauche) -->
                <div class="flex items-center">
                    <a href="<?=path("dashboard","dashboard")?>" class="text-xl font-bold text-[#00A8CC] flex items-center">
                        <i class="fa-solid fa-check-double mr-2"></i>Gestion Tache
                    </a>
                </div>

                <!-- Menu de navigation (Parfaitement centré) -->
                <div class="hidden sm:flex space-x-4 absolute left-1/2 -translate-x-1/2">
                    <a href="<?=path("dashboard","dashboard")?>" class="px-3 py-2 rounded-md text-sm font-medium flex items-center space-x-2 <?=$_REQUEST["controller"]=="dashboard"?"text-[#00A8CC] bg-white/10":"text-gray-300 hover:text-[#00A8CC] hover:bg-white/5"?>">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="<?=path("tache","liste")?>" class="px-3 py-2 rounded-md text-sm font-medium flex items-center space-x-2 <?=$_REQUEST["controller"]=="client"?"text-[#00A8CC] bg-white/10":"text-gray-300 hover:text-[#00A8CC] hover:bg-white/5"?>">
                        <i class="fa-solid fa-list-check"></i>
                        <span>Taches</span>
                    </a>
                </div>

                <!-- Informations Utilisateur (Aligné à droite) -->
                <div class="text-gray-300">
                    <p>Bonjour, <strong><?=$_SESSION["user"]["prenom"]?> <?=$_SESSION["user"]["nom"]?></strong></p>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="text-gray-800">
        <?= $content ?>
    </div>
</body>
</html>
