<div class="comment panel">
    <div class="comment__heading panel-heading">{{ $title }}</div>
    <div class="comment__body panel-body">
        {{ $slot }}
    </div>
    @can('change', $comment)
    <div class="comment__footer panel-footer">
        {{ $footer }}
    </div>
    @endcan
</div>