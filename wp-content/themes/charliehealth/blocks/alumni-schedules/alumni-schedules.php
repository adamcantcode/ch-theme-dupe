<style>
  .tag-badge.inactive {
    opacity: .5;
  }

  .tab-button:not(.active) {
    opacity: .5;
  }
</style>

<div class="grid grid-cols-2 gap-base5-10 mb-base5-5" id="tabs">
  <button class="ch-button button-primary-ch tab-button active" data-group="teen">Teen</button>
  <button class="ch-button button-secondary-ch tab-button" data-group="adult">Adult</button>
</div>

<div class="mb-base5-5">
  <input id="searchInput" type="text" placeholder="Search events..." class="w-full border p-base5-3 border-primary mb-base5-5" />
  <div id="tagFilters" class="flex flex-wrap gap-base5-2 mb-base5-5"></div>
  <div class="flex gap-base5-2">
    <select id="dayFilter" class="border rounded-md border-primary p-base5-2">
      <option value="">Filter by day</option>
    </select>
    <select id="timeFilter" class="border rounded-md border-primary p-base5-2" disabled>
      <option value="">Filter by time</option>
    </select>
  </div>
</div>

<div id="schedule" class="my-base5-10"></div>

<script>
  const weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

  const getTagStyle = (tag) => ({
    "Peer Process": "bg-referrals-blue-300 text-white",
    "Peer Process & Identity": "bg-referrals-blue-300 text-white",
    "Skills and Well-Being": "bg-lavender-300 text-primary",
    "Skills and Wellbeing": "bg-lavender-300 text-primary",
    "Skills and Well-Being & Identity": "bg-yellow-300 text-primary",
    "Skills and Wellbeing & Identity": "bg-yellow-300 text-primary",
    "Interests and Workshops": "bg-pale-blue-300 text-primary"
  } [tag] || "bg-gray-100 text-gray-700");

  const tabs = document.querySelectorAll('#tabs .tab-button');
  const scheduleContainer = document.getElementById('schedule');
  const searchInput = document.getElementById('searchInput');
  const tagFilters = document.getElementById('tagFilters');
  const dayFilter = document.getElementById('dayFilter');
  const timeFilter = document.getElementById('timeFilter');

  let allEvents = [];
  let activeGroup = 'teen';

  const scheduleData = {
    "adult": [{
        "day": "Monday",
        "events": [{
            "time": "12pm MST",
            "title": "YA 18+ Monday Process (12pm MST)",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Monday Body Doubling (12pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Are you neurodivergent and/or do you have trouble staying focused to finish big tasks or detailed projects? Join us for our body doubling support group which offers guidance and accountability to assist you in completing your tasks and achieving your goals. Body doubling can increase focus, reduce anxiety, and provide you with the motivation you need to take on and complete tasks or projects."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Mindful Monday (12pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Join for a weekly pause to become present and chill out for a moment."
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Monday Self Compassion (3pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "The Mindful Self Compassion group is based on the research and work of Kristen Neff, PhD. Kristen Neff has created a workbook and program that she describes as, \u201ca proven way to accept yourself, build inner strength, and thrive.\u201d Join us to learn to embrace yourself and your imperfections and grow the resilience you need to thrive! You do not need to own the Self-Compassion Workbook to attend. Each week we will review different pillars of the Mindful Self Compassion program and practice exercises from the Mindful Self Compassion Workbook together as a group."
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Trivia (3pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join us for a lively and engaging Trivia Hour! Test your knowledge across a variety of fun topics, from pop culture and history to science and beyond. Work solo or in teams, enjoy friendly competition, and connect with others in a relaxed and entertaining group setting. Perfect for all trivia enthusiasts!"
          },
          {
            "time": "3pm MST",
            "title": "YA 30+ Navigating Workplace Challenges (3pm MST)",
            "tag": "Skills and Wellbeing & Identity",
            "description": "Feeling stuck in workplace conflicts? Struggling with toxic bosses, challenging coworkers, or unclear boundaries? This group provides a safe space to process your workplace experiences, build skills to navigate tough dynamics, and learn strategies for professional growth\u2014all while gaining a sense of community and support.\n\nParticipants will discuss successes and struggles in managing workplace challenges and explore themes such as effective communication, setting boundaries, dealing with toxic environments, handling burnout, and advocating for your needs at work. Each session will offer practical tools and strategies to help you thrive in your career.\n\nJoin us for a supportive and skill-building space where you can process workplace struggles, celebrate successes, and learn strategies to overcome obstacles and build a fulfilling career.\" This group is open to alumni who are 30 years of age or older."
          },
          {
            "time": "4pm MST",
            "title": "Monday BINGO (4pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join fellow alumni for a weekly chance to have some fun and play an all time favorite game BINGO. YA BINGO Is open to all YA alumni."
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Read with Us- Standing Book Club (4pm MST)",
            "tag": "Interests and Workshops",
            "description": "Feeling stuck in workplace conflicts? Struggling with toxic bosses, challenging coworkers, or unclear boundaries? This group provides a safe space to process your workplace experiences, build skills to navigate tough dynamics, and learn strategies for professional growth\u2014all while gaining a sense of community and support.\n\nParticipants will discuss successes and struggles in managing workplace challenges and explore themes such as effective communication, setting boundaries, dealing with toxic environments, handling burnout, and advocating for your needs at work. Each session will offer practical tools and strategies to help you thrive in your career.\n\nJoin us for a supportive and skill-building space where you can process workplace struggles, celebrate successes, and learn strategies to overcome obstacles and build a fulfilling career.\" This group is open to alumni who are 30 years of age or older."
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Monday Process (4pm MST)",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Substance Use Disorder Group (6pm MST)",
            "tag": "Peer Process",
            "description": "This group is a safe and non-judgmental space for alumni who struggle with substance use disorders and could use support and a space in which to connect. Join us on Mondays to process challenges and share triumphs in the journey to recovery."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Lego Club (6pm MST)",
            "tag": "Interests and Workshops",
            "description": "The Charlie Health Alumni Lego Group serves to be a social space for individuals who enjoy using Legos and/or other forms of building blocks. The group can discuss dream projects, showcase current projects, and engage in bonding over shared interests. Alumni who are interested in getting connected with the CH Lego community are encouraged to join!"
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Mindful Improv (6pm MST)",
            "tag": "Interests and Workshops",
            "description": "Want to build your spontaneity? Feel more confident in your expression? You will learn to play and connect with others without a preplanned script, boldly and creatively. It is an opportunity to support others and yourself, while gaining practice facing the unknowns of life. We create playful moments and slowly begin building short scenes together in pairs and groups. We start with basic warm-ups, group games, and partner work. This type of improv enhances your ability to be present as you notice the differences when you play with pace and timing. We take a few minutes to debrief after each game and discover our patterns. Above all we learn how to work through the unknown, deal with change, and go with the unexpected."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Monday Non-Clinical DBT (7pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "This group offers a setting for attendees to discuss and navigate their DBT skill use in a warm and supportive non-clinical community. DBT skills, including but not limited to skills from the mindfulness, emotion regulation, distress tolerance and interpersonal effectiveness modules are open for discussion and practice in this group. It is required that participants have a basic understanding and/or familiarity of DBT skills prior to attending this group."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Monday Neurodivergent (7pm MST)",
            "tag": "Peer Process & Identity",
            "description": "Do you self-identify or have a diagnosis that aligns as neurodivergent? Are you looking for a community of peers to support and process? Look no further! Join us every Tuesday at non-clinical Neurodivergent Support & Process Group. This group is a neurodivergent affirming space for neurodivergent identified alumni to connect, chill, share art, interests, stories, and fun times together. You are not required to have a formal neurodivergent diagnosis or have previously received treatment to attend this group."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Monday Knitting and Crochet Group (7pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join our Knitting & Crochet Workshop! This group is made for all ability levels and fiber art modalities. If you are new to crochet or knitting this is the perfect group to ask questions and learn some of the basics from fellow yarn artists."
          }
        ]
      },
      {
        "day": "Tuesday",
        "events": [{
            "time": "10am MST",
            "title": "YA 18+ Tuesday AM Process (10am MST)",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "10am MST",
            "title": "YA 18+ Guided Creative Expression (10am MST)",
            "tag": "Interests and Workshops",
            "description": "Tap into your inner child and explore self-expression through art, movement, and imagination. Each week, the group facilitator will offer a creative theme to inspire reflection, connection, and play. No artistic experience needed\u2014just come as you are and enjoy the process of creating in a supportive and judgment-free space."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Tuesday Process (12pm MST)",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Queer to Queer Support Group (12pm MST)",
            "tag": "Peer Process & Identity",
            "description": "This is a non-clinical space created by former members of a specific Charlie Health LGBTQIA+ group that saw the need for graduated clients to be able to come back together and support each other in healing as Alumni. Spend time in a supportive community with other alumni that hold identities in the LGBTQIA+ community while supporting each other in healing."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Paws and Play (12pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join us for our weekly group where you can bring your furry, feathered, or scaly friends along for some therapeutic companionship. From engaging in playful activities to participating in discussions with support from your pet, this group focuses on the healing power of our animal companions. Join us for pet parades, animal shows, and creative activities tailored to highlight your relationship with your pet!"
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Creative Relaxation Hour (3pm MST)",
            "tag": "Interests and Workshops",
            "description": "Creative relaxation hour offers some opportunities for relaxation through creative writing, exploring imagery through music, self-discovery exercises utilizing art and music. No music knowledge or skills are required as we will have time for self-reflection and creativity. Supplies needed for group might include your favorite art supplies: paper/canvas, markers, paint, oil pastels. Depending on the attendees, we may explore some creative writing, group story telling, or activities for self-discovery through the arts or music. You may also bring projects you are currently working on and use the time to reflect as you create."
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Bullet Journal & SketchNoting (3pm MST)",
            "tag": "Interests and Workshops",
            "description": "In this group we use bullet journaling and sketchnoting to capture ideas, improve learning retention, and enhance everyday productivity. Whether you're a beginner or an experienced enthusiast, you're welcome to join us!\n\nWhat We Offer:\n\nRegular meetings: We meet monthly to share tips, techniques, and inspiration.\nCreative workshops: We'll explore different bullet journaling and sketchnoting styles and techniques.\nCommunity support: We're a friendly and supportive community where you can ask questions, get feedback, and celebrate your achievements.\nNewcomer-friendly environment: We welcome everyone, regardless of their experience level. We'll provide guidance to help you get started.\n\nTopics We'll Cover\nBullet Journaling basics: Learn how to set up your journal, create spreads, and use different techniques for tracking tasks, goals, and habits.\nVisual Thinking: Discover the power of visual thinking and how to use it to capture ideas, brainstorm, and process information.\nSketchnoting: Learn how to create simple and effective sketches to illustrate your thoughts and ideas.\nLearning retention: Explore how bullet journaling and sketchnoting can help you improve your memory and understanding.\nEveryday productivity: Discover how to use bullet journaling and sketchnoting to stay organized, focused, and productive in your daily life."
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Pregnancy and Postpartum (4pm MST)",
            "tag": "Peer Process & Identity",
            "description": "Pregnancy and postpartum changes can be challenging to navigate alone. Come connect with others in this perinatal support group, facilitated by postpartum doula and Charlie Health group facilitator Courtney. We will build community, brainstorm on creative problem-solving tools, and have some fun. Babies in arms are welcome!"
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Tuesday Process (4pm MST)",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Creative Writing (4pm MST)",
            "tag": "Interests and Workshops",
            "description": "What\u2019s your story? Join our weekly creative writing workshop, where we will create space to define our narratives, tell our stories, and share our experiences through creative writing, narration, and storytelling. During this time, group members will be guided through various principles, activities, and techniques surrounding creative writing through a recovery-minded approach."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Healing Circle for Native Americans (6pm MST)",
            "tag": "Peer Process & Identity",
            "description": "This group is focused on Native American people or Native American descendants to help start a dialogue on the ongoing healing of generational wounds. Additionally, it aims to provide a safe space to discuss the struggles and challenges of the Native American community in the 21st century."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Tuesday Body Doubling (6pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Are you neurodivergent and/or do you have trouble staying focused to finish big tasks or detailed projects? Join us for our body doubling support group which offers guidance and accountability to assist you in completing your tasks and achieving your goals. Body doubling can increase focus, reduce anxiety, and provide you with the motivation you need to take on and complete tasks or projects."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Tuesday Neurodivergent (6pm MST)",
            "tag": "Peer Process & Identity",
            "description": "Do you self-identify or have a diagnosis that aligns as neurodivergent? Are you looking for a community of peers to support and process? Look no further! Join us every Tuesday at non-clinical Neurodivergent Support & Process Group. This group is a neurodivergent affirming space for neurodivergent identified alumni to connect, chill, share art, interests, stories, and fun times together. You are not required to have a formal neurodivergent diagnosis or have previously received treatment to attend this group."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ BIPOC (Black, Indigenous, or Person of Color) Process and Peace (7pm MST)",
            "tag": "Peer Process & Identity",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Tuesday Neurographic Art (7pm MST)",
            "tag": "Interests and Workshops",
            "description": "Neurographic Art is a drawing method that can bring stress relief through mindful scribbling practices. It is a subtle tool that addresses trauma and limiting beliefs. The strength and depth of its process are in its ability to shift negative thought patterns gently. No drawing ability is required."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Tuesday LGBTQIA+ (7pm MST)",
            "tag": "Peer Process & Identity",
            "description": "Join a supportive community excluesively for LGBTQIA+ Alumni. This group is open to Adult's Alumni (18+) who identify as LGBTQIA+ and will center and hold space for shared experiences and connection"
          }
        ]
      },
      {
        "day": "Tuesday ",
        "events": [{
            "time": "3pm MST",
            "title": "YA 18+ Healthy Relationships (3pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Join us in strengthening and improving our relationships! This will be a space to explore our relationships, their healthy and unhealthy characteristics, and ways to engage in positive relationship dynamics. We will explore our own relationships (with our friends, family, partners, and self) using attachment theory and non-violent communication to promote deep understanding and effective problem solving. Each week, we will engage in an interactive learning environment on a relevant topic, and then open it up to work on applying topics to our own relationship needs. We are here to offer support in navigating the challenges that come with our connections!"
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ DID Social Hour (6pm MST)",
            "tag": "Interests and Workshops & Identity",
            "description": "A welcoming social group for individuals with dissociative disorders and systems to come together, express themselves, and have fun in a supportive environment. This space encourages creativity through art, writing, and collaborative projects while also offering the chance to play games, share stories, and build meaningful connections with others who understand the unique experiences of being a system."
          }
        ]
      },
      {
        "day": "Wednesday",
        "events": [{
            "time": "12pm MST",
            "title": "YA 18+ Wednesday Guided Process Group (7 PM MST)",
            "tag": "Peer Process",
            "description": "Stay connected with the Charlie Health Alumni community while building skills through our Guided Process Group. This group follows an 18-week curriculum rooted in Charlie Health\u2019s Core Tenets.\nEach topic runs over two weeks:\nWeek 1: Process-based discussion using peer support and reflection.\nWeek 2: Continued processing with practical skill-building.\nA space for connection, growth, and applying new strategies."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Wednesday Neurodivergent Wellness (12pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "This wellness space will involve engaging in activities and the practice/coaching of exercises to enhance overall wellness for the neurodivergent brain. Prior knowledge of the \u201cclinical skills\u201d from the treatment program is not necessary. The activities and coaching practices given in the group will be from many different approaches such as but not limited to: expressive arts, executive functioning coaching, sensory integration, relaxation-based (basically mindfulness and grounding exercises in clinical terms), Autism meltdown/shutdown coaching, body-brain connection."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Walk and Talk to Connect (12pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Walk & Talk To Connect: This group is open to 18-24 year olds to join the group call on their phone (with headphones) while walking outside. Sessions will include discussion topics, self-reflection prompts, and mindfulness practices."
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Inner Child Check In (3pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Each week you will explore things such as laughter, improv, drawing, and play to get in touch with your inner child and deepen your relationship with JOY. Learn how playfulness impacts your healing and capacity to cope with life's demands."
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Mindfulness Moments (3pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Welcome to the non-clinical Mindful Moments Clubhouse! This is a non-clinical space where alumni can come together to get a reset before their busy week. We will listen to guided meditations either by our group facilitator or by recording. We will also practice deep breathing and grounding techniques. We are so excited to gather, breathe, and reset with you all!"
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Vent Poetry (3pm MST)",
            "tag": "Interests and Workshops",
            "description": "Vent Poetry groups are a safe space to learn about the powerful effects of channeling our emotions into the poetry art form. Here we will have writing workshops, poetry slams, and watch spoken word poems from some of the most amazing poets online. We will process emotions and learn about the ways that art can serve as a healthy coping skill on our healing journey."
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Music and Wellness (4pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join us in our music and wellness alumni group where we spend time using music to explore and process what we experience throughout the week. Music and Wellness includes active music listening, song discussions, songwriting, and music sharing. You do not need any music ability to participate in this group as our non-clinical music therapy group is for everyone!"
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Wednesday Body Doubling (4pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Are you neurodivergent and/or do you have trouble staying focused to finish big tasks or detailed projects? Join us for our body doubling support group which offers guidance and accountability to assist you in completing your tasks and achieving your goals. Body doubling can increase focus, reduce anxiety, and provide you with the motivation you need to take on and complete tasks or projects."
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Voices! BIPOC Process (4pm MST)",
            "tag": "Peer Process & Identity",
            "description": "This group is open to alumni who identify as BIPOC (Black, Indigenous, or Person of Color) and will center on shared experiences and emerging topics attendees bring into the group. There is no formal theme or curriculum, but participants are welcome to focus on a specific topic if the group collectively decides to do so."
          },
          {
            "time": "6pm MST",
            "title": "Wednesday BINGO (6pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join fellow alumni for a weekly chance to have some fun and play an all time favorite game BINGO. YA BINGO Is open to all YA alumni."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Wednesday Self Compassion (6pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "The Mindful Self Compassion group is based on the research and work of Kristen Neff, PhD. Kristen Neff has created a workbook and program that she describes as, \u201ca proven way to accept yourself, build inner strength, and thrive.\u201d Join us to learn to embrace yourself and your imperfections and grow the resilience you need to thrive! You do not need to own the Self-Compassion Workbook to attend. Each week we will review different pillars of the Mindful Self Compassion program and practice exercises from the Mindful Self Compassion Workbook together as a group."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Chronic Illness (6pm MST)",
            "tag": "Peer Process & Identity",
            "description": "Come join us for a non-clinical support group for those with chronic illnesses. This group offers a group setting in which members can discuss and process their experience with chronic illness and mental health. There is no requirement to be formally diagnosed with a chronic illness or to disclose any personal information you do not wish to."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Wednesday BIPOC LGBTQIA+ (7pm MST)",
            "tag": "Peer Process & Identity",
            "description": "So often humans carry more than one identity with each holding varying weights to us creating our whole being. If you are looking for support to connect and grow in community while having space to explore the intersectionality as it relates to being both a Black, Indigenous, or Person of Color, AND LGBTQIA2S+. Spend time in supportive community with other alumni that hold identities as both Black, Indigenous, or Persons of Color AND LGBTQIA2S+ community while building your toolbox of skills and strategies. There is no specific topic area for our non-clinical process and support groups. They are intended to be a space for Alumni to share anything going on that is challenging, successful, or anything in between and show solidarity and support for other Alumni."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Wednesday Process (7pm MST)",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Yoga (7pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Let's Decolonize Yoga. Join us for an hour of yoga as it was intended. All movement led by a Charlie Health facilitator is gentle, accessible, and trauma informed. Participants may expect a combination of the following in any given session: Discussions on yoga philosophy, Dinachary\u0101 ( daily routines), \u0100sana (movement), Pr\u0101\u1e47\u0101y\u0101ma (breath work), Dhy\u0101na (Meditation)"
          }
        ]
      },
      {
        "day": "Thursday",
        "events": [{
            "time": "10am MST",
            "title": "YA 18+ Wednesday Guided Process Group (10 AM MST)",
            "tag": "Peer Process",
            "description": "Stay connected with the Charlie Health Alumni community while building skills through our Guided Process Group. This group follows an 18-week curriculum rooted in Charlie Health\u2019s Core Tenets.\nEach topic runs over two weeks:\nWeek 1: Process-based discussion using peer support and reflection.\nWeek 2: Continued processing with practical skill-building.\nA space for connection, growth, and applying new strategies."
          },
          {
            "time": "10am MST",
            "title": "YA 18+ Process for Women",
            "tag": "Peer Process & Identity",
            "description": "A supportive space for women who are navigating life and all the roles that come with. This group offers a safe and empowering environment to process experiences, explore new challenges, and gain insight while maintaining progress. Connect with others who understand your journey, share your struggles and victories, and continue building resilience as you move forward."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Thursday Process (12pm MST)",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Thursday BIPOC (Black, Indigenous, or Person of Color) LGBTQIA+ (12pm MST)",
            "tag": "Peer Process & Identity",
            "description": "So often humans carry more than one identity with each holding varying weights to us creating our whole being. If you are looking for support to connect and grow in community while having space to explore the intersectionality as it relates to being both a Black, Indigenous, or Person of Color, AND LGBTQIA2S+, this may be the alumni group for you. Spend time in supportive community with other alumni that may hold identities as both Black, Indigenous, or Persons of Color AND LGBTQIA2S+ community while building your toolbox of skills and strategies. There is no specific topic area for our non-clinical process and support groups. They are intended to be a space for Alumni to share anything going on that is challenging, successful, or anything in between and show solidarity and support for other Alumni."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Thursday Knitting and Crochet (12pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join fellow alumni for our Knitting & Crochet Workshop! This group is made for all ability levels and fiber art modalities. If you are new to crochet or knitting this is the perfect group to ask questions and learn some of the basics from fellow yarn artists."
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Arts and Crafts (3pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join to create art, express yourself, and spend time together! An open space to be creative whether it's painting, coloring, drawing, or any other creative outlet you enjoy. No prior experience needed.\n\nIdeas include but are not limited to:\nDrawing and painting\nMacrame\nDiamond painting\nEmbroidery and cross stitch\nSewing and quilting\nParacord\nJewelry making\nOrigami\nAnd more"
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Gaming Group (3pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join us for casual game streams, lively discussions, or group play sessions featuring popular titles like Jackbox Party Packs, Minecraft, and more. Whether you\u2019re a seasoned gamer or just looking for a place to socialize and relax, Game Break is the perfect spot to unwind and connect with others who share your passion for gaming."
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Songwriting Group (3pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join us in the Songwriting Alumni Group where we will meet for an hour to write and discuss the songs we create individually or as a group. Do not worry about having music abilities or experience writing a song. Our group facilitator will provide guidance, templates, and suggestions for all group members that join the group as well as allow space for you to compose your own song however you decide."
          },
          {
            "time": "4pm MST",
            "title": "YA 18-24 year old Thursday Process (4pm MST)",
            "tag": "Peer Process & Identity",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Poetry for Beginners and Beyond (4pm MST)",
            "tag": "Interests and Workshops",
            "description": "Dive into the world of poetry with our welcoming and inclusive group, designed for anyone who loves the magic of words! Whether you're a complete novice, a seasoned poet looking for fresh inspiration, or somewhere in between, you'll find a supportive community here. We believe that poetry starts with a simple love for language and how a new word or metaphor can change the way we can express ourselves.\n\nOur sessions are designed to spark your creativity and make the process of writing enjoyable. We'll use interactive tools like metaphor dice and magnet poetry to break down writer's block and unlock unexpected poetic possibilities. Explore the power of imagery and sound through engaging exercises, and discover how to shape your thoughts and feelings into beautiful verses.\nThis is a friendly and non-judgmental space where you can share your newly crafted poems, rediscover old favorites, or simply listen and appreciate the diverse voices around you. Join us to explore the boundless possibilities of poetry and discover the poet within!"
          },
          {
            "time": "4pm MST",
            "title": "YA 25+ Thursday Process (4pm MST)",
            "tag": "Peer Process & Identity",
            "description": "Join to set aside some time to build connection and process any topics that might be coming up. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so. Getting \"older\" can present its own unique experiences, and we are here for you to process."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Adulting 101 (6pm MST)",
            "tag": "Peer Process",
            "description": "Gain a sense of community and decreased shame and isolation surrounding life skills as you transition to adulthood and independence! Process and gain tangible skills for navigating the many challenges adulthood can bring. Participants are invited to share successes, struggles, skills, and strategies for navigating the transition to adulthood and increased independence. Groups will focus on a theme each week including self care, home maintenance, finances, child rearing, functional nutrition, etc."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Parenting group (6pm MST)",
            "tag": "Peer Process",
            "description": "Are you wanting to connect with other parents? If so, this is the group for you. Join and talk with other parents and share your struggles as it relates to being a parent, concerns about your children and we will also take time to focus on the positive and celebrate you as a parent and your children! Babies are always welcome."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Thursday Body Doubling (6pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Are you neurodivergent and/or do you have trouble staying focused to finish big tasks or detailed projects? Join us for our body doubling support group which offers guidance and accountability to assist you in completing your tasks and achieving your goals. Body doubling can increase focus, reduce anxiety, and provide you with the motivation you need to take on and complete tasks or projects."
          },
          {
            "time": "7pm MST",
            "title": "YA 30+ Process Group",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Helping Professions Support Group (7pm MST)",
            "tag": "Peer Process",
            "description": "This group is designed to support individuals in their work helping others while receiving help themselves. The group will help individuals find a community of support and fellow individuals with shared experiences. The group is inclusive of all helping professions including students in clinical or educational experiences. Helping field job titles could include: Teachers/educators, crisis line volunteers, peer support specialists, Physicians, Therapists, nurses, CNAs, psychologists, EMTs, dietitians, dental hygienists, medical assistants, midwives, pharmacy techs, pharmacists, etc. If your role is not listed, but you consider yourself to work in the helping field please attend!"
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Moon Journal (7pm MST)",
            "tag": "Interests and Workshops",
            "description": "Each Moon Journal Studio will have artistic prompts and astrological notes about the moon to guide your creative process during a lunar cycle. Bring a journal and your favorite writing and drawing materials to track your emotions with artistic responses and written reflections. If you\u2019re interested in a brief astrological look at the placement of the transiting moon in your natal chart, bring your birth time, place, and date. We will review a few charts from the group each session. Required Materials:\nAn art journal and favorite writing and drawing supplies.\nOptional materials\nBlack journal. Consider one of these two:\nCanson XL Series Black Drawing Paper for Pencil, Acrylic Marker, Opaque Inks, Gouache and Pastels, Side Wire, 92 Pound, 9\u201d x 12\u201d Inch, Black, 40 Sheets\no  Strathmore 400 Series Art Drawing Journal, 7\"x10\" Wire Bound, Black, 50 Sheets\n\u00b7      Gelly Roll Moonlight pens by Sakura for dark paper\nWhite and Colored Pencils made by Derwent or Prismacolor\nPencil sharpener\nWatercolor paper, paints, brushes, salt\nCrayons or oil pastels"
          }
        ]
      },
      {
        "day": "Thursdays ",
        "events": [{
          "time": "12pm MST",
          "title": "YA 18+ Writing Life Stories (12pm MST)",
          "tag": "Interests and Workshops",
          "description": "We all have stories to tell, and writing stories about our experiences can help us process these experiences and learn about ourselves. Writing Life Stories is a safe space for folks who are interested in writing to put their life experiences on the page and share them with one another. Group will work with prompts and exercises to encourage reflection on their experiences and will write short pieces about these experiences. No prior creative writing experience required!"
        }]
      },
      {
        "day": "Friday",
        "events": [{
            "time": "12pm MST",
            "title": "YA 18+ Friday Process (12pm MST)",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Friday Body Doubling (12pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Are you neurodivergent and/or do you have trouble staying focused to finish big tasks or detailed projects? Join us for our body doubling support group which offers guidance and accountability to assist you in completing your tasks and achieving your goals. Body doubling can increase focus, reduce anxiety, and provide you with the motivation you need to take on and complete tasks or projects."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Progress Not Perfection (12pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Join your peers to receive support and encouragement as you continue your mental health journey and apply skills learned at Charlie Health to your daily life."
          },
          {
            "time": "3pm MST",
            "title": "Friday BINGO (3pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join fellow alumni for a weekly chance to have some fun and play an all time favorite game BINGO. YA BINGO Is open to all YA alumni."
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Soundscape & Journaling",
            "tag": "Interests and Workshops",
            "description": "This group will be designed as a space for alumni to come to process through journaling and creatively expressing themselves while listening to ambient and soothing instrumental sounds/music to provide relaxation through the process. We will use the prompts from affirmation/oracle cards to assist with a journaling start point."
          },
          {
            "time": "3pm MST",
            "title": "YA 18+ Bringing Nature In \u2013 Exploring the Wisdom of the Natural World (3pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join us as we journey through time, across cultures, and into the heart of nature\u2019s wisdom. In this experiential alumni group, we will explore how humans have connected with nature throughout history\u2014through sacred tree languages of the Druids, Victorian flower symbolism, modern essential oils, and more.  Each session will weave together history, philosophy, and hands-on activities to deepen our understanding of how nature has been used for communication, healing, and self-discovery. Through reflection and experiential practices, we will explore ways to \u201cBring Nature In\u201d\u2014whether through our daily rituals, sacred spaces, or intuitive practices."
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Jackbox Gaming (4pm MST)",
            "tag": "Interests and Workshops",
            "description": "Looking for a fun, interactive way to unwind and connect with others? Dive into a session filled with creativity, friendly competition, and laughs with our Jackbox Group Adventures! Whether you\u2019re a trivia buff, a quick thinker, or just here to enjoy the fun, there\u2019s something for everyone. No experience is needed\u2014bring your enthusiasm and prepare for a great time. Don\u2019t miss out\u2014let\u2019s play together!"
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Coloring Group (4pm MST)",
            "tag": "Interests and Workshops",
            "description": "Are you in need of stress relief and camaraderie with low stakes? Join us for our coloring hour, where we take the time to practice mindfulness, embrace the imperfect, and relieve stress through coloring books and compassionate creation. \n\nSupplies recommended: drawing utensils, coloring books/pages"
          },
          {
            "time": "4pm MST",
            "title": "YA 18+ Neurodivergent Life Skills- Cooking (4pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Do you think that cooking is scary?  Does using the stove top intimidate you? Are you spending too much money on take out? Come learn how to cook with me!  Learn the life skill of cooking and how to create simple, inexpensive, and healthy recipes utilizing various kitchen tools like the microwave, air fryer, stove top, and a crock pot.  The goal of the program is to increase the comfort of using your kitchen space and learning easy recipes to practice at home.  The program will produce a month's worth of recipes ahead so that you can prepare to cook with me each week using a different piece of equipment to cook with.  If you want to cook with me or watch how it's made and then practice at home, it doesn't matter.  Come join us in the kitchen today!"
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Trusting Your Inner Wisdom With Tarot and Other Personal Insight Practices (6pm MST)",
            "tag": "Interests and Workshops",
            "description": "This alumni group is designed to help you cultivate trust in your inner voice through reflective tools and practices. Together, we will explore tarot and other personal insight methods that encourage intuition, self-awareness, and emotional resilience. In a supportive, nonjudgmental setting, we\u2019ll introduce a range of introspective techniques\u2014from symbolic interpretation to guided reflection\u2014that allow for a deeper connection with your own inner wisdom. This group is ideal for those looking to strengthen self-trust and explore meaningful pathways toward clarity and personal growth."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Mindful Creations: Art & Wellness (6pm MST)",
            "tag": "Interests and Workshops",
            "description": "Step into a space of creativity, reflection, and connection in Mindful Creations, a weekly group designed for alumni  members who want to explore well-being through the power of artistic discovery. Each session offers a variety of guided creative projects\u2014such as vision boards, collaging, journaling, and other artistic practices\u2014designed to inspire mindfulness, reduce stress, and foster emotional clarity and wellness."
          },
          {
            "time": "6pm MST",
            "title": "YA 18+ Process Group (6pm MST)",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Tarot Card Group (7pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join our weekly Tarot Workshop for an explorative journey into the world of tarot reading and self-discovery. In this interactive and supportive environment, you'll learn how to divine the meanings of cards, techniques for formulating insightful questions, and how to create your own card spreads. Discover how to harness the power of tarot as a tool for self-growth, gaining valuable insights into your inner world. Whether you're a beginner or looking to enhance your skills, this workshop offers a space for personal growth and an opportunity to connect with others who share a passion for the mystical art of tarot."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Friday Night Social Hour (7pm MST)",
            "tag": "Interests and Workshops",
            "description": "A relaxed space to connect, share, and have fun! We\u2019ll start with intros and a light icebreaker, followed by an open invitation to share any recent creative projects. From there, we\u2019ll leave space for casual conversation or choose from fun interactive games like Jackbox, Gartic Phone, puzzles, and more! Whether you\u2019re here to chat or play, this is a welcoming place to unwind and connect with fellow alumni."
          },
          {
            "time": "7pm MST",
            "title": "YA 18+ Artists Supporting Artists (7pm MST)",
            "tag": "Interests and Workshops",
            "description": "Artists Supporting Artists is a space for creative people of all sorts to get together and share their work and the frustrations and joys that come with it. The group will be a safe space for creatives to process and also to share the progress they\u2019re making in their work\u2014showing visual art pieces, songwriting, reading poetry, etc."
          }
        ]
      },
      {
        "day": "Saturday",
        "events": [{
            "time": "12pm MST",
            "title": "YA 18+ Body Doubling (12pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Are you neurodivergent and/or do you have trouble staying focused to finish big tasks or detailed projects? Join us for our body doubling support group which offers guidance and accountability to assist you in completing your tasks and achieving your goals. Body doubling can increase focus, reduce anxiety, and provide you with the motivation you need to take on and complete tasks or projects."
          },
          {
            "time": "12pm MST",
            "title": "YA 18+ Saturday Process (12pm MST)",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so."
          },
          {
            "time": "1pm MST",
            "title": "YA 18+ Music BINGO (1pm MST)",
            "tag": "Interests and Workshops",
            "description": "Get ready to mix things up with Music Bingo, a fun and interactive twist on the classic game! Instead of numbers, your bingo card will feature song titles based on a specific theme, such as Christmas classics, 90\u2019s pop hits, songs with colors in the title, or even tracks from the Billboard Hot 100.\n\nHere\u2019s how it works:\n\nEach participant will receive a unique bingo card through a shareable link, generated randomly to match the theme.\nThe host will play snippets of songs from the theme, and your challenge is to guess the song title or artist and mark it on your card.\nThe first person to complete a row, column, or diagonal and call out \"Bingo!\" wins!\nThis group is perfect for music lovers and anyone looking to have a great time exploring new and nostalgic tunes in a creative way. Come join us, enjoy the music, and connect with your peers while trying something different from regular bingo. It\u2019s all about fun, laughter, and maybe discovering your new favorite song! \ud83c\udfb6"
          },
          {
            "time": "1pm MST",
            "title": "YA 35+ Process Group (1pm MST)",
            "tag": "Peer Process & Identity",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no formal theme or curriculum for this group but will center around emerging topics attendees bring into the group. If the group would like to center one specific topic, participants are welcome to do so. This group is open to alumni who are 35 years of age or older."
          },
          {
            "time": "2pm MST",
            "title": "YA 18+ Self Compassion (2pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "The Mindful Self Compassion group is based on the research and work of Kristen Neff, PhD. Kristen Neff has created a workbook and program that she describes as, \u201ca proven way to accept yourself, build inner strength, and thrive.\u201d Join us to learn to embrace yourself and your imperfections and grow the resilience you need to thrive! You do not need to own the Self-Compassion Workbook to attend. Each week we will review different pillars of the Mindful Self Compassion program and practice exercises from the Mindful Self Compassion Workbook together as a group."
          },
          {
            "time": "2pm MST",
            "title": "YA 18+ Building Resilience Group  (2pm MST)",
            "tag": "Skills and Wellbeing",
            "description": "Discover the strength within you to navigate life's challenges in our 'Building Resilience' group therapy. Learn effective coping mechanisms, gain support from peers facing similar struggles, and develop the tools to bounce back from setbacks, managing stress and building resilience to thrive in the face of adversity"
          }
        ]
      }
    ],
    "teen": [{
        "day": "Monday",
        "events": [{
            "time": "3pm MST",
            "title": "Teen Songwriting",
            "tag": "Interests and Workshops",
            "description": "Join us to meet for an hour to write and discuss the songs we create individually or as a group. Don't worry about having music abilities or experience writing a song. The facilitator will provide guidance, templates, and suggestions for all group members that join the group as well as allow space for you to compose your own song however you decide."
          },
          {
            "time": "4pm MST",
            "title": "Teen Monday BINGO (4pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join fellow alumni for a weekly chance to have some fun and play an all time favorite game BINGO. Weekly BINGO is open for our teen alumni."
          },
          {
            "time": "6pm MST",
            "title": "Teen Mindfulness and Process",
            "tag": "Peer Process",
            "description": "Join us for a weekly pause to become present and chill out for a moment. Attendees will be guided through a mindfulness activity and have an opportunity to process as well."
          }
        ]
      },
      {
        "day": "Tuesday",
        "events": [{
            "time": "3pm MST",
            "title": "Teen Vent Poetry",
            "tag": "Interests and Workshops",
            "description": "Vent Poetry groups are a safe space to learn about the powerful effects of channeling our emotions into the poetry art form. Here we will have writing workshops, poetry slams, and watch spoken word poems from some of the most amazing poets online. We will process emotions and learn about the ways that art can serve as a healthy coping skill on our healing journey."
          },
          {
            "time": "4pm MST",
            "title": "Teen Knitting & Crochet",
            "tag": "Interests and Workshops",
            "description": "Join fellow alumni for our Knitting & Crochet Workshop! This group is made for all ability levels and fiber art modalities. If you are new to crochet or knitting this is the perfect group to ask questions and learn some of the basics from fellow yarn artists."
          },
          {
            "time": "4pm MST",
            "title": "Teen BIPOC (Black, Indigenous, or Person of Color)",
            "tag": "Peer Process & Identity",
            "description": "Join us for our weekly Teen BIPOC Groups! Join Charlie Health staff to be in community with your fellow Alumni. Alumni holding identities as a Black, Indigenous, or Person of Color are welcome to join."
          },
          {
            "time": "6pm MST",
            "title": "Teen Tuesday Process",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no specific topic area for our non-clinical process groups. This is intended to be a space for Alumni to share anything going on that is challenging, successful, or anything in between and show solidarity and support for other Alumni."
          },
          {
            "time": "6pm MST",
            "title": "Bullet Journal Together",
            "tag": "Skills and Wellbeing",
            "description": "A space to work on your bullet journal, learn about bullet journaling, and share ideas with one another."
          },
          {
            "time": "7pm MST",
            "title": "13 years + Real Talk: Building Healthy Relationships & Communication Skills",
            "tag": "Skills and Wellbeing & Identity",
            "description": "This group helps teens  13 years and older explore and strengthen their communication and relationship skills in a safe, supportive space. Through group conversations and activities, alumni will learn how to express themselves, set boundaries, and build healthy connections with friends, family, and peers."
          }
        ]
      },
      {
        "day": "Wednesday ",
        "events": [{
            "time": "3pm MST",
            "title": "Teen Soundscape",
            "tag": "Interests and Workshops",
            "description": "Soundscapes provide an array of sounds designed to guide individuals into a state of relaxation. There will be nature sounds, mixed with classical, LOFI, jazz, etc, with instruments like sound bowls, handpan, etc to promote stress relief and focus. Individuals could work on projects, homework, drawing, writing, journaling, and/or just close their eyes and relax. Also, scenery videos will be shared to further promote relaxation. There will be minimum talking, including the intro and closing out."
          },
          {
            "time": "4pm MST",
            "title": "Teen Wednesday Process",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no specific topic area for our non-clinical process groups. They are intended to be a space for Alumni to share anything going on that is challenging, successful, or anything in between and show solidarity and support for other Alumni."
          },
          {
            "time": "4pm MST",
            "title": "Teen LGBTQIA+",
            "tag": "Peer Process & Identity",
            "description": "Join Charlie Health staff to be in community with LGBTQIA2S+ Alumni. This group is open to Adolescent and Teen (ages 11-17) Alumni, who identify as LGBTQIA2S+."
          },
          {
            "time": "6pm MST",
            "title": "Teen Wednesday BINGO (6pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join fellow alumni for a weekly chance to have some fun and play an all time favorite game BINGO. Weekly BINGO is open for our teen alumni."
          }
        ]
      },
      {
        "day": "Thursday ",
        "events": [{
            "time": "3pm MST",
            "title": "Teen Thursday Process",
            "tag": "Peer Process",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no specific topic area for our non-clinical process groups. This is intended to be a space for Alumni to share anything going on that is challenging, successful, or anything in between and show solidarity and support for other Alumni."
          },
          {
            "time": "4pm MST",
            "title": "Teen Body Doubling",
            "tag": "Skills and Wellbeing",
            "description": "Are you neurodivergent and/or do you have trouble staying focused to finish big tasks or detailed projects? Join us for our body doubling support group which offers guidance and accountability to assist you in completing your tasks and achieving your goals. Body doubling can increase focus, reduce anxiety, and provide you with the motivation you need to take on and complete tasks or projects."
          },
          {
            "time": "6pm MST",
            "title": "Teen Social Hour",
            "tag": "Interests and Workshops",
            "description": "A relaxed space to connect, share, and have fun! We\u2019ll start with intros and a light icebreaker, followed by an open invitation to share any recent creative projects. From there, we\u2019ll leave space for casual conversation or choose from fun interactive games like Jackbox, Gartic Phone, puzzles, and more! Whether you\u2019re here to chat or play, this is a welcoming place to unwind and connect with fellow alumni."
          },
          {
            "time": "6pm MST",
            "title": "Teen Neurodivergent",
            "tag": "Peer Process & Identity",
            "description": "Do you self-identify or have a diagnosis that aligns as neurodivergent? Are you looking for a community of peers to support and process? Look no further! Join us every Wednesday at non-clinical Neurodivergent Support & Process Group. This group is a neurodivergent affirming space for neurodivergent identified alumni to connect, chill, share art, interests, stories, and fun times together. You are not required to have a formal neurodivergent diagnosis or have previously received treatment to attend this group."
          },
          {
            "time": "7pm MST",
            "title": "Teen Thursday PM Process",
            "tag": "Peer Process & Identity",
            "description": "Continue to stay in community with Charlie Health Alumni groups while building your toolbox of skills and strategies. There is no specific topic area for our non-clinical process groups. They are intended to be a space for Alumni to share anything going on that is challenging, successful, or anything in between and show solidarity and support for other Alumni."
          }
        ]
      },
      {
        "day": "Friday ",
        "events": [{
            "time": "3pm MST",
            "title": "Teen Friday BINGO (3pm MST)",
            "tag": "Interests and Workshops",
            "description": "Join fellow alumni for a weekly chance to have some fun and play an all time favorite game BINGO. Weekly BINGO is open for our teen alumni."
          },
          {
            "time": "4pm MST",
            "title": "Teen Anime Group",
            "tag": "Interests and Workshops",
            "description": "Join us for an hour of fun and connection in our Virtual Anime Club! This is a safe space for CH alumni teens to discuss their favorite anime, explore new shows, and connect with others who share their love for anime. Each session, we\u2019ll dive into themes like friendship, resilience, and personal growth found in popular series, all while promoting positive mental wellness. Whether you\u2019re a longtime fan or new to anime, everyone is welcome!"
          },
          {
            "time": "6pm MST",
            "title": "Teen Mindful Creations: Art & Wellness for Alumni",
            "tag": "Interests and Workshops",
            "description": "Step into a space of creativity, reflection, and connection in Mindful Creations, a weekly group designed for alumni  members who want to explore well-being through the power of artistic discovery. Each session offers a variety of guided creative projects\u2014such as vision boards, collaging, journaling, and other artistic practices\u2014designed to inspire mindfulness, reduce stress, and foster emotional clarity and wellness."
          }
        ]
      },
      {
        "day": "Saturday ",
        "events": [{
            "time": "1pm MST",
            "title": "Teen Trivia",
            "tag": "Interests and Workshops",
            "description": "Join us for a lively and engaging Trivia Hour! Test your knowledge across a variety of fun topics, from pop culture and history to science and beyond. Work solo or in teams, enjoy friendly competition, and connect with others in a relaxed and entertaining group setting. Perfect for all trivia enthusiasts!"
          },
          {
            "time": "2pm MST",
            "title": "Music BINGO",
            "tag": "Interests and Workshops",
            "description": "Get ready to mix things up with Music Bingo, a fun and interactive twist on the classic game! Instead of numbers, your bingo card will feature song titles based on a specific theme, such as Christmas classics, 90\u2019s pop hits, songs with colors in the title, or even tracks from the Billboard Hot 100.\n\nHere\u2019s how it works:\n\nEach participant will receive a unique bingo card through a shareable link, generated randomly to match the theme.\nThe host will play snippets of songs from the theme, and your challenge is to guess the song title or artist and mark it on your card.\nThe first person to complete a row, column, or diagonal and call out \"Bingo!\" wins!\nThis group is perfect for music lovers and anyone looking to have a great time exploring new and nostalgic tunes in a creative way. Come join us, enjoy the music, and connect with your peers while trying something different from regular bingo. It\u2019s all about fun, laughter, and maybe discovering your new favorite song! \ud83c\udfb6"
          }
        ]
      }
    ]
  };

  function extractEvents(data) {
    return Object.entries(data).flatMap(([group, days]) =>
      days.flatMap(dayBlock =>
        dayBlock.events.map(event => ({
          ...event,
          group,
          day: dayBlock.day.trim().replace(/s$/, ''),
          time: normalizeTime(event.time)
        }))
      )
    );
  }

  function normalizeTime(time) {
    const match = time.match(/(\d{1,2})(?::\d{2})?\s*([ap]m)/i);
    if (!match) return time;
    return `${match[1]}${match[2].toLowerCase()} MST`;
  }

  function renderFilters(events) {
    const uniqueTags = [...new Set(events.map(e => e.tag))];
    tagFilters.innerHTML = uniqueTags.map(tag => `
      <span class="tag-badge rounded-md px-base5-4 py-base5-2 cursor-pointer ${getTagStyle(tag)}" data-tag="${tag}">${tag}</span>
    `).join('');

    const uniqueDays = [...new Set(events.map(e => e.day))]
      .filter(day => weekdays.includes(day));
    dayFilter.innerHTML = `<option value="">Filter by day</option>` +
      uniqueDays.map(day => `<option value="${day}">${day}</option>`).join('');
  }

  function updateTimeOptions(selectedDay) {
    const times = [...new Set(getActiveEvents()
      .filter(e => e.day === selectedDay)
      .map(e => e.time))];
    timeFilter.disabled = !selectedDay;
    timeFilter.innerHTML = `<option value="">Filter by time</option>` +
      times.map(t => `<option value="${t}">${t}</option>`).join('');
  }

  function getSelectedTags() {
    return Array.from(document.querySelectorAll('.tag-badge.selected')).map(el => el.dataset.tag);
  }

  function getActiveEvents() {
    return allEvents.filter(e => e.group === activeGroup);
  }

  function filterEvents() {
    const search = searchInput.value.toLowerCase();
    const selectedTags = getSelectedTags();
    const selectedDay = dayFilter.value;
    const selectedTime = timeFilter.value;

    return getActiveEvents().filter(event => {
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
      Object.entries(times).forEach(([time, evs]) => {
        const timeBlock = document.createElement('div');
        timeBlock.className = "mb-6";
        timeBlock.innerHTML = `
          <h5 class="bg-[#fbd4c9] text-[#7c2d12] px-4 py-1 rounded-md inline-block">${time}</h5>
          <div class="space-y-6">
            ${evs.map(e => `
              <div class="p-6 bg-white border border-gray-200 rounded-md shadow-sm">
                <div class="flex items-center justify-between">
                  <h3 class="font-semibold">${e.title}</h3>
                  <h6 class="text-xs px-3 py-1 rounded-md ${getTagStyle(e.tag)}">${e.tag}</h6>
                </div>
                <p class="mt-2 text-sm text-gray-700">${e.description}</p>
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

    const selectedTags = getSelectedTags();
    document.querySelectorAll('.tag-badge').forEach(tagEl => {
      tagEl.classList.toggle('inactive', selectedTags.length && !tagEl.classList.contains('selected'));
    });
  }

  function switchTab(group) {
    activeGroup = group;
    tabs.forEach(tab => tab.classList.toggle('active', tab.dataset.group === group));
    searchInput.value = '';
    dayFilter.value = '';
    timeFilter.innerHTML = '<option value="">Filter by time</option>';
    timeFilter.disabled = true;
    document.querySelectorAll('.tag-badge').forEach(el => el.classList.remove('selected'));
    renderFilters(getActiveEvents());
    applyFilters();
  }

  searchInput.addEventListener('input', debounce(applyFilters, 300));
  dayFilter.addEventListener('change', e => {
    updateTimeOptions(e.target.value);
    applyFilters();
  });
  timeFilter.addEventListener('change', applyFilters);

  tagFilters.addEventListener('click', e => {
    if (e.target.matches('.tag-badge')) {
      e.target.classList.toggle('selected');
      applyFilters();
    }
  });

  tabs.forEach(tab => {
    tab.addEventListener('click', () => switchTab(tab.dataset.group));
  });

  function debounce(fn, delay = 200) {
    let timeout;
    return (...args) => {
      clearTimeout(timeout);
      timeout = setTimeout(() => fn(...args), delay);
    };
  }

  // INIT
  allEvents = extractEvents(scheduleData);
  renderFilters(getActiveEvents());
  renderSchedule(getActiveEvents());
</script>