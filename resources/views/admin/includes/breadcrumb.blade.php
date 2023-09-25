<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$breadcrumbs['title']}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach($breadcrumbs['links'] as $link)
                        <li class="breadcrumb-item"><a href="{{$link['url']}}">{{$link['name']}}</a></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
