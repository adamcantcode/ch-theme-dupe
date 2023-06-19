import { pagination } from 'paginationjs';
import { gsap } from 'gsap';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';

gsap.registerPlugin(ScrollToPlugin);

export default function ajaxPagination() {
  const initPagination = (tagID) => {
    const bodyClasses = Array.from(document.body.classList);
    const postsPerPage = 6;
    var [endpoint] = getEndpoint(bodyClasses, tagID);
    renderPagination(postsPerPage, endpoint, tagID);
  };

  const renderPagination = (postsPerPage, endpoint, tagID) => {
    jQuery('.pagination-container').pagination({
      dataSource: function (done) {
        fetch(`${endpoint}&_fields=id`)
          .then(function (response) {
            return response.headers.get('X-WP-Total');
          })
          .then(function (totalPosts) {
            // Calculate the number of pages needed to display all posts
            var numPages = Math.ceil(totalPosts / postsPerPage);

            // Return an array of page numbers to be used as the data source for Pagination.js
            var data = [];
            for (var i = 1; i <= numPages; i++) {
              data.push(i);
            }
            done(data);
          });
      },
      pageSize: 1,
      pageRange: 2,
      ulClassName: 'items-center justify-center',
      prevText: `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
      <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
      <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
      <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
    </svg>`,
      nextText: `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
      <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
      <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
      <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
    </svg>`,
      callback: function (data, pagination) {
        console.log(data);
        console.log(pagination);

        // var url = window.location.href.split('?')[0] + '?page=' + data[0];
        jQuery('.pagination-container .paginationjs-page').each(function (
          index,
          element
        ) {
          var page = jQuery(element).data('num');
          var link = jQuery(element).find('a');
          jQuery(link).attr('href', window.location.href + '/page/' + page);
        });

        const bodyClasses = Array.from(document.body.classList);
        var [endpoint] = getEndpoint(bodyClasses, tagID);

        jQuery('.posts-container').addClass('opacity-0 scale-[0.99]');

        endpoint += `&page=${data}&per_page=${postsPerPage}`;
        console.log(endpoint);

        fetch(endpoint)
          .then(function (response) {
            return response.json();
          })
          .then(function (posts) {
            if (posts.length > 0) {
              const noPosts = document.querySelector('.no-posts-js');
              const pagination = document.querySelector(
                '.pagination-container'
              );
              const postsContainer = document.querySelector('.posts-container');

              pagination.classList.remove('noshow');
              postsContainer.classList.remove('noshow');

              noPosts.classList.add('opacity-0');
              noPosts.classList.add('invisible');
              noPosts.classList.add('absolute');

              var html = '';
              posts.forEach(function (post) {
                html += renderHTML(post, html);
              });
              jQuery('.posts-container').html(html);
              jQuery('.posts-container').removeClass('opacity-0 scale-[0.99]');
            } else {
              const noPosts = document.querySelector('.no-posts-js');
              const pagination = document.querySelector(
                '.pagination-container'
              );
              const postsContainer = document.querySelector('.posts-container');

              pagination.classList.add('noshow');
              postsContainer.classList.add('noshow');

              noPosts.classList.remove('opacity-0');
              noPosts.classList.remove('invisible');
              noPosts.classList.remove('absolute');
            }
          });
      },
      afterPageOnClick: function () {
        scollToPostsContainer();
      },
      afterNextOnClick: function () {
        scollToPostsContainer();
      },
      afterPreviousOnClick: function () {
        scollToPostsContainer();
      },
    });
  };

  const scollToPostsContainer = () => {
    // TODO update scroll to for press, different anchor
    gsap.to(window, {
      duration: 1,
      ease: 'Power2.easeInOut',
      scrollTo: '#postsContainer',
      scrollTo: {
        y: '#postsContainer',
        offsetY: (self) => document.querySelector('header').offsetHeight,
      },
    });
  };

  const removeTagActive = (tags = document.querySelectorAll('.js-tag-id')) => {
    tags.forEach((tag) => {
      tag.classList.remove('active');
    });
  };

  const termsClickHandler = () => {
    var tags = document.querySelectorAll('.js-tag-id');
    var reset = document.querySelector('.js-reset');
    tags.forEach((tag) => {
      tag.addEventListener('click', (e) => {
        var tagID = e.target.getAttribute('data-tag-id');

        removeTagActive();
        e.target.classList.add('active');
        reset.classList.remove('opacity-0', 'invisible');
        initPagination(tagID);
        scollToPostsContainer();
      });
    });

    if (reset) {
      reset.addEventListener('click', (e) => {
        reset.classList.add('opacity-0', 'invisible');
        removeTagActive();
        initPagination();
        scollToPostsContainer();
      });
    }
  };

  const getEndpoint = (bodyClasses, tagID) => {
    let endpoint = `${window.location.origin}/wp-json/wp/v2/posts?_embed&_fields=link,title,acf,_links,_embedded&_embed`;

    if (bodyClasses.includes('category')) {
      var categories = bodyClasses.map((str) => str.replace('category-', ''));

      categories.forEach((category) => {
        if (!isNaN(category)) {
          var categoryID = category;
          endpoint += `&categories=${categoryID}`;
        }
      });
      if (tagID) {
        endpoint += `&tags=${tagID}`;
      }
    } else if (bodyClasses.includes('tag')) {
      var categories = bodyClasses.map((str) => str.replace('tag-', ''));

      categories.forEach((tag) => {
        if (!isNaN(tag)) {
          var tagID = tag;
          endpoint += `&tags=${tagID}`;
        }
      });
    } else if (bodyClasses.includes('page-template-searchpage')) {
      const params = new URLSearchParams(window.location.search);
      const query = encodeURIComponent(params.get('query'));

      endpoint += `&search=${query}`;
    } else if (bodyClasses.includes('single-authors')) {
      var author = bodyClasses.map((str) => str.replace('postid-', ''));

      author.forEach((author) => {
        if (!isNaN(author)) {
          var authorID = author;
          endpoint += `&by_author=${authorID}`;
        }
      });
    } else if (bodyClasses.includes('single-medical-reviewer')) {
      var medicalReviewer = bodyClasses.map((str) =>
        str.replace('postid-', '')
      );

      medicalReviewer.forEach((medicalReviewer) => {
        if (!isNaN(medicalReviewer)) {
          var medicalReviewerID = medicalReviewer;
          endpoint = `${window.location.origin}/wp-json/wp/v2/research?_embed&_fields=link,title,acf,_links,_embedded&_embed`;
          endpoint += `&medical_reviewer=${medicalReviewerID}`;
        }
      });
    } else if (bodyClasses.includes('page-template-page-press')) {
      endpoint = `${window.location.origin}/wp-json/wp/v2/press?_embed&_fields=link,title,acf,_links,_embedded&_embed`;
    }
    return [endpoint, tagID];
  };

  const renderHTML = (post, html) => {
    console.log(post);
    var imageUrl = `${window.location.origin}/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp`;
    var imageAlt = `Featured image for ${post.title.rendered}`;

    /** NOTE Handle images */
    // Make sure embeded exists
    if (post._embedded) {
      // Check for featured image
      if (post._embedded['wp:featuredmedia']) {
        // Check for cropped image size
        if (
          post._embedded['wp:featuredmedia'][0].media_details.sizes[
            'card-thumb'
          ]
        ) {
          // Use card-thumb size
          imageUrl =
            post._embedded['wp:featuredmedia'][0].media_details.sizes[
              'card-thumb'
            ].source_url;
          // Check for alt text
          if (post._embedded['wp:featuredmedia'][0].alt_text) {
            imageAlt = post._embedded['wp:featuredmedia'][0].alt_text;
          } else {
            imageAlt = `Featured image for ${post.title.rendered}`;
          }
        } else {
          // Use orignal size
          imageUrl = post._embedded['wp:featuredmedia'][0].source_url;
        }
      }
    }

    // If not press page
    if (
      !document
        .querySelector('body')
        .classList.contains('page-template-page-press')
    ) {
      if (post._embedded['wp:term']) {
        var cats = post._embedded['wp:term'][0];
      }
      if (post._embedded['wp:term']) {
        var tags = post._embedded['wp:term'][1];
      }
      html = `<div class="relative grid overflow-hidden border rounded-sm border-card-border hover:shadow-lg duration-300">
                  <img src="${imageUrl}" alt="${imageAlt}" class="object-cover lg:h-[220px] h-[150px] w-full">
                  <div class="grid p-sp-4">
                    <h3><a href="${post.link}" class="stretched-link">${post.title.rendered}</a></h3>
                    <h5 class="mb-sp-4">${post.acf.by_author.post_title}</h5>
                    <div class="grid justify-start grid-flow-col gap-sp-4 items-end">`;
      if (tags) {
        html += `${tags
          .map(
            (tag) =>
              `<a href="${tag.link}" class="px-sp-4 py-sp-3 no-underline rounded-lg text-h6 bg-tag-gray z-20 relative inline-block hover:bg-bright-teal">${tag.name}</a>`
          )
          .join('')}`;
      }
      html += `</div>
                    </div>
                    </div>`;
    } else {
      html = `<div class="relative grid lg:grid-cols-[1fr_4fr] grid-cols-[1fr_2fr] overflow-hidden border rounded-sm border-card-border">
      <img src="${imageUrl}" alt="${imageAlt}" class="object-contain h-[125px] w-full lg:p-sp-6 p-sp-3">
      <div class="grid p-sp-4">
        <p class="mb-sp-4">${post.acf.date}</p>
        <h3 class="mb-0"><a href="${post.acf.link}" target="_blank" class="stretched-link">${post.title.rendered}</a></h3>
      </div>
    </div>`;
    }
    return html;
  };

  termsClickHandler();
  initPagination();
}
