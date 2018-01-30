$('.slick-slider').slick({
    autoplay: true,
    dots:true,
    arrows: false,
    prevArrow: '<a class="slick-prev" href="#"><i data-icon="ei-arrow-left" data-size="m"></i></a>',
    nextArrow: '<a class="slick-next" href="#"><i data-icon="ei-arrow-right" data-size="m"></i></a>',
    customPaging: function(slick,index) {
        // スライダーのインデックス番号に対応した画像のsrcを取得
        var targetImage = slick.$slides.eq(index).find('img').attr('src');
        // slick-dots > li　の中に上記で取得した画像を設定
        return '<img src=" ' + targetImage + ' "/>';
        // return '<div style="border-top:3px solid black;height:3px;"></div>';
    }
});