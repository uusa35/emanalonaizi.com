<!--footer start-->
<div id="footer" >
    <div class="col-md-4 col-xs-12 ">
        <div class="col-md-1 col-xs-4 social-icons"><a target="_blank" href="https://twitter.com/{{ $socialMedia->twitter }}"><i class="fa fa-twitter fa-lg"></i></a> </div>
        <div class="col-md-1 col-xs-4 social-icons"><a target="_blank" href="http://www.facebook.com/{{ $socialMedia->facebook }}"><i class="fa fa-facebook fa-lg"></i></a></div>
        <div class="col-md-1 col-xs-4 social-icons"><a target="_blank" href="http://instagram.com/{{ $socialMedia->instagram }}"><i class="fa fa-instagram fa-lg"></i></a></div>
    </div>
    <div class="col-md-8 col-xs-12 copyright">
        <div class="row">
            <div class="col-md-6">
                Copyrights &copy; Eman Al Onaizi <?php echo date('Y'); ?>
            </div>
            <div class="col-md-6">
                {{ Lang::get('general.blogTitle') }}
            </div>
            <div class="col-md-12">
                Site Developed By <a href="http://ideasowners.net" target="_blank">IdeasOwners.net</a>
            </div>
        </div>
    </div>
</div><!-- end of footer-->