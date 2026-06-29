<section class="p-8">
  <div class="flex justify-between items-center mb-8">
    <h2 class="text-2xl font-bold">Liste des tâches</h2>
    <div class="flex space-x-3">
      <button class="px-4 py-2 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 flex items-center font-semibold">
          <i class="fa-solid fa-filter mr-2 text-gray-500"></i> Filtrer
      </button>
      <a href="<?= path("tache","ajout") ?>" class="px-4 py-2 bg-[#00A8CC] text-white rounded-lg shadow-md hover:bg-[#0092B0] transition font-semibold">
        + Ajouter une tâche
      </a>
    </div>
  </div>
  <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
      <thead class="bg-gray-50 border-b border-gray-100">
        <tr>
          <th class="p-4 text-gray-500 font-semibold uppercase text-xs tracking-wider">Libellé</th>
          <th class="p-4 text-gray-500 font-semibold uppercase text-xs tracking-wider">Dates Début</th>
          <th class="p-4 text-gray-500 font-semibold uppercase text-xs tracking-wider">Dates Fin</th>
          <th class="p-4 text-gray-500 font-semibold uppercase text-xs tracking-wider">Description</th>
          <th class="p-4 text-gray-500 font-semibold uppercase text-xs tracking-wider">Statut</th>
          <th class="p-4 text-gray-500 font-semibold uppercase text-xs tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-50">
        <?php if(empty($taches)): ?>
          <tr><td colspan="6" class="p-8 text-center text-gray-400">Aucune tâche enregistrée.</td></tr>
        <?php else: ?>
          <?php foreach ($taches as $tache): ?>
          <tr class="hover:bg-gray-50/50 transition">
            <td class="p-4 font-bold text-gray-700"><?= htmlspecialchars($tache["libelle"]) ?></td>
            <td class="p-4 text-sm text-gray-700"><?= htmlspecialchars($tache["date_debut"]) ?></td>
            <td class="p-4 text-sm text-gray-700"><?= htmlspecialchars($tache["date_fin"]) ?></td>
            <td class="p-4 text-gray-600 truncate max-w-xs" title="<?= htmlspecialchars($tache["description"]) ?>"><?= htmlspecialchars($tache["description"]) ?></td>
            <td class="p-4">
              <!-- Sécurisation et nettoyage de la chaîne de statut -->
              <?php 
                $statusClean = trim($tache['statut']);
              ?>
              <?php if ($statusClean === 'Terminee' || $statusClean === 'Terminer'): ?>
                  <span class="px-2.5 py-1 text-xs font-semibold rounded-full text-green-800 bg-green-100">
                    Terminée
                  </span>
              <?php else: ?>
                  <span class="px-2.5 py-1 text-xs font-semibold rounded-full text-amber-800 bg-amber-100">
                    En cours
                  </span>
              <?php endif; ?>
            </td>
            <td class="p-4">
              <div class="flex items-center space-x-4">
                <a href="<?= path("tache","detail") ?>&id=<?= $tache["id_tache"] ?>" class="text-blue-500 hover:text-blue-700 transition" title="Détails">
                    <i class="fa-solid fa-eye text-lg"></i>
                </a>
                <a href="<?= path("tache","terminer") ?>&id=<?= $tache["id_tache"] ?>" class="text-green-500 hover:text-green-700 transition" title="Terminer">
                    <i class="fa-solid fa-circle-check text-lg"></i>
                </a>
                <a href="<?= path("tache","supprimer") ?>&id=<?= $tache["id_tache"] ?>" class="text-red-400 hover:text-red-600 transition" title="Supprimer">
                    <i class="fa-solid fa-trash-can text-lg"></i>
                </a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>
