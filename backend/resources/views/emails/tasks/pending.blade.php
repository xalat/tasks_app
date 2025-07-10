@component('mail::message')
    # Pending Tasks Alert

    The following tasks have been pending for more than 7 days:

    @component('mail::table')
        | Title | Created At |
        |-------|------------|
        @foreach($tasks as $task)
            | {{ $task->title }} | {{ $task->created_at->format('Y-m-d') }} |
        @endforeach
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
