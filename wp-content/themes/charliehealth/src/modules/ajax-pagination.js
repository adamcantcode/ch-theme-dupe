import { pagintion } from 'paginationjs';

// import styles bundle
import 'paginationjs/dist/pagination.css';

export default function ajaxPagination() {
  // Set the endpoint for the REST API
  var endpoint = `${window.location.origin}/wp-json/wp/v2/posts`;
  const postsContainer = document.querySelector('.posts-container');
  const postsDataContainer = document.querySelector('.posts-data-container');

  // Make a request to the REST API endpoint
  fetch(endpoint)
    .then(function (response) {
      // Convert the response to JSON
      return response.json();
    })
    .then(function (posts) {
      console.log(posts);
      // Loop through each post and output its title and content
      jQuery('.posts-container').pagination({
        dataSource: posts,
        pageSize: 1,
        pageRange: 1,
        callback: function (data, pagination) {
          var dataHtml = '<ul>';
          jQuery.each(data, function (index, item) {
            console.log(item);
            dataHtml += '<li>' + item.title.rendered + '</li>';
          });
          dataHtml += '</ul>';
          jQuery('.posts-data-container').html(dataHtml);
        },
      });
      // posts.forEach((post) => {
      //   var postItem = document.createElement('h3');
      //   console.log(post.title.rendered);
      //   postItem.innerHTML = post.title.rendered;
      //   postsContainer.appendChild(postItem);
      //   console.log(postItem);
      // });
    })
    .catch(function (error) {
      // Handle any errors that occur during the request
      console.error(error);
    });
}
