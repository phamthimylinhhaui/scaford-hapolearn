<div class="key-info">
    <ul class="list-group list-group-flush">
        <li class="list-group-item key-item">
            <div class="col-6 key-name"><i class="fas fa-users"></i> Learners</div>
            <div class="col-6 key-data">: {{ number_format($course->learners) }}</div>
        </li>
        <li class="list-group-item key-item">
            <div class="col-6 key-name"><i class="fas fa-list-alt"></i> Lessons</div>
            <div class="col-6 key-data">: {{ number_format($course->total_lessons) }} lesson</div>
        </li>
        <li class="list-group-item key-item">
            <div class="col-6 key-name"><i class="fa-solid fa-clock"></i> Times</div>
            <div class="col-6 key-data">: {{ number_format(($course->total_times)/config('config.convert_hours'), 0, ',', ' ') }} hours</div>
        </li>
        <li class="list-group-item key-item">
            <div class="col-6 key-name"><i class="fa-solid fa-key"></i> Tags</div>
            <div class="col-6 key-data">:
                @foreach($tags as $tag)
                    <a href="{{ route('tags.show', [$tag->id]) }}">#{{ $tag->name }}</a>
                @endforeach
            </div>
        </li>
        <li class="list-group-item key-item">
            <div class="col-6 key-name"><i class="fa-solid fa-money-bill-1"></i> Price</div>
            <div class="col-6 key-data">: {{ ($course->price == 0) ? 'Free' : number_format($course->price) }}</div>
        </li>
    </ul>
</div>
