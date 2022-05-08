
var myModal = document.getElementById('staticBackdrop')
var myInput = document.getElementById('idBtnDetalle')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})