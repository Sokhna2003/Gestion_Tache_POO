<section class="max-w-2xl mx-auto px-4 mt-8">
  <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden p-6">
    <div class="flex justify-between items-start mb-4">
      <h2 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($tache['libelle']) ?></h2>
      <span class="px-2.5 py-1 text-xs font-semibold rounded-full <?= $tache['statut'] === 'Terminee' ? 'text-green-800 bg-green-100' : 'text-amber-800 bg-amber-100' ?>">
        <?= htmlspecialchars($tache['statut']) ?>
      </span>
    </div>
    
    <div class="grid grid-cols-2 gap-4 text-sm text-gray-500 mb-6 bg-gray-50 p-3 rounded-lg">
      <div><i class="fa-solid fa-calendar-days mr-2"></i>Début : <strong><?= htmlspecialchars($tache['date_debut']) ?></strong></div>
      <div><i class="fa-solid fa-calendar-check mr-2"></i>Échéance : <strong><?= htmlspecialchars($tache['date_fin']) ?></strong></div>
    </div>

    <div class="mb-6">
      <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-2">Description</h3>
      <p class="text-gray-700 bg-gray-50/50 p-4 rounded-lg border border-gray-100 whitespace-pre-line">
        <?= htmlspecialchars($tache['description']) ?>
      </p>
    </div>

    <div class="flex justify-end space-x-3 border-t border-gray-100 pt-4">
      <a href="<?= path("tache","liste") ?>" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold transition">
        Retour à la liste
      </a>
      <?php if($tache['statut'] !== 'Terminee'): ?>
        <a href="<?= path("tache","terminer") ?>&id=<?= $tache['id_tache'] ?>" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-semibold transition">
          Marquer comme terminée
        </a>
      <?php endif; ?>
    </div>
  </div>
</section>
