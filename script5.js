const boutons = document.querySelectorAll('.js-button-voir-avis-supp')
const animals = document.querySelectorAll('.js-clic')

boutons.forEach(function (bouton) {
    bouton.addEventListener('click', function(e) {
      this.classList.add('hidden');
      e.stopPropagation();
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    // Vérifie si le mode contraste élevé est déjà activé
    if (localStorage.getItem('highContrast') === 'true') {
        document.body.classList.add('high-contrast');
        document.getElementById('contrastToggle').checked = true; // Coche le toggle
    }
    
    document.getElementById('contrastToggle').addEventListener('change', function() {
      // Bascule entre le mode contraste élevé et le mode normal
      document.body.classList.toggle('high-contrast', this.checked);
      
      // Mémorise l'état du mode contraste élevé
      if (this.checked) {
          localStorage.setItem('highContrast', 'true');
      } else {
          localStorage.setItem('highContrast', 'false');
      }
  });
});


