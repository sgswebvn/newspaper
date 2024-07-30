document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu
    const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
      mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
      mobileMenu.classList.toggle('hidden');
    });

});
document.addEventListener('DOMContentLoaded', function() {
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');

    // Toggle menu visibility
    userMenuButton.addEventListener('click', () => {
      const isExpanded = userMenu.classList.contains('opacity-100');
      if (isExpanded) {
        userMenu.classList.add('opacity-0', 'scale-95');
        userMenu.classList.remove('opacity-100', 'scale-100');
        userMenu.classList.add('transition', 'ease-in', 'duration-75');
        // Add delay to hide the menu after transition
        setTimeout(() => userMenu.classList.add('hidden'), 75);
        userMenuButton.setAttribute('aria-expanded', 'false');
      } else {
        userMenu.classList.remove('hidden');
        userMenu.classList.add('transition', 'ease-out', 'duration-100', 'opacity-100', 'scale-100');
        userMenu.classList.remove('opacity-0', 'scale-95');
        userMenuButton.setAttribute('aria-expanded', 'true');
      }
    });

    // Close the menu if clicked outside
    document.addEventListener('click', (event) => {
      if (!userMenu.contains(event.target) && !userMenuButton.contains(event.target)) {
        if (!userMenu.classList.contains('hidden')) {
          userMenu.classList.add('opacity-0', 'scale-95');
          userMenu.classList.remove('opacity-100', 'scale-100');
          userMenu.classList.add('transition', 'ease-in', 'duration-75');
          setTimeout(() => userMenu.classList.add('hidden'), 75);
          userMenuButton.setAttribute('aria-expanded', 'false');
        }
      }
    });
  });
   // start: Sidebar
   const sidebarToggle = document.querySelector('.sidebar-toggle')
   const sidebarOverlay = document.querySelector('.sidebar-overlay')
   const sidebarMenu = document.querySelector('.sidebar-menu')
   const main = document.querySelector('.main')
   sidebarToggle.addEventListener('click', function (e) {
       e.preventDefault()
       main.classList.toggle('active')
       sidebarOverlay.classList.toggle('hidden')
       sidebarMenu.classList.toggle('-translate-x-full')
   })
   sidebarOverlay.addEventListener('click', function (e) {
       e.preventDefault()
       main.classList.add('active')
       sidebarOverlay.classList.add('hidden')
       sidebarMenu.classList.add('-translate-x-full')
   })
   document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
       item.addEventListener('click', function (e) {
           e.preventDefault()
           const parent = item.closest('.group')
           if (parent.classList.contains('selected')) {
               parent.classList.remove('selected')
           } else {
               document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                   i.closest('.group').classList.remove('selected')
               })
               parent.classList.add('selected')
           }
       })
   })
   // end: Sidebar



   // start: Popper
   const popperInstance = {}
   document.querySelectorAll('.dropdown').forEach(function (item, index) {
       const popperId = 'popper-' + index
       const toggle = item.querySelector('.dropdown-toggle')
       const menu = item.querySelector('.dropdown-menu')
       menu.dataset.popperId = popperId
       popperInstance[popperId] = Popper.createPopper(toggle, menu, {
           modifiers: [
               {
                   name: 'offset',
                   options: {
                       offset: [0, 8],
                   },
               },
               {
                   name: 'preventOverflow',
                   options: {
                       padding: 24,
                   },
               },
           ],
           placement: 'bottom-end'
       });
   })
   document.addEventListener('click', function (e) {
       const toggle = e.target.closest('.dropdown-toggle')
       const menu = e.target.closest('.dropdown-menu')
       if (toggle) {
           const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
           const popperId = menuEl.dataset.popperId
           if (menuEl.classList.contains('hidden')) {
               hideDropdown()
               menuEl.classList.remove('hidden')
               showPopper(popperId)
           } else {
               menuEl.classList.add('hidden')
               hidePopper(popperId)
           }
       } else if (!menu) {
           hideDropdown()
       }
   })

   function hideDropdown() {
       document.querySelectorAll('.dropdown-menu').forEach(function (item) {
           item.classList.add('hidden')
       })
   }
   function showPopper(popperId) {
       popperInstance[popperId].setOptions(function (options) {
           return {
               ...options,
               modifiers: [
                   ...options.modifiers,
                   { name: 'eventListeners', enabled: true },
               ],
           }
       });
       popperInstance[popperId].update();
   }
   function hidePopper(popperId) {
       popperInstance[popperId].setOptions(function (options) {
           return {
               ...options,
               modifiers: [
                   ...options.modifiers,
                   { name: 'eventListeners', enabled: false },
               ],
           }
       });
   }
   // end: Popper



   // start: Tab
   document.querySelectorAll('[data-tab]').forEach(function (item) {
       item.addEventListener('click', function (e) {
           e.preventDefault()
           const tab = item.dataset.tab
           const page = item.dataset.tabPage
           const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]')
           document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
               i.classList.remove('active')
           })
           document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
               i.classList.add('hidden')
           })
           item.classList.add('active')
           target.classList.remove('hidden')
       })
   })
   // end: Tab



   // start: Chart
   new Chart(document.getElementById('order-chart'), {
       type: 'line',
       data: {
           labels: generateNDays(7),
           datasets: [
               {
                   label: 'Active',
                   data: generateRandomData(7),
                   borderWidth: 1,
                   fill: true,
                   pointBackgroundColor: 'rgb(59, 130, 246)',
                   borderColor: 'rgb(59, 130, 246)',
                   backgroundColor: 'rgb(59 130 246 / .05)',
                   tension: .2
               },
               {
                   label: 'Completed',
                   data: generateRandomData(7),
                   borderWidth: 1,
                   fill: true,
                   pointBackgroundColor: 'rgb(16, 185, 129)',
                   borderColor: 'rgb(16, 185, 129)',
                   backgroundColor: 'rgb(16 185 129 / .05)',
                   tension: .2
               },
               {
                   label: 'Canceled',
                   data: generateRandomData(7),
                   borderWidth: 1,
                   fill: true,
                   pointBackgroundColor: 'rgb(244, 63, 94)',
                   borderColor: 'rgb(244, 63, 94)',
                   backgroundColor: 'rgb(244 63 94 / .05)',
                   tension: .2
               },
           ]
       },
       options: {
           scales: {
               y: {
                   beginAtZero: true
               }
           }
       }
   });

   function generateNDays(n) {
       const data = []
       for(let i=0; i<n; i++) {
           const date = new Date()
           date.setDate(date.getDate()-i)
           data.push(date.toLocaleString('en-US', {
               month: 'short',
               day: 'numeric'
           }))
       }
       return data
   }
   function generateRandomData(n) {
       const data = []
       for(let i=0; i<n; i++) {
           data.push(Math.round(Math.random() * 10))
       }
       return data
   }
   // end: Chart