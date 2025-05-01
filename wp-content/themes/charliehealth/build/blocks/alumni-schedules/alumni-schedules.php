<h1 class="mb-8 text-4xl font-bold">Charlie Health Alumni Schedule</h1>
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

  function getTagStyle(tag) {
    const map = {
      "Peer Process": "bg-[#e6e8ff] text-[#5a67d8]",
      "Skills and Well-Being": "bg-[#e6e8ff] text-[#5a67d8]",
      "Skills and Well-Being & Identity": "bg-[#ffe4cc] text-[#b45309]",
      "Interests and Workshops": "bg-[#e0f2fe] text-[#0284c7]"
    };
    return map[tag] || "bg-gray-100 text-gray-700";
  }

  function createSchedule(schedule) {
    const container = document.getElementById('schedule');

    Object.entries(schedule).forEach(([group, days]) => {
      days.forEach(dayBlock => {
        const groupEl = document.createElement('div');
        groupEl.innerHTML = `
            <h3>${dayBlock.day}</h3>
          `;

        const groupedByTime = {};
        dayBlock.events.forEach(event => {
          if (!groupedByTime[event.time]) groupedByTime[event.time] = [];
          groupedByTime[event.time].push(event);
        });

        Object.entries(groupedByTime).forEach(([time, events]) => {
          const timeBlock = document.createElement('div');
          timeBlock.className = "mb-6";

          timeBlock.innerHTML = `
              <h5 class="bg-[#fbd4c9] text-[#7c2d12] px-4 py-1 rounded-md inline-block">${time}</h5>
              <div class="space-y-6">
                ${events.map(event => `
                  <div class="p-6 bg-white border border-gray-200 rounded-md shadow-sm">
                    <div class="flex items-center justify-between">
                      <h3>${event.title}</h3>
                      <h6 class="text-mini px-3 py-1 rounded-md ${getTagStyle(event.tag)}">${event.tag}</h6>
                    </div>
                    <p class="text-gray-700">${event.description}</p>
                  </div>
                `).join('')}
              </div>
            `;
          groupEl.appendChild(timeBlock);
        });

        container.appendChild(groupEl);
      });
    });
  }

  createSchedule(scheduleData);
</script>