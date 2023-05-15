import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  const tabs = document.querySelectorAll('.tabs');
  const tabContents = document.querySelectorAll('.tab-contents');

  tabs.forEach((tab) => {
    tab.addEventListener('click', (e) => {
      let tabID = e.target.getAttribute('data-tab');
      let tabContent = document.querySelector(`[data-tab-content='${tabID}']`);

      removeActive();
      e.target.classList.add('active');
      tabContent.classList.add('active');
      setTimeout(() => {
        tabContent.style.opacity = 1;
      }, 10);
    });
  });
  const removeActive = () => {
    tabs.forEach((tab) => {
      tab.classList.remove('active');
    });
    tabContents.forEach((contents) => {
      contents.classList.remove('active');
      setTimeout(() => {
        contents.style.opacity = 0;
      }, 10);
    });
  };
});
