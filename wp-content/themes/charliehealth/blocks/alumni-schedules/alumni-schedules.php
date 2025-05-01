<h1 class="mb-8 text-4xl font-bold">Charlie Health Alumni Schedule</h1>

<!-- Filters -->
<div class="mb-10 space-y-4">
  <input id="searchInput" type="text" placeholder="Search events..." class="w-full p-2 border rounded" />

  <div id="tagFilters" class="flex flex-wrap gap-2"></div>

  <div class="flex gap-4">
    <select id="dayFilter" class="p-2 border rounded">
      <option value="">Filter by day</option>
    </select>

    <select id="timeFilter" class="p-2 border rounded" disabled>
      <option value="">Filter by time</option>
    </select>
  </div>
</div>

<!-- Schedule Container -->
<div id="schedule" class="space-y-12"></div>

<script>
  const scheduleData = {
    "adult": [{
      "day": "Monday",
      "events": [{
          "time": "12:00pm MT",
          "title": "Adult 18+ Monday Process Group",
          "tag": "Peer Process",
          "description": "Continue to stay in community with other Charlie Health Alumni while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group, but it will center around emerging topics attendees bring to the group. If the group would like to center on one specific topic, participants are welcome to do so."
        },
        {
          "time": "12:00pm MT",
          "title": "Adult 18+ Monday Body Doubling",
          "tag": "Skills and Well-Being",
          "description": "Are you neurodivergent, or do you have trouble staying focused enough to finish big tasks or detailed projects? Join us for our body doubling support group, which offers guidance and accountability to help you complete your tasks and achieve your goals. Body doubling can increase focus, reduce anxiety, and provide you with the motivation you need to take on and complete tasks or projects."
        },
        {
          "time": "12:00pm MT",
          "title": "Adult 18+ Mindful Monday",
          "tag": "Skills and Well-Being",
          "description": "Join for a weekly pause to practice being present and chill out for a moment."
        },
        {
          "time": "3:00pm MT",
          "title": "Adult 18+ Monday Self Compassion",
          "tag": "Skills and Well-Being",
          "description": "The Mindful Self Compassion group is based on the research and work of Kristen Neff, PhD. Kristen Neff has created a workbook and program that she describes as, “a proven way to accept yourself, build inner strength, and thrive.” Join us to learn to embrace yourself and your imperfections and grow the resilience you need to thrive!"
        },
        {
          "time": "3:00pm MT",
          "title": "Adult 18+ Trivia",
          "tag": "Interests and Workshops",
          "description": "Join us for a lively and engaging Trivia Hour! Test your knowledge across a variety of fun topics, from pop culture and history to science and beyond. Work solo or in teams, enjoy friendly competition, and connect with others in a relaxed and entertaining group setting. Perfect for all trivia enthusiasts!"
        },
        {
          "time": "3:00pm MT",
          "title": "Adult 30+ Navigating Workplace Challenges",
          "tag": "Skills and Well-Being & Identity",
          "description": "Join us for a supportive and skill-building space where you can process workplace struggles, celebrate successes, and learn strategies to overcome obstacles and build a fulfilling career. This group is open to alumni who are 30 years of age or older."
        }
      ]
    }]
  };

  const getTagStyle = (tag) => ({
    "Peer Process": "bg-[#e6e8ff] text-[#5a67d8]",
    "Skills and Well-Being": "bg-[#e6e8ff] text-[#5a67d8]",
    "Skills and Well-Being & Identity": "bg-[#ffe4cc] text-[#b45309]",
    "Interests and Workshops": "bg-[#e0f2fe] text-[#0284c7]"
  }[tag] || "bg-gray-100 text-gray-700");

  const scheduleContainer = document.getElementById('schedule');
  const searchInput = document.getElementById('searchInput');
  const tagFilters = document.getElementById('tagFilters');
  const dayFilter = document.getElementById('dayFilter');
  const timeFilter = document.getElementById('timeFilter');

  let allEvents = [];

  function extractEvents(data) {
    return Object.entries(data).flatMap(([group, days]) =>
      days.flatMap(dayBlock =>
        dayBlock.events.map(event => ({
          ...event,
          group,
          day: dayBlock.day
        }))
      )
    );
  }

  function renderFilters(events) {
    // Populate tag filters
    const uniqueTags = [...new Set(events.map(e => e.tag))];
    tagFilters.innerHTML = uniqueTags.map(tag => `
      <label class="inline-flex items-center gap-1 text-sm cursor-pointer">
        <input type="checkbox" class="tag-filter" value="${tag}" />
        ${tag}
      </label>
    `).join('');

    // Populate day dropdown
    const uniqueDays = [...new Set(events.map(e => e.day))];
    dayFilter.innerHTML += uniqueDays.map(day => `<option value="${day}">${day}</option>`).join('');
  }

  function updateTimeOptions(selectedDay) {
    const timesForDay = [...new Set(allEvents
      .filter(e => e.day === selectedDay)
      .map(e => e.time))];

    timeFilter.disabled = !selectedDay;
    timeFilter.innerHTML = `<option value="">Filter by time</option>` +
      timesForDay.map(t => `<option value="${t}">${t}</option>`).join('');
  }

  function filterEvents() {
    const search = searchInput.value.toLowerCase();
    const selectedTags = Array.from(document.querySelectorAll('.tag-filter:checked')).map(cb => cb.value);
    const selectedDay = dayFilter.value;
    const selectedTime = timeFilter.value;

    return allEvents.filter(event => {
      const matchesSearch = event.title.toLowerCase().includes(search) || event.description.toLowerCase().includes(search);
      const matchesTag = selectedTags.length === 0 || selectedTags.includes(event.tag);
      const matchesDay = !selectedDay || event.day === selectedDay;
      const matchesTime = !selectedTime || event.time === selectedTime;

      return matchesSearch && matchesTag && matchesDay && matchesTime;
    });
  }

  function groupEvents(events) {
    const byDay = {};
    events.forEach(event => {
      if (!byDay[event.day]) byDay[event.day] = {};
      if (!byDay[event.day][event.time]) byDay[event.day][event.time] = [];
      byDay[event.day][event.time].push(event);
    });
    return byDay;
  }

  function renderSchedule(events) {
    scheduleContainer.innerHTML = '';
    const grouped = groupEvents(events);

    Object.entries(grouped).forEach(([day, times]) => {
      const dayBlock = document.createElement('div');
      dayBlock.innerHTML = `<h3 class="text-2xl font-semibold">${day}</h3>`;

      Object.entries(times).forEach(([time, eventsAtTime]) => {
        const timeBlock = document.createElement('div');
        timeBlock.className = "mb-6";
        timeBlock.innerHTML = `
          <h5 class="bg-[#fbd4c9] text-[#7c2d12] px-4 py-1 rounded-md inline-block">${time}</h5>
          <div class="space-y-6">
            ${eventsAtTime.map(event => `
              <div class="p-6 bg-white border border-gray-200 rounded-md shadow-sm">
                <div class="flex items-center justify-between">
                  <h3 class="font-semibold">${event.title}</h3>
                  <h6 class="text-xs px-3 py-1 rounded-md ${getTagStyle(event.tag)}">${event.tag}</h6>
                </div>
                <p class="mt-2 text-sm text-gray-700">${event.description}</p>
              </div>
            `).join('')}
          </div>
        `;
        dayBlock.appendChild(timeBlock);
      });

      scheduleContainer.appendChild(dayBlock);
    });
  }

  function applyFilters() {
    const filtered = filterEvents();
    renderSchedule(filtered);
  }

  // Event bindings
  searchInput.addEventListener('input', applyFilters);
  tagFilters.addEventListener('change', applyFilters);
  dayFilter.addEventListener('change', e => {
    updateTimeOptions(e.target.value);
    applyFilters();
  });
  timeFilter.addEventListener('change', applyFilters);

  // Init
  allEvents = extractEvents(scheduleData);
  renderFilters(allEvents);
  renderSchedule(allEvents);
</script>