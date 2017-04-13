<script src="{{ asset('/bower_components/jquery/dist/jQuery.js') }}"></script>
<script type="text/javascript" src="/bower_components/flexisel/js/jquery.flexisel.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="/bower_components/lightbox2/dist/js/lightbox.js"></script>
<script src="js/front/front.js" charset="utf-8"></script>
<script src="{{ asset('/js/mainfront.js') }}" type="text/javascript"></script>
<script src="aux/js/touch_swipe/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="aux/js/simplegallery.js"></script>
{{-- <script src="{{ asset('/bower_components/jquery.easing/js/jquery.easing.js') }}"></script> --}}
<script src="{{ asset('/bower_components/jquery-cycle/jquery.cycle.all.js') }}"></script>
<script type="text/javascript">
var mygallery=new simpleGallery({
    wrapperid: "simplegallery1", //ID of main gallery container,
    dimensions: ['100%', 400], //width/height of gallery in [pixels, pixels] or ['percentage%', pixels]
    imagearray: [
        ["http://lorempixel.com/400/400/", "http://en.wikipedia.org/wiki/Swimming_pool", "_new", "Este é uma imagfem ki vai revolucionar a coisa certo"],
        ["http://lorempixel.com/400/400/", "http://en.wikipedia.org/wiki/Cave", "", "Estou a caminho de revolucionar o sistema"],
        ["http://lorempixel.com/400/400/", "", "", "Este é a coisa mais importante da minha vida"],
        ["http://lorempixel.com/400/400/", "", "", "Não quero viver so para viver mas quero comtribuir para a milhoria do sistema"]
    ],
    autoplay: [true, 1000, 2], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
    persist: false,
    scaleimage: 'both', //valid values are 'both', 'width', or 'none'
    fadeduration: 1500, //transition duration (milliseconds)
    preloadfirst:false,
    oninit:function(){ //event that fires when gallery has initialized/ ready to run
    },
    onslide:function(curslide, i){ //event that fires after each slide is shown
        //curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
        //i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
    }
})
</script>


{{-- <script src="/bower_components/jquery/dist/jquery.js"></script> --}}
