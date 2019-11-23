import Cookie from 'js.cookie';
export default {
    finalize() {
        // eslint-disable-next-line no-undef
        //alert(ajax_object.ajax_url);
        var quizScore = 0;
        var currentQuizFinish = false;
        var slickElement = jQuery('.quizzes--quiz');
        //Cookie.set( 'oa_quiz_id', 1 );
        Cookie.remove('oa_quiz_id');

        initSlick(slickElement);

        jQuery('.btn--quiz--slick').on('click', function () {
            quizScore = quizScore + Number(jQuery(this).val());
            if (currentQuizFinish) {
                //quizResult();
                jQuery('.results').css('display', 'block');
                slickElement.css('display', 'none');
                slickElement.slick('unslick');
                alertQuizScore();
            } else {
                jQuery('.quizzes--quiz').slick('slickNext');
            }
        });
        jQuery('.btn--quiz--next').on('click', function () {
            nextQuiz();
        });

        slickElement.on('afterChange', function (event, slick, currentSlide) {
            if (currentSlide + 1 == slick.slideCount) {
                currentQuizFinish = true;
            }
        });

        function alertQuizScore() {
            alert(quizScore + ' from test function');
        }

        function initSlick(element) {
            jQuery(element).slick({
                dots: false,
                prevArrow: false,
                nextArrow: false,
                infinite: false,
                speed: 500,
                fade: true,
                adaptiveHeight: true,
                cssEase: 'linear',
                slide: '.quizzes--quiz--questions',
                rows: 0,
                swipe: false,

            });
        }

        function quizResult(){

            var data = {};
            data['action'] = 'ajaxQuizzes';
            data['request'] = 'quizResult';
            jQuery.ajax({
                // eslint-disable-next-line no-undef
                url : ajax_object.ajax_url,
                data : data,
                success: function(response) {
                    console.log(response);
                    jQuery('.results').html(response.data.content);
                    jQuery('.results').css('display', 'block');
                    slickElement.css('display', 'none');
                    slickElement.slick('unslick');
                },
            });

        }

        function nextQuiz(){
            var data = {};
            data['action'] = 'ajaxQuizzes';
            data['request'] = 'nextQuiz';
            jQuery.ajax({
                // eslint-disable-next-line no-undef
                url : ajax_object.ajax_url,
                data : data,
                success: function(response) {
                    console.log(response);
                    alert(response.data.getresult);
                },
            });
        }


        var data = {};
        data['action'] = 'ajaxQuizzes';
        data['request'] = 'quizresult';
        jQuery.ajax({
            // eslint-disable-next-line no-undef
            url : ajax_object.ajax_url,
            data : data,
            success: function(response) {
                console.log(response);
                alert(response.data.getresult);
            },
        });

    },
};
