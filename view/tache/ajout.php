<section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 mb-12">
  <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Ajouter une Tâche</h2>
    
    <form action="<?= path("tache","ajout") ?>" method="POST" class="space-y-4">

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label for="libelle" class="block text-sm font-semibold text-gray-700 mb-1">Libellé <span class="text-red-500">*</span></label>
          <input type="text" name="libelle" id="libelle" placeholder="Entrer libellé"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
          <span class="text-red-600 text-xs mt-1 block"> <?= $errors["libelle"] ?? "" ?></span>
        </div>
      </div> 

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="date_debut" class="block text-sm font-semibold text-gray-700 mb-1">Date début <span class="text-red-500">*</span></label>
            <input type="date" name="date_debut" 
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm">
            <span class="text-red-600 text-xs mt-1 block"> <?= $errors["date_debut"] ?? "" ?></span>
        </div>
        <div>
            <label for="date_fin" class="block text-sm font-semibold text-gray-700 mb-1">Date fin <span class="text-red-500">*</span></label>
            <input type="date" name="date_fin" 
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm">
            <span class="text-red-600 text-xs mt-1 block"> <?= $errors["date_fin"] ?? "" ?></span>
        </div>
      </div>

      <div>
          <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description <span class="text-red-500">*</span></label>
          <textarea name="description" rows="3" placeholder="Détails de la tâche..." 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none resize-none"></textarea>
          <span class="text-red-600 text-xs mt-1 block"> <?= $errors["description"] ?? "" ?></span>
      </div>

      <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">Statut <span class="text-red-500">*</span></label>
          <select name="statut" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-500 outline-none appearance-none">
              <option value="En cours">En cours</option>
              <option value="Terminee">Terminée</option>
          </select>
          <span class="text-red-600 text-xs mt-1 block"> <?= $errors["statut"] ?? "" ?></span>
      </div>
        
      <input type="hidden" name="controller" value="tache">
      <input type="hidden" name="action" value="ajout">

      <div class="pt-4 flex flex-col space-y-2">
        <button type="submit" name="ajout" value="add_tache" 
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
          Enregistrer
        </button>
        <a href="<?= path("tache","liste") ?>" class="text-center text-sm text-gray-500 hover:text-gray-700 transition font-medium py-2">
          Annuler
        </a>
      </div>
    </form>
  </div>
</section>
