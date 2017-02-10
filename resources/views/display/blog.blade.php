@extends('layouts.layout')


@section('title')
@parent
{{$blog->title}} | Figure Rant
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 post">
                <!-- Blog Post -->
                <!-- Title -->
                <h1>{{$blog->title}}</h1>
                <!-- Author and time -->
                <?php
                    $nicedate = date('F d, Y',strtotime($blog->created_at));

                    //$blog->content = html_entity_decode($blog->content);
                ?>
                <p>
                    Posted on {{$nicedate}} by <a href="#">{{$blog->author}}</a>
                </p>
                <hr>
                <!-- Post Content -->
                <?php print $blog->content; ?>

                @if ($blog->type == 'review')
                          <div id="links">
                            @for($i=1; $i < $blog->image_amount; $i++)
                                <a href="/images/review/{{$blog->url}}/{{$i}}.{{$blog->image_filetype}}"  data-gallery>
                                    <img class="figure-thumb blueimp-gallery-controls" src="/images/review/{{$blog->url}}/thumbs/{{$i}}.{{$blog->image_filetype}}" alt="">
                                </a>                 
                            @endfor                               
                            </div>




                    <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
                    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
                        <!-- The container for the modal slides -->
                        <div class="slides"></div>
                        <!-- Controls for the borderless lightbox -->
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="close">×</a>
                        <a class="play-pause"></a>
                        <ol class="indicator"></ol>
                        <!-- The modal dialog, which will be used to wrap the lightbox content -->
                        <div class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body next"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left prev">
                                            <i class="glyphicon glyphicon-chevron-left"></i>
                                            Previous
                                        </button>
                                        <button type="button" class="btn btn-primary next">
                                            Next
                                            <i class="glyphicon glyphicon-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>

                @endif

                <hr>
                    <div id="disqus_thread"></div>
                    <script>
                    /**
                    * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                    */
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');

                    s.src = '//figurerant.disqus.com/embed.js';

                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-2">
                @include('display.rightsidebar')
        </div>

    </div>
</div>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>

@endsection
