export default function shareButton() {
  const buttonShare = document.querySelector('.js-share-button');

  function showTooltip(e, text) {
    // Create a new tooltip element
    var tooltip = document.createElement('h6');
    tooltip.textContent = text;
    tooltip.style.position = 'absolute';
    tooltip.style.top = e.pageY - 32 + 'px';
    tooltip.style.left = e.pageX + 16 + 'px';
    tooltip.style.backgroundColor = '#B1FCFA';
    tooltip.style.color = '#1D225F';
    tooltip.style.marginBottom = '0';
    tooltip.style.padding = '8px';
    tooltip.style.borderRadius = '8px';
    tooltip.style.opacity = '0';
    tooltip.style.transition = 'opacity 0.3s ease-in-out';

    // Add the tooltip element to the body
    document.body.appendChild(tooltip);

    // Remove the tooltip after one second
    // Fade in the tooltip
    setTimeout(function () {
      tooltip.style.opacity = '1';
    }, 0);

    // Fade out the tooltip after one second
    setTimeout(function () {
      tooltip.style.opacity = '0';
      setTimeout(function () {
        document.body.removeChild(tooltip);
      }, 300); // Wait for the fade-out effect to complete before removing the tooltip
    }, 1000);
  }

  buttonShare.addEventListener('click', (e) => {
    var currentUrl = window.location.href;
    // var currentUrl += '?param1=value1&param2=value2';
    navigator.clipboard.writeText(currentUrl);

    // Example usage: add a click event listener to an element that shows a tooltip
    showTooltip(e, 'Copied!');
  });
}
