export default function ajaxPagination() {
  // Set the endpoint for the REST API
  var endpoint = `${window.location.origin}/wp-json/wp/v2/posts`;
  const postsContainer = document.querySelector('.posts-container');

  // Make a request to the REST API endpoint
  fetch(endpoint)
    .then(function (response) {
      // Convert the response to JSON
      return response.json();
    })
    .then(function (posts) {
      // Loop through each post and output its title and content
      posts.forEach(post => {
        var postItem = document.createElement('h3');
        console.log(post.title.rendered);
        postItem.innerHTML = post.title.rendered;
        postsContainer.appendChild(postItem);
        console.log(postItem);
        
      });
    })
    .catch(function (error) {
      // Handle any errors that occur during the request
      console.error(error);
    });
}
