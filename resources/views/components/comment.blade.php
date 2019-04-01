<div class="comment panel">
    <div class="comment__heading panel-heading">{{ $title }}</div>
    <div class="comment__body panel-body">
        {{ $slot }}
    </div>
    @auth
    <div class="comment__footer panel-footer">
        {{ $footer }}
    </div>
    @endauth
</div>