export default function readTime() {
  // Get the main container that holds the article content
  var mainContainer = document.querySelector('#articleContent');

  const text = mainContainer.innerText;
  const wpm = 238;
  const words = text.trim().split(/\s+/).length;
  const readTime = Math.ceil(words / wpm);

  document.querySelector('.js-read-time').innerHTML = readTime;
}
