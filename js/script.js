$(function(){

    // 読み込みが完了したら発動
    //window.addEventListener('load', function () {
    $(window).on('load', function(){

        // loadingを非表示に
        setTimeout(function(){
            $('.spinner').fadeOut(1000);
            $('#loading').fadeOut(1100);
        },1000);

        // contentsを表示
        setTimeout(function(){
            $('#contents').fadeIn(1000);
        },2200);

        // 見出しのフェードイン
        setTimeout(function(){
            $('.jumbotron').fadeIn(2000);
        },3500);
    });

    //5秒たったら強制的にロード画面を非表示
    setTimeout(function(){
        // loadingを非表示に
        setTimeout(function(){
            $('.spinner').fadeOut(1000);
            $('#loading').fadeOut(1100);
        },1000);

        // contentsを表示
        setTimeout(function(){
            $('#contents').fadeIn(1000);
        },2200);

        // 見出しのフェードイン
        setTimeout(function(){
            $('.jumbotron').fadeIn(2000);
        },3500);
    }, 5000);
    
    /* フローティングボタン */
    $(window).on("scroll", function() {
        let profile_height = $('#profile').offset().top; /* プロフィールまでの高さ */

        if ($(this).scrollTop() > profile_height) {
            $('.floating').fadeIn(500);
        } else {
            $('.floating').fadeOut(500);
        }
    });

    /* トップへ移動する */
    $('.floating').click(function() {
        $('body,html').animate({
          scrollTop: 0
        }, 1500);
        return false;
    });

    /* 制作物のフェード */
    $(window).on("scroll", function() {
        let works_height = $('#works').offset().top; /* worksまでの高さ */
        let work_length = $('.work').height(); /* workの高さ */

        if ($(this).scrollTop() > (works_height - work_length)) {
            $('.work').addClass('visible');
        }
    });
    
    

});