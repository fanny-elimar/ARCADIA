const boutons = document.querySelectorAll('.js-button-voir-avis-supp')



boutons.forEach(function (bouton) {
    bouton.addEventListener('click', function(e) {
      this.classList.add('hidden');
      e.stopPropagation();
    });
    
    
  });

 