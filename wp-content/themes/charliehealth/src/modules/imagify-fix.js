export default function imagifyPictureTagClasses() {
  // Get all <picture> tags on the page
  const pictureTags = document.querySelectorAll('picture');

  if (pictureTags) {
    // Loop through each <picture> tag
    pictureTags.forEach((pictureTag) => {
      // Get the first <img> tag within the <picture> tag
      const imgTag = pictureTag.querySelector('img');

      // Get the classes on the <picture> tag
      const classes = pictureTag.classList;

      // Loop through each class on the <picture> tag
      classes.forEach((className) => {
        // Add the class to the <img> tag
        imgTag.classList.add(className);
      });

      // Remove all classes from the <picture> tag
      pictureTag.className = '';
    });
  }
}
