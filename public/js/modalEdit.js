const editModal = document.getElementById('editModal')
editModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const id = button.getAttribute('data-id')
    const title = button.getAttribute('data-title')
    
    editModal.querySelector('#edit-id').value = id
    editModal.querySelector('#edit-title').value = title
})