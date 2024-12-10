<h2>{{ $course->title }}</h2>
<h3>{{ $course->tagline }}</h3>
<p>{{ $course->description }}</p>
<p>{{ count($course->videos) }} videos</p>
<ul>
    @foreach($course->leargings as $learning)
        <li>{{ $learning }}</li>
    @endforeach
</ul>
<img src="{{ asset("images/$course->image_name") }}" alt="Image of the course {{ $course->title }}">
