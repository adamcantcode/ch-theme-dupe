export default function outreachModals() {
  const members = document.querySelectorAll('div[data-modal-id]');
  const modals = document.querySelectorAll('div[data-modal]');

  members.forEach((member) => {
    const id = member.getAttribute('data-modal-id');
    member.addEventListener('click', () => {
      let modal = document.querySelector(`div[data-modal="${id}"]`);
      modal.classList.toggle('modal-fade');
    });
  });

  modals.forEach((modal) => {
    modal.addEventListener('click', (event) => {
      if (event.target.getAttribute('data-modal')) {
        modal.classList.toggle('modal-fade');
      }
    });

    const closeButton = modal.querySelector('.modal-close');

    closeButton.addEventListener('click', () => {
      modal.classList.toggle('modal-fade');
    });
  });
}
