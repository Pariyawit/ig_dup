@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://scontent-lga3-1.cdninstagram.com/v/t51.2885-19/s150x150/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=scontent-lga3-1.cdninstagram.com&_nc_ohc=YTrFUZgSNJcAX8yaJXM&oh=8a47f88f61a68eeaaf1fec0e4ba58aa9&oe=5E8CD1BA" class="rounded-circle">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="#">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>153 </strong>post</div>
                <div class="pr-5"><strong>23k </strong>followers</div>
                <div class="pr-5"><strong>212 </strong>following</div>
            </div>
            <div class="pt-4"><strong>{{ $user->profile->title }}</strong></div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="{{ $user->profile->url}}">{{ $user->profile->url}}</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 pt-4">
            <img src="https://scontent-lga3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/84134630_237850053892523_1041925225088135588_n.jpg?_nc_ht=scontent-lga3-1.cdninstagram.com&amp;_nc_cat=111&amp;_nc_ohc=9Bxp9sv3gJMAX-D0oXm&amp;oh=7638e64b4b68e3a44b6bca5a61e3a201&amp;oe=5E8C33C3" class="w-100">
        </div>
        <div class="col-4 pt-4">
            <img src="https://scontent-lga3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/84134630_237850053892523_1041925225088135588_n.jpg?_nc_ht=scontent-lga3-1.cdninstagram.com&amp;_nc_cat=111&amp;_nc_ohc=9Bxp9sv3gJMAX-D0oXm&amp;oh=7638e64b4b68e3a44b6bca5a61e3a201&amp;oe=5E8C33C3" class="w-100">
        </div>
        <div class="col-4 pt-4">
            <img src="https://scontent-lga3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/84134630_237850053892523_1041925225088135588_n.jpg?_nc_ht=scontent-lga3-1.cdninstagram.com&amp;_nc_cat=111&amp;_nc_ohc=9Bxp9sv3gJMAX-D0oXm&amp;oh=7638e64b4b68e3a44b6bca5a61e3a201&amp;oe=5E8C33C3" class="w-100">
        </div>
    </div>
</div>
@endsection
