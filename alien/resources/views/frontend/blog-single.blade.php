@extends('layouts.front.app')

@section('title', $qItem->title)

@section('meta')
@php($url = url('/'))
<?php 
    $url1 = $url."/blog-details/".$qItem->url;
?>
<meta property="og:url"                content="{{$url1}}" />

<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{$qItem->title}}" />
<meta property="og:description"        content="{{$qItem->brief}}" />
<!-- <meta property="og:image"              content="<?php echo $url."/".$qItem->blog_big_image; ?>" /> -->
<meta property="og:image"                content="{{asset('/'.$qItem->blog_big_image)}}" />

@endsection

@section('front')


    <section class="page-title" style="background-image:url('http://doctorplease.com.bd/images/background/page-title-bg.jpg');">
    	<div class="auto-container">
        	<div class="sec-title">
                <h2>Blog <span class="normal-font">Details</span></h2>
                <div class="bread-crumb"><a href="{{url('blog/health-blog')}}">Blog</a> / <a href="{{url('blog-details/'.$qItem->url)}}" class="current">{{$qItem->title}}</a></div>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        var url = window.location.href;

        // alert(url);

    </script>

    <!--Sidebar Page-->
    <div class="sidebar-page">
    	<div class="auto-container">
        	<div class="row clearfix">

                <!--Content Side-->
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                    <!--Projects Section-->
                    <section class="blog-news-section blog-detail no-padd-bottom no-padd-top padd-right-20">

                        <!--News Column-->
                        <div class="column blog-news-column">
                            <article class="inner-box">
                                <figure class="image-box">
                                    <img src="{{url($qItem->blog_big_image)}}" alt="{{$qItem->title}}" title="{{$qItem->title}}">
                                    <div class="news-date">{{ date('d', strtotime($qItem->created_at)) }}<span class="month">{{date('M', strtotime($qItem->created_at))}}</span></div>
                                </figure>
                                <div class="content-box padd-top-30">
                                    <h1><a href="{{url('blog/'.$qItem->url)}}">{{$qItem->title}}</a></h1>
                                    <div class="post-info clearfix">
                                        <div class="post-author">Posted by {{$qItem->author_name}}</div>
                                        <div class="post-options clearfix">
                                            <!-- <a href="#" class="comments-count"><span class="icon flaticon-communication-2"></span> 6</a>
                                            <a href="#" class="fav-count"><span class="icon flaticon-favorite-1"></span> 14</a> -->
                                        </div>
                                    </div>
                                    <!-- Contents Details Start-->
                                    <div class="text">
                                    	<?php echo  $qItem->details; ?>
                                    </div>
                                    <!-- Contents Details End -->
                                </div>
                                <div class="post-share-options clearfix">
                                	<div class="pull-left tags"><strong>Total Views</strong> : {{$qItem->total_view}}</div>
                                    <div class="addthis_inline_share_toolbox pull-right tags"></div>
                                </div>

                            </article>
                        </div>

                        <!--Comments Area-->
                        <!-- <div class="comments-area">
                            <div class="group-title text-uppercase"><h2>3 কমেন্টস</h2></div>

                            <div class="comment-box">
                                <div class="comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="author-thumb"><img src="images/resource/author-thumb-1.jpg" alt=""></div>
                                    <div class="comment-info"><strong>Janntul Ferdous</strong><div class="comment-time">November 20, 2014 at 8:31 pm</div></div>
                                    <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</div>
                                    <a class="reply-btn" href="#"><span class="txt">Reply</span></a>
                                </div>

                                <div class="comment reply-comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="author-thumb"><img src="images/resource/author-thumb-2.jpg" alt=""></div>
                                    <div class="comment-info"><strong>Juliana Rose</strong><div class="comment-time">November 20, 2014 at 8:31 pm</div></div>
                                    <div class="text">At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</div>
                                </div>

                                <div class="comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="author-thumb"><img src="images/resource/author-thumb-3.jpg" alt=""></div>
                                    <div class="comment-info"><strong>Rashed kabir</strong><div class="comment-time">November 20, 2014 at 8:31 pm</div></div>
                                    <div class="text">Whether you need to create a brand from scratch, including marketing materials and a beautiful and functional website or whether you are looking for a design.</div>
                                    <a class="reply-btn" href="#"><span class="txt">Reply</span></a>
                                </div>

                            </div>
                        </div> 




                        <div class="comment-form wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">

                            <div class="group-title text-uppercase"><h2>কমেন্ট</h2><div class="default-line-left"></div></div>

                            <form method="post" action="">
                                <div class="row clearfix">
                                    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <input type="text" name="username" placeholder="আপনার নাম">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <textarea name="message" placeholder="আপনার মন্তব্য"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <button class="theme-btn btn-style-two" type="submit" name="submit-form">কমেন্ট যোগ করুন</button>
                                    </div>

                                </div>
                            </form>

                        </div>-->

                    </section>


                </div>



                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">

                        <!-- <div class="widget search-box">

                            <form method="post" action="http://world5.commonsupport.com/html/greenture-new/index.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Enter keyword">
                                    <button type="submit"><span class="icon flaticon-tool-5"></span></button>
                                </div>
                            </form>

                        </div> -->

                        <!-- Popular Categories -->
                        <div class="widget popular-categories wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h3>বিভাগ সমূহ</h3></div>

                            <ul class="list">
                              @foreach($qCategorys as $qCategory)
                            	<li><a class="clearfix" href="{{url('blog/'.$qCategory->url)}}">{{$qCategory->category_name_bn}}</a></li>
                              @endforeach
                            </ul>

                        </div>


                        <!-- Recent Posts -->
                        <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h3>জনপ্রিয় পোস্ট</h3></div>
                            @foreach($qPosts as $qPost)
                            <article class="post">
                            	<figure class="post-thumb"><img src="{{url($qPost->blog_small_image)}}" alt="{{$qPost->title}}" title="{{$qPost->title}}"></figure>
                                <h4><a href="{{url('blog-details/'.$qPost->url)}}">{{$qPost->title}}</a></h4>
                                <div class="post-info"><span class="icon flaticon-people-1"></span> By {{$qPost->author_name}} </div>
                            </article>
                            @endforeach

                        </div>

                        <!-- Archives
                        <div class="widget archives-list wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h3>আর্কাইভস</h3></div>

                            <ul class="list">
                            	<li><a href="#">April 2016</a></li>
                                <li><a href="#">March  2016</a></li>
                                <li><a href="#">February 2016</a></li>
                                <li><a href="#">January 2016</a></li>
                                <li><a href="#">December 2015</a></li>
                                <li><a href="#">November 2015</a></li>
                            </ul>

                        </div>

                     Popular Tags 
                        <div class="widget popular-tags">
                            <div class="sidebar-title"><h3>KeyWords</h3></div>

                            <a href="#">Child</a>
                            <a href="#">Water</a>
                            <a href="#">Donate</a>
                            <a href="#">Money</a>
                            <a href="#">Volunteer</a>

                        </div>-->

                    </aside>


                </div>
                <!--Sidebar-->


            </div>
        </div>
    </div>
@endsection

@push('scripts')



@endpush