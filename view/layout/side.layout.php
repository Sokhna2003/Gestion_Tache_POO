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
<body class="bg-gray-50 text-gray-800 font-sans">

  <div class="flex h-screen">
    <aside class="w-1/5 bg-[#1E272E] text-white flex flex-col p-6 space-y-8">
      <a href="<?= path("dashboard","dashboard") ?>" class="text-2xl font-bold text-[#00A8CC] "> 
        <i class="fa-solid fa-check-double mr-2"></i>Gestion Tache
      </a>
      
      <nav class="space-y-2">
        <div class="flex items-center p-3 rounded-lg hover:bg-white/10 cursor-pointer transition">
          <a href="<?= path("dashboard","dashboard") ?>" class="flex items-center space-x-2 w-full">
            <i class="fa-solid fa-house w-6"></i> <span>Dashboard</span>
          </a>
        </div>

        <div class="flex items-center p-3 rounded-lg hover:bg-white/10 cursor-pointer transition">
          <a href="<?= path("tache","liste") ?>" class="flex items-center space-x-2 w-full">
            <i class="fa-solid fa-list-check w-6"></i> <span>Mes Tâches</span>
          </a>
        </div>      
      </nav>
    </aside>
    
    <main class="flex-1 flex flex-col overflow-hidden">
      <header class="h-20 bg-white shadow-sm flex items-center justify-between px-8">
        <h2 class="text-xl font-semibold">Espace Utilisateur</h2>
        
        <div class="flex items-center space-x-6 w-1/2 justify-end">
          <div class="relative w-2/3">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Rechercher une tâche..." 
            class="w-full pl-10 pr-4 py-2 bg-gray-100 rounded-full border-none focus:ring-2 focus:ring-[#00A8CC] outline-none transition">
          </div>
        </div>
      </header>
            
      <div class="flex-1 overflow-y-auto">
          <?= $content ?>
      </div>

    </main>
  </div>

</body>
</html>
