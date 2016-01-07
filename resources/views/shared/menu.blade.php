<a class="list-group-item @if ($scope == 'Home') active @endif" href="{{ route('home') }}">Home / Announcement</a>
<a class="list-group-item @if ($scope == 'Committees') active @endif" href="{{ url('/committees.php') }}">Committees</a>
<a class="list-group-item @if ($scope == 'Topics') active @endif" href="{{ url('/topics.php') }}">Topics</a>
<a class="list-group-item @if ($scope == 'Program') active @endif" href="{{ url('/program.php') }}">Conference Program</a>
<a class="list-group-item @if ($scope == 'Plenary') active @endif" href="{{ url('/plenary_sessions.php') }}">Plenary Session</a>
<a class="list-group-item @if ($scope == 'Parallel') active @endif" href="{{ url('/parallel_sessions.php') }}">Parallel Session</a>
<a class="list-group-item @if ($scope == 'Registration') active @endif" href="{{ url('/registration.php') }}">Registration</a>
<a class="list-group-item @if ($scope == 'Submission') active @endif" href="{{ url('/submission.php') }}">Title &amp; Abstract Submission</a>
<a class="list-group-item @if ($scope == 'Participants') active @endif" href="{{ url('/participants.php') }}">List of Participants</a>
<a class="list-group-item @if ($scope == 'Accommodation') active @endif" href="{{ url('/accommodation.php') }}">Accommodation</a>
<a class="list-group-item @if ($scope == 'Transportations') active @endif" href="{{ url('/transportations.php') }}">Transportations</a>
<a class="list-group-item @if ($scope == 'SocialEvents') active @endif" href="{{ url('/social_events.php') }}">Social Events</a>
<a class="list-group-item @if ($scope == 'Companion') active @endif" href="{{ url('/companion_program.php') }}">Companion Program</a>
<a class="list-group-item @if ($scope == 'About_Taiwan') active @endif" href="{{ url('/about_taiwan.php') }}">Information about Taiwan</a>
<a class="list-group-item @if ($scope == 'Travel_Visa') active @endif" href="{{ url('/travel_and_visa.php') }}">Travel &amp; Visa Information</a>
<a class="list-group-item @if ($scope == 'Photos') active @endif" href="http://lecospa.ntu.edu.tw/news-and-activities/photo-gallery/everything-about-gravity/') }}">Conference Photos</a>
<a class="list-group-item @if ($scope == 'ConferenceVideos') active @endif" href="{{ url('/conference_videos.php') }}">Conference Videos</a>
<a class="list-group-item @if ($scope == 'Contact') active @endif" href="{{ route('contact') }}">Contact Us</a>
<a class="list-group-item @if ($scope == 'Publications') active @endif" href="{{ url('/publications.php') }}">Publications</a>
<a class="list-group-item" href="http://lecospa.ntu.edu.tw">Back to LeCosPA</a>
