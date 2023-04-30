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
        pageSize: 3,
        pageRange: 1,
        callback: function (data, pagination) {
          var dataHtml = '';
          jQuery.each(data, function (index, item) {
            console.log(item);
            dataHtml += `<div class="relative grid overflow-hidden border rounded-sm border-card-border">
              <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
              <div class="grid p-sp-4">
                <h3><a href="${item.link}" class="stretched-link lg:text-h3-lg text-h3">${item.title.rendered}</a></h3>
                <h5>author</h5>
                <div>tags tags</div>
              </div>
            </div>`;
          });
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
