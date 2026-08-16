<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Tâches</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .modal { display: none !important; }
    .modal:target { display: flex !important; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans flex flex-col h-screen">

  <header class="bg-[#1E272E] text-white shadow-md z-10">
    <div class="max-w-7xl mx-auto px-8 h-16 flex items-center justify-between relative">
      
      <div class="flex items-center">
        <a href="<?= path("dashboard","dashboard") ?>" class="text-xl font-bold text-[#00A8CC] tracking-wide flex items-center hover:opacity-90 transition"> 
          <i class="fa-solid fa-check-double mr-2"></i>Gestion Tache
        </a>
      </div>
        
      <nav class="hidden sm:flex space-x-2 absolute left-1/2 -translate-x-1/2">
        <a href="<?= path("dashboard","dashboard") ?>" 
           class="flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-medium transition duration-200 <?= ($_REQUEST['controller'] == 'dashboard') ? 'text-[#00A8CC] bg-white/10 shadow-sm' : 'text-gray-300 hover:text-[#00A8CC] hover:bg-white/5' ?>">
          <i class="fa-solid fa-house text-xs"></i> 
          <span>Dashboard</span>
        </a>
        <a href="<?= path("tache","liste") ?>" 
           class="flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-medium transition duration-200 <?= ($_REQUEST['controller'] == 'tache') ? 'text-[#00A8CC] bg-white/10 shadow-sm' : 'text-gray-300 hover:text-[#00A8CC] hover:bg-white/5' ?>">
          <i class="fa-solid fa-list-check text-xs"></i> 
          <span>Mes Tâches</span>
        </a>
      </nav>

      <!-- Balise vide à droite pour préserver le centrage parfait du menu -->
      <div class="w-28 hidden sm:block"></div>

    </div>
  </header>
        
  <!-- Zone de contenu principal -->
  <main class="flex-1 overflow-y-auto">
      <?= $content ?>
  </main>

</body>
</html>
