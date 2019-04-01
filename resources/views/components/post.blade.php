<div class="post panel panel-default">
    <div class="post__heading panel-heading">{{ $title }}</div>
    <div class="post__body panel-body">
        {{ $slot }}
    </div>
    @auth
    <div class="post__footer panel-footer">
        {{ $footer }}
    </div>
    @endauth
</div>