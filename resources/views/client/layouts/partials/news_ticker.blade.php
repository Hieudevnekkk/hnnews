<div class="news--ticker">
    <div class="container">
        <div class="title">
            <h2>Tin Mới Đăng</h2>
            <span>(Đăng 12 phút trước)</span>
        </div>

        <div class="news-updates--list" data-marquee="true">
            <ul class="nav">
                @foreach ($newsPosts12MinutesAgo as $item)
                    <li>
                        <h3 class="h3"><a href="#">{{ $item->title }}</a></h3>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
