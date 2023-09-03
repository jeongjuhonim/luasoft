<style>
    body {
        color: #333;
        font-family: Lato;
        font-weight: 300;
        text-align: center;
        background: #333;
    }

    .modal {
        background: #fff;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        top: 90%;
        position: fixed;
        left: 0;
        text-align: left;
</style>
<body>
<div class="container">
    <div class="modal" id="test_pop">
        <div class="header">header
        </div>
        <div class="body"><p>body</p>
            <a class="btn js-close-modal">Close</a>
        </div>
    </div>
</div>
</body>
<script  src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>

    var move_position = '';
    var move_start_position = 0;
    var move_end_position = 0;
    var move_animation_check = false;

    var window_height = $(window).height();
    var pop_max_pop_position = window_height/9;
    var pop_min_pop_position = window_height - window_height/10;

    function touchStart(e) {
        e.preventDefault();
        move_start_position = e.changedTouches[0].clientY;
        move_position = new Array();
    }

    function touchEnd(e) {
        e.preventDefault();
        position_check = move_position[posision_length-1] - move_position[posision_length-2];

        if(move_animation_check == true){
            return false;
        }

        if(position_check > 0){
            move_animation_check = true;
            $('#test_pop').animate( { top : pop_min_pop_position } , 400 , null , function(){move_animation_check = false;} );
            return false;
        }

        if(position_check < 0){
            move_animation_check = true;
            $('#test_pop').animate( { top : pop_max_pop_position } , 400 , null , function(){move_animation_check = false;} );
            return false;
        }

    }


    function touchMove(e) {
        e.preventDefault();
        move_position.push(e.changedTouches[0].clientY);
        posision_length = move_position.length;

        if(posision_length==1){
            return false;
        }

        if(move_animation_check == true){
            return false;
        }

        cur_y = move_position[posision_length-1] - move_position[posision_length-2];
        obj = $('#test_pop').offset();
        cur_position = obj.top + cur_y;

        if(cur_position < pop_max_pop_position || cur_position > pop_min_pop_position){
            return false;
        }


        $('#test_pop').css('top',cur_position);
    }
    var test_pop = document.getElementById("test_pop");
    test_pop.addEventListener("touchstart", touchStart, { passive: false, capture : true });
    test_pop.addEventListener("touchmove", touchMove, { passive: false, capture : true });
    test_pop.addEventListener("touchend", touchEnd, { passive: false, capture : true });

</script>