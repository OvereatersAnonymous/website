import Cookie from 'js.cookie';
export default {
    finalize() {
        //Set up variables
        var quizScore = 0;
        var currentQuizFinish = false;
        var pid = 0;
        var oa_quiz_page =0;
        var slickElement = jQuery('.quizzes--questions');
        var resultsElement = jQuery('.results');
        //Store quiz set page from cookie
        /* eslint-disable */
        if(!Cookiebot.consent.preferences){
        /* eslint-enable */
            oa_quiz_page = 1;
        }else if(Cookie.get( 'oa_quiz_page' )){
            oa_quiz_page = Cookie.get( 'oa_quiz_page' );
        }else{
            oa_quiz_page = 1;
        }
        //Set up slick slider
        setSlick(slickElement);
        // Check on after slide change if current slide is the last one of the set
        slickElement.on('afterChange', function (event, slick, currentSlide) {
            if (currentSlide + 1 == slick.slideCount) {
                currentQuizFinish = true;
            }
        });
        //Initialize slick slider and related controls/variables
        function setSlick(element) {
            jQuery(element).slick({
                dots: false,
                prevArrow: false,
                nextArrow: false,
                infinite: false,
                speed: 500,
                fade: true,
                adaptiveHeight: true,
                cssEase: 'linear',
                slide: '.slide',
                rows: 0,
                swipe: false,

            });
            //On yes/no btn click, add to total score and slide to next element. Call quizResult after last slide
            jQuery('.quiz-btn').on('click', function () {
                quizScore = quizScore + Number(jQuery(this).val());
                if (currentQuizFinish) {
                    quizResult();
                } else {
                    jQuery(slickElement).slick('slickNext');
                }
            });
            // Reset variables
            quizScore = 0;
            currentQuizFinish = false;
            pid = jQuery(element).data('pid');
        }
        // Ajax function to get results of quiz base on score
        function quizResult(){
            // Data to pass
            var data = {};
            data['action'] = 'ajaxQuizzes';
            data['request'] = 'quizResult';
            data['quizScore'] = quizScore;
            data['pid'] = pid;
            data['oa_quiz_page'] = oa_quiz_page;
            // eslint-disable-next-line no-undef
            data['oa_quiz_result_nonce'] = ajax_object.ajax_nonce;
            //Ajax call
            jQuery.ajax({
                // eslint-disable-next-line no-undef
                url : ajax_object.ajax_url,
                data : data,
                success: function(response) {
                    //Set results and display. Destroy slick slider
                    resultsElement.html(response.data.content_quiz_result);
                    resultsElement.css('display', 'block');
                    slickElement.css('display', 'none');
                    slickElement.slick('unslick');
                    //Update quiz set page to cookie. Remove if no more quizzes to load
                    if(response.data.load_next_quiz === false){
                        Cookie.remove( 'oa_quiz_page' );
                    }else{
                        oa_quiz_page++;
                        /* eslint-disable */
                        if(Cookiebot.consent.preferences){
                        /* eslint-enable */
                          Cookie.set('oa_quiz_page', oa_quiz_page, { expires: 30 });
                        }
                        loadNextQuizListener();
                    }
                },
            });

        }
        // Ajax function to load next quiz
        function loadNextQuiz(){
            // Data to pass
            var data = {};
            data['action'] = 'ajaxQuizzes';
            data['request'] = 'loadNextQuiz';
            data['oa_quiz_page'] = oa_quiz_page;
            // eslint-disable-next-line no-undef
            data['oa_load_next_quiz_nonce'] = ajax_object.ajax_nonce;
            //Ajax call
            jQuery.ajax({
                // eslint-disable-next-line no-undef
                url : ajax_object.ajax_url,
                data : data,
                success: function(response) {
                    //Set quiz and display. Initialize slick slider
                    jQuery(slickElement).html(response.data.content_quiz);
                    jQuery(slickElement).data('pid',response.data.pid);
                    setSlick(slickElement);
                    slickElement.css('display', 'block');
                    slickElement.get(0).slick.setPosition();
                    resultsElement.css('display', 'none');
                },
            });
        }
        //Adds listener to button to trigger loading of next quiz
        function loadNextQuizListener(){
            jQuery('.quiz-btn-next').on('click', function () {
                loadNextQuiz();
            });
        }
    },
};
