<!-- <script type="text/javascript">
  /** 
   * Fix for back button bug 
   */
  window.addEventListener('pageshow', () => {
    document.querySelector('.slide-out').classList.remove('active');
  });
  /**
   * Mobile Navigation
   */
  const mobileNav = () => {
    const menu = document.querySelector('.open-close');
    const slideOut = document.querySelector('.slide-out');
    const mainContent = document.querySelector('.site-main');
    const topLevelLinks = document.querySelectorAll(
      '.nav-parent-menu > .nav-link:not(.static)'
    );


    /**
     * On click, toggle active.
     */
    menu.addEventListener('click', () => {
      var menuText = menu.firstChild.nextElementSibling;
      menuText.innerHTML === 'Menu' ?
        (menuText.innerHTML = 'Close') :
        (menuText.innerHTML = 'Menu');
      menu.classList.toggle('active');
      slideOut.classList.toggle('active');
      mainContent.classList.toggle('active');
    });

    /**
     * On click, add active to submenu item.
     */
    topLevelLinks.forEach((link) => {
      link.addEventListener('click', () => {
        removeActive(link.nextElementSibling);
        link.nextElementSibling.classList.toggle('active');
      });
    });

    /**
     * Remove active from all submenus except the current.
     * @param {string} activeLink
     */
    const removeActive = (activeLink) => {
      topLevelLinks.forEach((link) => {
        if (activeLink !== link.nextElementSibling) {
          link.nextElementSibling.classList.remove('active');
        }
      });
    };
  }
</script> -->
<script>
  if (document.querySelector('.mobile-menu-js')) {
    const topLevelNavItems = document.querySelectorAll('.topLevelNavItem');

    topLevelNavItems.forEach((topLevelNavItem) => {
      topLevelNavItem.addEventListener('mouseover', (e) => {
        const secondLevelNav = topLevelNavItem.querySelector('.secondLevelNav');
        if (secondLevelNav) {
          secondLevelNav.classList.remove('opacity-0');
          secondLevelNav.classList.remove('invisible');
          secondLevelNav.classList.remove('translate-x-1');
        }
      });
      topLevelNavItem.addEventListener('mouseout', (e) => {
        const secondLevelNav = topLevelNavItem.querySelector('.secondLevelNav');
        if (secondLevelNav) {
          secondLevelNav.classList.add('opacity-0');
          secondLevelNav.classList.add('invisible');
          secondLevelNav.classList.add('translate-x-1');
        }
      });
    });

    const mobileMenu = document.querySelector('.mobile-menu-js');
    const mobileMenuX = Array.from(mobileMenu.children);
    const panel = document.querySelector('.panel-js');

    mobileMenu.addEventListener('click', () => {
      if (!mobileMenu.classList.contains('open')) {
        mobileMenu.classList.add('open');
        openAnimation();
        openPanel();
      } else {
        mobileMenu.classList.remove('open');
        closeAnimation();
        closePanel();
      }
    });
    const openAnimation = () => {
      mobileMenuX[0].classList.add('top-1/2', '-translate-y-1/2', '!w-[18px]');
      mobileMenuX[0].classList.remove('top-0');
      mobileMenuX[1].classList.add('scale-0');
      mobileMenuX[2].classList.add('-top-1/2', '-translate-y-1/2', '!w-[18px]');
      mobileMenuX[2].classList.remove('top-0');
      setTimeout(() => {
        mobileMenuX[0].classList.add('rotate-45');
        mobileMenuX[2].classList.add('-rotate-45');
      }, 50);
    };
    const closeAnimation = () => {
      mobileMenuX[0].classList.remove(
        'top-1/2',
        '-translate-y-1/2',
        'rotate-45',
        '!w-[18px]'
      );
      mobileMenuX[1].classList.remove('scale-0', 'origin-center');
      mobileMenuX[2].classList.remove(
        '-top-1/2',
        '-translate-y-1/2',
        '-rotate-45',
        '!w-[18px]'
      );
      mobileMenuX[0].classList.add('top-0');
      mobileMenuX[2].classList.add('top-0');
      setTimeout(() => {
        mobileMenuX[0].classList.remove('rotate-45');
        mobileMenuX[2].classList.remove('-rotate-45');
      }, 50);
    };
    const openPanel = () => {
      panel.classList.remove('opacity-0', 'pointer-events-none', 'invisible');
    };
    const closePanel = () => {
      panel.classList.add('opacity-0', 'pointer-events-none', 'invisible');
    };

    // Target only the first dropdown-item-js and its direct next sibling
    const firstDropdownItem = document.querySelector('.dropdown-item-js');
    const accordionContainer = firstDropdownItem?.nextElementSibling;
    const dropdown = accordionContainer?.querySelector('.dropdown');

    if (dropdown && !dropdown.querySelector('.bg-primary-100')) {
      const allLinks = Array.from(dropdown.querySelectorAll('a'));
      const nonIndented = allLinks.filter(a => !a.classList.contains('ml-base5-3'));

      if (nonIndented.length >= 2) {
        const first = nonIndented[0];
        const second = nonIndented[1];
        const third = nonIndented[2];

        const wrapper = document.createElement('div');
        wrapper.className = 'bg-primary-100 flex flex-col max-h-[70vh] overflow-y-auto p-base5-4 rounded-md';

        first.parentNode.insertBefore(wrapper, first);

        let node = first;
        while (node) {
          const next = node.nextSibling;
          wrapper.appendChild(node);
          if (node === third) break;
          node = next;
        }
      }
    }

    // Accordion logic (unchanged)
    const dropdownItems = document.querySelectorAll('.dropdown-item-js');

    dropdownItems.forEach((item) => {
      const accordionContent = item.nextElementSibling;

      item.addEventListener('click', () => {
        dropdownItems.forEach((otherItem) => {
          if (otherItem !== item) {
            const otherAccordionContent = otherItem.nextElementSibling;
            if (otherAccordionContent) {
              otherAccordionContent.style.maxHeight = null;
              otherItem.querySelector('.rotate-90')?.classList.remove('scale-0');
            }
          }
        });

        const icon = item.querySelector('.rotate-90');
        if (accordionContent.style.maxHeight) {
          accordionContent.style.maxHeight = null;
          icon?.classList.remove('scale-0');
        } else {
          accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
          icon?.classList.add('scale-0');
        }
      });
    });

    /** Back button fix */
    window.addEventListener('pageshow', () => {
      if (mobileMenu.classList.contains('open')) {
        /** Reset hamburger */
        mobileMenu.classList.remove('open');
        closeAnimation();
        /** Close panel */
        closePanel();
        /** Close all dropdowns */
        dropdownItems.forEach((item) => {
          const accordionContent = item.nextElementSibling;
          dropdownItems.forEach((otherItem) => {
            if (otherItem !== item) {
              const otherAccordionContent = otherItem.nextElementSibling;
              if (otherAccordionContent) {
                otherAccordionContent.style.maxHeight = null;
                otherItem.querySelector('.rotate-90').classList.remove('scale-0');
              }
            }
          });
        })
      }
    });
  }
  var marks = document.querySelectorAll('mark.has-inline-color');

  marks.forEach(function(mark) {
    if (mark.style.backgroundColor === 'rgba(0, 0, 0, 0)') {
      mark.style.paddingLeft = '0';
      mark.style.paddingRight = '0';
    }
  });
</script>