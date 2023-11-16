  // Get the modal and button elements
  var registrationModal = document.getElementById('registrationModal');
  var openModalButton = document.getElementById('openModalButton');
  var closeModalButton = document.getElementById('closeModalButton');

  // Event listener to open the modal when the button is clicked
  openModalButton.addEventListener('click', function () {
      registrationModal.style.display = 'block';
  });

  // Event listener to close the modal when the close button is clicked
  closeModalButton.addEventListener('click', function () {
      registrationModal.style.display = 'none';
  });

  // Event listener to close the modal if the user clicks outside of it
  window.addEventListener('click', function (event) {
      if (event.target == registrationModal) {
          registrationModal.style.display = 'none';
      }
  });

  // Event listener to prevent the modal from closing if the user clicks inside the modal
  registrationModal.addEventListener('click', function (event) {
      event.stopPropagation();
  });